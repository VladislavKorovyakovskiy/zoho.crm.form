<template>
    <h1>Создать сделку</h1>
    <form action="/add/deals" method="post">
        <input type="hidden" name="_token" value="" id="csrf-token">

        <div class="form-group">
            <label for="dealName">Название сделки</label> <br>
            <input type="text" name="dealName" placeholder="Введите название сделки" id="Deal_Name" class="field">

            <label for="stage">Стадия заключения сделки</label> <br>
            <select id="stage" name="stage" class="field">
                <option value="Оценка пригодности">Оценка пригодности</option>
                <option value="Требуется анализ">Требуется анализ</option>
                <option value="Ценностное предложение">Ценностное предложение</option>
                <option value="Идентификация ответственных за принятие решений">Идентификация ответственных за принятие решений</option>
                <option value="Коммерческое предложение/Ценовое предложение">Коммерческое предложение/Ценовое предложение</option>
                <option value="Переговоры/Оценка">Переговоры/Оценка</option>
                <option value="Закрытые заключенные">Закрытые заключенные</option>
                <option value="Закрытые упущенные">Закрытые упущенные</option>
                <option value="Закрытые заключенные конкурентами">Закрытые заключенные конкурентами</option>
                <option value="identify-decision-makers">Identify Decision Makers</option>
            </select>
            <label for="contactName">Контрагент - имя</label> <br>
            <select id="contactName" name="contactName" class="field" v-model="selectedOption" @change="handleOptionChange">
                <option v-for="contact in contactList" :value="contact['name']">{{ contact['Account_Name'] }}</option>
                <option id="addNew" value="addNew">Нов. Контрагент</option>
            </select>

            <label for="openDate">Дата заключения</label>
            <input type="date" id="openDate" name="openDate" value="<?php echo date('Y-m-d'); ?>" class="field">
        </div>
        <button type="submit" class="btn">Создать</button>
    </form>
    <div v-if="isPopupOpen" class="popup-form">
        <form action="/" method="post">
            <input type="hidden" name="_token" value="" id="csrf-token-add-contact">
            <h2>Быстрое создание: Контрагента</h2>
            <table>
                <tbody>   
                    <tr>
                        <td><label for="accountName">Контрагент - имя</label></td>
                        <td><input type="text" name="accountName" id="Account_Name" class="field"></td>
                    </tr>
                    <tr>
                        <td><label for="accountNumber">Телефон</label></td>
                        <td><input type="text" name="accountNumber" placeholder="" id="Account_Number" class="field"></td>
                    </tr>
                    <tr>
                        <td><label for="accountSite">Веб-сайт</label></td>
                        <td><input type="text" name="accountSite" placeholder="http://" id="Account_Site" class="field"></td>
                    </tr>
                </tbody>
            </table>
            <div class="btn-box">
            <button type="submit" class="btn">Создать</button>
            <button @click="closePopupForm" class="btn">Закрыть</button>
        </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data: function () {
        return {
            contactList: [],
            selectedOption: "",
            isPopupOpen: false,
        }
    },
    mounted() {
        this.update()
    },
    methods: {
        update: function () {
            axios.get('/contact').then((response) => {
                this.contactList = response.data.data
            });
        },
        handleOptionChange() {
            if (this.selectedOption === "addNew") {
                this.isPopupOpen = true;
                const csrf = axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                setTimeout(function () {
                    const addContact = document.querySelector('#csrf-token-add-contact');
                    addContact.value = csrf;
                }, 200);
            } else {
                this.isPopupOpen = false;
            }
        },
        closePopupForm() {
            this.selectedOption = "";
            this.isPopupOpen = false;
        },
    }
};

</script>

<style>

</style>