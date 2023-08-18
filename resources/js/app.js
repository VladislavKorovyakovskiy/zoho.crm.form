require('./bootstrap');

import axios from 'axios';

document.addEventListener("DOMContentLoaded", function () {
    const csrf = axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const TokenAdd = document.querySelector("#csrf-token")
    TokenAdd.value = csrf;
});


import { createApp } from 'vue'

import Deals from './components/CreateDeals.vue';
const deals = createApp(Deals);
deals.component('deals', require('./components/CreateDeals'));
deals.mount('#deals')

// import Test from './components/test.vue';
// const test = createApp(Test);
// test.component('test', require('./components/test'));
// test.mount('#test')

// import Invoices from './components/CreateInvoices.vue';
// const invoices = createApp(Invoices);
// invoices.component('invoices', require('./components/CreateInvoices'));
// invoices.mount('#invoices')

// import App from './components/App.vue';
// const app = createApp(App);
// app.component('app', require('./components/App'));
// app.mount('#app')