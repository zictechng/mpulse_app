require('./bootstrap');

window.Vue = require('vue').default;
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Pagination from 'laravel-vue-pagination';
// page route links goes here ....
let routes = [{
            path: '/dashboard',
            name: 'dashboard',
            component: require('./components/Dashboard.vue').default
        },
        {
            path: '/add-coupon',
            name: 'add-coupon',
            component: require('./components/AddCoupon.vue').default
        },
        {
            path: '/wallet',
            name: 'wallet',
            component: require('./components/Wallet.vue').default
        },
        {
            path: '/cash-out',
            name: 'cash-out',
            component: require('./components/CashOut.vue').default
        },
        {
            path: '/transfer-fund',
            name: 'transfer-fund',
            component: require('./components/TransferFund.vue').default
        },
        {
            path: '/history',
            name: 'history',
            component: require('./components/History.vue').default
        },
        {
            path: '/ticket',
            name: 'ticket',
            component: require('./components/Ticket.vue').default
        },
        {
            path: '/settings',
            name: 'settings',
            component: require('./components/Settings.vue').default
        },
        {
            path: '/profile',
            name: 'profile',
            component: require('./components/Profile.vue').default
        },

    ]
    //Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('page-name', require('./components/PageName.vue').default);
Vue.component('pagination', Pagination);

// here we have to register our routes for the pages
const router = new VueRouter({
        mode: 'history',
        routes // short for `routes: routes`
    })
    //Vue.use(require('vue-resource'));
    // sweetalert goes here
import swal from 'sweetalert2'
import Vue from 'vue';
import moment from 'moment';
window.swal = swal;

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', swal.stopTimer)
        toast.addEventListener('mouseleave', swal.resumeTimer)
    }
});
window.toast = toast;
// this will help to listen to any even and fire a function to do something
window.Fire = new Vue();
// data format readable here
Vue.filter('mydate', function(read_date) {
    //return moment(read_date).format('MMMM Do YYYY, h:mm:ss a');
    return moment(read_date).format('MM DD YYYY, h:mm:ss A');
});

// this will help to listen to any even and fire a function to do something
window.Fire = new Vue();

Vue.prototype.$user = window.User
    //Vue.prototype.$userId = document.querySelector("meta[name='user_id']").getAttribute('content');
import Loading from 'vue-loading-overlay';
Vue.use(Loading, {
    color: '#009900',
    width: 28,
    height: 28
});
Vue.component('loading', Loading);

const app = new Vue({
    el: '#app',
    router
});