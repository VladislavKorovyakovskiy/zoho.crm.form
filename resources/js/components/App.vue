<template>
    <div class="btn-box">
        <button type="button" @click="component = 'Deals'">Создать сделку</button>
        <button type="button" @click="component = 'Invoices'">Создать счет</button>
    </div>
    <component :is="component"></component>
</template>

<script>
import Deals from './CreateDeals.vue';
import Invoices from './CreateInvoices.vue'; 

export default {
    components: {
        Deals, 
        Invoices,
    },
    data() {
        return {
            CreateDeals: 'Deals', 
            CreateInvoices: 'Invoices',
            component: 'Deals',
        };
    },
};
</script>
