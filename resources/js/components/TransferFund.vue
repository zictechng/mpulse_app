<template>
    <div class="container">
        <div class="row">
            <loading :active.sync="isLoading"
                 :is-full-page="true"></loading>
                    <div class="col-xl-9 col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Send Coupon Cash </h4>
                            </div>
                            <div class="card-body">
                        <form @submit.prevent="sendCash">
                                <div class="basic-form">
                                    <span class="text-danger" v-if="error.code_amt.status">{{ error.code_amt.message }}</span>
                                <div class="mb-3">
                                    <input type="text" name="code_amt" id="code_amt" v-model="transferform.code_amt" class="form-control form-control-sm" placeholder="Enter Amount">
                                </div>
                            </div>
                            <div class="basic-form">

                                <div class="mb-3">
                                    <input type="text" name="rec_email" id="rec_email" v-model="transferform.rec_email" class="form-control form-control-sm" placeholder="Receiver Email ID">
                                    <span class="text-danger" v-if="error.rec_email.status">{{ error.rec_email.message }}</span>
                                </div>

                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                <textarea class="form-control" rows="2" name="shot_note" id="shot_note" v-model="transferform.shot_note" placeholder="Note (Purpose)"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" v-model="transferform.user_id">
                            <input type="hidden" name="user_email" v-model="transferform.user_email">
                            <input type="hidden" name="user_name" v-model="transferform.user_name">
                            <input type="hidden" name="user_phone" v-model="transferform.user_phone">
                                <button type="submit" class="btn btn-primary" id="btn_reg"><i class="fa fa-check"></i> Send</button>
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
        name: 'TransferFund',

        data(){
            // declear variable here
            return{
             error: {
                 code_amt:{
                     status: false,
                     message: '',
                 },rec_email:{
                     status: false,
                     message: '',
                 }
             },
            isLoading: false,
            fullPage: false,
            errors: new Errors(),
            components: {
            Loading
            },
            /* declear form name */
            transferform:{
            /* declear form input name here */
                code_amt: "",
                user_id: this.$user.id,
                user_email: this.$user.email,
                user_name: this.$user.name,
                user_phone: this.$user.phone,
                shot_note: "",
                rec_email: ""
             },
            };
        },
        methods:{

            // function to send cashout request to server
            sendCash(){
                /* this start the progress bar */
                let loader = this.$loading.show({
                 container: this.fullPage ? null : this.$refs.formContainer,
                });

                // this send reguest to api
                 axios.post("/api/cash", this.transferform)
                .then((response) => {

                    toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: 'Request submitted successfully!.',
                    });
                 //clear the form input
                    this.transferform.code_amt = null;
                    this.transferform.shot_note = null;
                    this.transferform.rec_email = null
                    loader.hide();

                 })
                    .catch((error) => {
                    this.error.code_amt.status = typeof error.response.data.errors.code_amt != undefined && error.response.data.errors.code_amt != null;
                    this.error.code_amt.message = error.response.data.errors.code_amt[0];
                    this.error.rec_email.status = typeof error.response.data.errors.rec_email != undefined && error.response.data.errors.rec_email != null;
                    this.error.rec_email.message = error.response.data.errors.rec_email[0];
                    toast.fire({
                    type: 'error',
                    icon: 'warning',
                    title: this.error.code_amt.message + ',<br> ' + this.error.rec_email.message
                    });
                    loader.hide();
                })

            }
        },
        created() {
            // this function to load users once the page is call

        },

    }
</script>
