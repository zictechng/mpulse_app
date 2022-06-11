<template>
    <div class="container">

        <div class="row justify-content-center">
     <div class="row">
                <loading :active.sync="isLoading"
                            :is-full-page="true"></loading>
                    <div class="col-lg-12">

                        <div class="card" v-if="historys.data.length">
                            <div class="card-header">
                                <h4 class="card-title">Transaction History </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table class="table table-responsive-md" id="example" >
                                        <thead>
                                            <tr>
                                                <th style="width:80px;"><strong>#</strong></th>
                                                <th><strong>Amount</strong></th>
                                                <th><strong>Type</strong></th>
                                                <th><strong>Description</strong></th>
                                                <th><strong>Date</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="history, index in historys.data" :key="history.id">
                                                <td><strong>{{historys.from+index}}</strong></td>
                                                <td>{{ history.send_amt }}</td>
                                                <span v-if="history.status == 'Credit'">
                                                <td><span class="badge light badge-success">{{ history.status }}</span></td>
                                                </span>
                                                <span esle v-if="history.status == 'Debit'">
                                                <td><span class="badge light badge-danger">{{ history.status }}</span></td>
                                                </span>
                                                <td><span class="">{{ history.action_nature }}</span></td>
                                                <td>{{ history.created_at | mydate}}</td>
                                              </tr>

                                        </tbody>
                                    </table>
                                        <nav>
                                    <ul class="pagination pagination-gutter pagination-danger">
                                        <li class="page-item active">
                                         <pagination :data="historys" @pagination-change-page="view" :limit="-1">
                                        </pagination>
                                        </li>
                                        <li class="page-item page-indicator">
                                         <pagination :data="historys" @pagination-change-page="view" :limit="-1" :show-disabled="true">

                                        <template #prev-nav>
                                            <span>&lt; Previous</span>
                                        </template>
                                        <template #next-nav>
                                            <span>Next &gt;</span>
                                        </template>

                                    </pagination>
                                        </li>


                                    </ul>
                                </nav>

                                <div class="mx-auto text-gray-600">Showing {{ historys.from }} to {{ historys.to }} of {{ historys.total }} entries</div>
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
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
    export default {
        pros:['app'],
        name: 'History',

        data(){
            return{
                user_id: this.$user.id,
                id: this.$user.id,
                page: 1,
                isLoading: false,
                fullPage: false,
                data: "",
                components: {
                Loading
                },
                historys: {},
            }

        },

        methods:{
            view(page = 1) {
                let loader = this.$loading.show({
                 container: this.fullPage ? null : this.$refs.formContainer,
                });
        axios.get("api/viewhistory?id="+ this.$user.id+'&pageNumber='+page)
        .then(({data}) => (this.historys = data));
        // axios.get("/api/viewhistory?id="+ this.$user.id)
        // .then(({data}) =>(this.historys = data))
        loader.hide();
        this.isLoading = false;
            },
         },
        created() {
            // this function to load users once the page is call
            this.view();
        },

    }
</script>
