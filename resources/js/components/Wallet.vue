<template>
    <div class="container">

        <div class="row justify-content-center">
     <div class="row">
    <div class="col-xl-9 col-xxl-12">
        <div class="card">
            <div class="card-body">

                <div class="row align-items-center">
                    <div class="col-xl-6 mt-2">
                        <div class="card-bx bg-blue">

                            <img class="pattern-img" src="/master/images/pattern/pattern6.png" alt="">
                            <div class="card-info text-white">
                                <img src="/master/images/pattern/circle.png" class="mb-4" alt="">
                                <h2 class="text-white card-balance">${{Number(wallet_total).toLocaleString()}}</h2>
                                <p class="fs-16">Wallet Balance </p>
                            </div>

                        </div>

                        <br>
                        <router-link to="cash-out"><button type="button" class="btn btn-rounded btn-primary"><span
                                        class="btn-icon-start text-primary"><i class="fa fa-shopping-cart"></i>
                                    </span>Cash Out</button>
                        </router-link>
                    </div>

                    <div class="col-xl-6">
                        <div class="row  mt-xl-0 mt-4">
                            <div class="col-md-6">
                                <h4 class="card-title">Card Balance</h4>
                                <span>All transaction in the card required to maintain the following limit <span>(Monthly)</span></span>
                                <ul class="card-list mt-4">
                                    <li><span class="bg-blue circle"></span>Inflow<span>100%</span></li>
                                    <li><span class="bg-success circle"></span>Balance<span>$100</span></li>
                                    <li><span class="bg-warning circle"></span>Outflow <span>$50,000</span></li>
                                    <li><span class="bg-light circle"></span>Loan <span>15%</span></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <canvas id="polarChart"></canvas>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

                    <div class="col-lg-12">
                        <div class="card" v-if="users.length">
                            <div class="card-header">
                                <h4 class="card-title">Recent Transaction</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;"><strong>#</strong></th>
                                                <th><strong>Price</strong></th>
                                                <th><strong>Coupon Code</strong></th>
                                                <th><strong>Status</strong></th>
                                                <th><strong>Date</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(user, index) in users" :key="user.id">
                                                <td><strong>{{ index+1 }}</strong></td>
                                                <td>{{ user.code_amount }}</td>
                                                <td>{{ user.coupon_code }}</td>
                                                <td><span class="badge light badge-success">{{ user.coupon_code }}</span></td>
                                                <td>{{ user.created_at | mydate}}</td>
                                              </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <div v-else>
                                <div class="card-header">
                                    <span>No recent record at the moment </span>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        pros:['app'],
        name: 'Wallet',
        data(){
            return{
            // this will store all user detail gotting from database
                users: {},
                wallet_total: '',
                user_id: this.$user.id,
                id: this.$user.id,

            }
        },

        methods:{
            // function to fecth users balance details from database
            fecthUsersWallet(){
            axios.get('/api/cash?id='+this.$user.id)
            .then(response =>{
                this.wallet_total = response.data}
                );
             },

             // function to fecth users recent transaction details from database
            fecthUsersTransaction(){
            axios.get('/api/coupon/show?id='+this.$user.id).
            then(({data}) =>(this.users = data.data));
             },

        },
        created() {
            // this function to load users once the page is call
            this.fecthUsersWallet();
            this.fecthUsersTransaction();
        },

    }
</script>
