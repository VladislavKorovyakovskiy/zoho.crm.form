<template>
    <h1>Создать счет</h1>
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
            <select id="contactName" name="contactName" class="field">
                <option v-for="contact in contactList" :value="contact['id']">{{ contact['Account_Name']['name'] }}</option>
                <option value="addNew">Нов. Контрагент</option>
            </select>

            <label for="openDate">Дата заключения</label>
            <input type="date" id="openDate" name="openDate" value="<?php echo date('Y-m-d'); ?>" class="field">
        </div>
        <button type="submit" class="btn">Создать</button>
    </form>
</template>

<script>
import axios from 'axios';

export default {
    data: function () {
        return {
            contactList: [],
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
        }
    }
};
</script>