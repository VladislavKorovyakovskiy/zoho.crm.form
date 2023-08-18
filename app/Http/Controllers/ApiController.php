<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\AccountRequest;

class ApiController extends Controller
{
    public function contact()
    {
        $apiDomain = 'https://www.zohoapis.eu';
        $accessToken = $this->getAccessToken();
        // $contact = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken])->get($apiDomain . '/crm/v5/Contacts?on_demand_properties="$client_portal_permission"&fields=Account_Name');
        $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken])->get($apiDomain . '/crm/v5/Accounts?on_demand_properties="$client_portal_permission"&fields=Account_Name');
        $contact = json_decode($response);
        // dd($account['data']);
        return (json_encode($contact));
    }

    public function createDeals(ContactRequest $req)
    {
            $apiDomain = 'https://www.zohoapis.eu';
            $accessToken = $this->getAccessToken();
            $requestData = array(
                array(
                    "Deal_Name" => $req->dealName,
                    "Account_Name" => $req->contactName,
                    "Closing_Date" => $req->openDate,
                    "Stage" => $req->stage
                )
            );
            
            $requestDataForDeals = array(
                "data" => $requestData
            );
    
            $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken])->post($apiDomain . '/crm/v5/Deals/upsert', $requestDataForDeals);
            if($response['data'][0]['code'] == 'SUCCESS') {
                return view('validation\success');
            }
            else {
                return view('validation\error');
            }
        }

    public function getAccessToken()
    {
        $clientId = '1000.SUKCIYY0XVCP7BKU6Y4DX9UQWYJ6DV';
        $clientSecret = '0397cbbc1714b3a8df4f55d88f0271aa3cfb3578ae';
        $refreshToken = '1000.5ceed630fe34ad619ff78ff67f93785e.9d223c119d986ebed9d0e3019d143e8f';
        $grantType = 'refresh_token';

        $response = Http::post('https://accounts.zoho.eu/oauth/v2/token?refresh_token=' . $refreshToken . '&client_id=' . $clientId . '&client_secret=' . $clientSecret . '&grant_type=' . $grantType);
        $response = json_decode($response)->access_token;
        return $response;
    }

    public function createContact(AccountRequest $req)
    {
        $apiDomain = 'https://www.zohoapis.eu';
        $accessToken = $this->getAccessToken();

        $accountData = array(
            array(
                "Account_Name" => $req->accountName,
                "Account_Number" => $req->accountNumber,
                "Account_Site" => $req->accountSite,
            )
        );
        $accountDataCreate = array(
            "data" => $accountData
        );

        $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken])->post($apiDomain . '/crm/v5/Accounts', $accountDataCreate);

        if($response['data'][0]['code'] == 'SUCCESS') {
            return view('validation\success');
        }
        else {
            return view('validation\error');
        }
    }
}
