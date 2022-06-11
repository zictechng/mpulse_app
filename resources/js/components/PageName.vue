<template>
        <div>

                <template>
                    <div class="dashboard_bar" v-if="$route.name==='dashboard'">
                        Dashboard
                    </div>
                    <div class="dashboard_bar" v-else-if="$route.name==='add-coupon'">
                        Add Coupon
                    </div>
                     <div class="dashboard_bar" v-else-if="$route.name==='wallet'">
                        Wallet
                    </div>
                    <div class="dashboard_bar" v-else-if="$route.name==='cash-out'">
                       Cash Out
                    </div>
                    <div class="dashboard_bar" v-else-if="$route.name==='transfer-fund'">
                        Transfer Funds
                    </div>
                    <div class="dashboard_bar" v-else-if="$route.name==='history'">
                        Transaction History
                    </div>
                    <div class="dashboard_bar" v-else-if="$route.name==='ticket'">
                        Submit Ticket
                    </div>
                    <div class="dashboard_bar" v-else-if="$route.name==='settings'">
                        Setting
                    </div>
                    <div class="dashboard_bar" v-else-if="$route.name==='profile'">
                        Profile
                    </div>
                    <div class="dashboard_bar" v-else>
                        Welcome
                    </div>

                    </template>
        </div>

</template>

<script>
export default {
        pros:['app'],
        name: 'PageName',
        data() {
             return {
            user_name: this.$user.name,
            user_email: this.$user.email,
            page_title: this.$route.name,
            user_id: this.$user.id,
            id: this.$user.id,
      // declear veriable
      /* here you declear the form details below*/
        };
    },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {

      },
      created() {
            // this function to load users once the page is call

         }
    }

</script>
<style>

</style>

