<template>
    <div class="container">
        <div class="row">
            <loading :active.sync="isLoading"
                 :is-full-page="true"></loading>
                    <div class="col-xl-9 col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">System Settings </h4>
                            </div>
                        <form @submit.prevent="saveSetting" >
                            <div class="card-body">
                                <p class="text-danger" v-if="error">{{ error }}</p>
								<div class="row">
									<div class="col-xl-9 col-xxl-6 col-6">
                                        {{ settingform.topup_email=='1'}}
										<div class="form-check custom-checkbox mb-3" v-if="settingform.topup_email=='0'
                                         || settingform.topup_email==''">
                                           <input type="checkbox" class="form-check-input" id="topup_email" name="topup_email" v-model="settingform.topup_email">
                                         <label class="form-check-label" for="topup_alert">Top-Up Email Alert 1</label>

										</div>
                                        <div class="form-check custom-checkbox mb-3" v-else>
                                           <input type="checkbox" class="form-check-input" id="topup_email" name="topup_email" checked v-model="settingform.topup_email">
                                         <label class="form-check-label" for="topup_email">Top-Up Email Alert 2</label>
                                            {{settingform.topup_email}}
										</div>
									</div>
									<div class="col-xl-4 col-xxl-6 col-6">
										<div class="form-check custom-checkbox mb-3" v-if="settingform.credit_email == 1">
                                           <input type="checkbox" class="form-check-input" id="credit_email" name="credit_email" checked v-model="settingform.credit_email">
                                            <label class="form-check-label" for="credit_alert">Credit Email Alert True</label>

                                        </div>
                                        <div class="form-check custom-checkbox mb-3" v-else-if="settingform.credit_email!='1'">
                                           <input type="checkbox" class="form-check-input" id="credit_email" name="credit_email2"  v-model="settingform.credit_email">
                                           <label class="form-check-label" for="credit_email">Credit Email Alert False </label>

                                        </div>
									</div>
									<div class="col-xl-4 col-xxl-6 col-6">
										<div class="form-check custom-checkbox mb-3">
                                            <span v-if="settingform.debit_email=='1'" >
											<input type="checkbox" class="form-check-input" id="debit_email" name="debit_email" checked v-model="settingform.debit_email">
                                            </span>
                                            <span v-else-if="settingform.debit_email!='1'">
                                            <input type="checkbox" class="form-check-input" id="debit_email" name="debit_email" v-model="settingform.debit_email">
											</span>
                                            <label class="form-check-label" for="debit_email">Debit Email Alert </label>
                                             {{ settingform.debit_email }}
										</div>
									</div>
									<div class="col-xl-4 col-xxl-6 col-6">
										<div class="form-check custom-checkbox mb-3">
                                            <span v-if="settingform.update_email=='1'">
											<input type="checkbox" class="form-check-input" id="update_email" name="update_email" checked v-model="settingform.update_email">
                                            </span>
                                            <span v-else-if="settingform.update_email !='1'">
                                            <input type="checkbox" class="form-check-input" id="update_email" name="update_email" v-model="settingform.update_email">
											</span>
                                            <label class="form-check-label" for="update_email">System Update Email Alert </label>
                                            {{settingform.update_email}}
										</div>
									</div>
									<div class="col-xl-4 col-xxl-6 col-6">
										<div class="form-check custom-checkbox mb-3">
                                            <span v-if="settingform.acct_email=='1'">
											<input type="checkbox" class="form-check-input" id="acct_email" name="acct_email" checked v-model="settingform.acct_email">
                                            </span>
                                            <span v-else-if="settingform.acct_email !='1'">
                                            <input type="checkbox" class="form-check-input" id="acct_email" name="acct_email" v-model="settingform.acct_email">
											</span>
                                            <label class="form-check-label" for="acct_email">Account Email Alert </label>
                                            {{settingform.acct_email}}
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="form-check custom-checkbox mb-4">
                                            <span v-if="settingform.fa2_email=='1'">
											<input type="checkbox" class="form-check-input" id="fa2_email" name="fa2_email" checked v-model="settingform.fa2_email">
                                            </span>
                                            <span v-else-if="settingform.fa2_email!='1'">
                                            <input type="checkbox" class="form-check-input" id="fa2_email" name="fa2_email" v-model="settingform.fa2_email">
											</span>
                                            <label class="form-check-label" for="fa2_email">Activate 2FA </label>
                                            {{ settingform.fa2_email }}
										</div>
									</div>
									<div class="col">
										<div class="form-check custom-checkbox mb-4">
                                            <span v-if="settingform.promo_email=='1'">
											<input type="checkbox" class="form-check-input" id="promo_email" name="promo_email" checked v-model="settingform.promo_email">
                                            </span>
                                            <span v-else-if="settingform.promo_email!='1'">
                                            <input type="checkbox" class="form-check-input" id="promo_email" name="promo_email" v-model="settingform.promo_email">
                                            </span>
                                            <label class="form-check-label" for="promo_email">Promotional Email Alert </label>
                                            {{settingform.promo_email}}
										</div>
									</div>
									<div class="col">
										<div class="form-check custom-checkbox mb-4">
                                            <span v-if="settingform.otp_email=='1'">
											<input type="checkbox" class="form-check-input" id="otp_email" name="otp_email" checked v-model="settingform.otp_email">
                                            </span>
                                            <span v-else-if="settingform.otp_email!='1'">
                                            <input type="checkbox" class="form-check-input" id="otp_email" name="otp_email" v-model="settingform.otp_email">
											</span>
                                            <label class="form-check-label" for="otp_email">Activate Transfer OTP</label>
                                            {{settingform.otp_email}}
										</div>
                                    <input type="hidden" name="user_id" v-model="settingform.user_id">
                                        <button type="submit" class="btn btn-primary btn-xxs"> Save Setting</button>
									</div>

								</div>
                            </div>
                        </form>
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
        name: 'Settings',

        data(){
            // declear variable here
            return{
             error:'',
            isLoading: false,
            fullPage: false,
            errors: new Errors(),
            components: {
            Loading
            },
            /* declear form name */
            settingform:{
            /* declear form input name here */
                topup_email: "",
                credit_email: "",
                debit_email: "",
                update_email: "",
                acct_email: "",
                fa2_email: "",
                promo_email: "",
                otp_email: "",
                user_id: this.$user.id,
                user_email: this.$user.email,
                user_name: this.$user.name,
                user_phone: this.$user.phone,
             },
             getdetails:{

             },

            };
        },
        methods:{

            // function to send cashout request to server
            saveSetting(){
                /* this start the progress bar */
                let loader = this.$loading.show({
                 container: this.fullPage ? null : this.$refs.formContainer,
                });

                // this send reguest to api
                 axios.post("/api/setting", this.settingform)
                .then((response) => {
                    console.log(response.statusText);
                    toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: response.data.message,
                    });
                 //clear the form input
                   loader.hide();
                     })
                    .catch((error) => {

                    toast.fire({
                    type: 'error',
                    icon: 'warning',
                    title: error.message
                    });
                    loader.hide();
                })
            },
            /* get user setting details here */
               getSetting(){
            axios.get('/api/getsetting?id='+this.$user.id).
            then(response =>{
                console.log(response)
                this.settingform = response.data});
           if(this.settingform.credit_email==''){
                console.log('True');
                }
              },
        },
        created() {
            // this function to load users once the page is call
             this.getSetting();
        },

    }
</script>
