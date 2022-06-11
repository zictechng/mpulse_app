<template>
    <div class="container">
        <div class="row">
            <loading :active.sync="isLoading"
                 :is-full-page="true"></loading>
                    <div class="col-xl-9 col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Cash Out </h4>
                            </div>
                            <div class="card-body">
                        <form @submit.prevent="cashOut">
                                <div class="basic-form">
                                    <p class="text-danger" v-if="error">{{ error }}</p>
                                <div class="mb-3">
                                    <input type="text" name="code_amt" id="code_amt" v-model="cashoutform.code_amt" class="form-control form-control-sm" placeholder="Enter amount">
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                <textarea class="form-control" rows="4" name="shot_note" id="shot_note" v-model="cashoutform.shot_note" placeholder="Note to serve you better"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" v-model="cashoutform.user_id">
                            <input type="hidden" name="user_email" v-model="cashoutform.user_email">
                            <input type="hidden" name="user_name" v-model="cashoutform.user_name">
                            <input type="hidden" name="user_phone" v-model="cashoutform.user_phone">
                                <button type="submit" class="btn btn-primary" id="btn_reg"><i class="fa fa-check"></i> Submit</button>
                        </form>
                            </div>
                        </div>
					</div>
                    <!--<div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Textarea</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="mb-3">
                                            <textarea class="form-control" rows="4" id="comment"></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>-->
                </div>
    </div>
</template>

<script>
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
class Errors{
    constructor(){
        this.errors = {}
    }
    get(field){
        if(this.errors[field]){
            return this.errors[field][0];
        }
    }
    record(errors){
        this.errors = errors.errors;
    }
}
    export default {
        pros:['app'],
        name: 'CashOut',

        data(){
            // declear variable here
            return{
             error: '',
            isLoading: false,
            fullPage: false,
            errors: new Errors(),
            components: {
            Loading
            },

            /* declear form name */
            cashoutform:{
            /* declear form input name here */
                code_amt: "",
                user_id: this.$user.id,
                user_email: this.$user.email,
                user_name: this.$user.name,
                user_phone: this.$user.phone,
                shot_note: "",
             },
            };
        },

        methods:{
            // function to send cashout request to server
            cashOut(){
                /* this start the progress bar */
                let loader = this.$loading.show({
                 container: this.fullPage ? null : this.$refs.formContainer,
                });

                // this send reguest to api
        axios.post("/api/cash", this.cashoutform)
        .then((response) => {

                    toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: 'Request submitted successfully!.',
                    });
                 //clear the form input
                    this.cashoutform.code_amt = null;
                    this.cashoutform.shot_note = null
                loader.hide();

           })
            .catch((error) => {
                    toast.fire({
                    type: 'error',
                    icon: 'warning',
                    title: error.response.data.message
                    });
                    loader.hide();
                    this.error = error.response.data.message
                })

            }
        },

    }
</script>
<style>

</style>
