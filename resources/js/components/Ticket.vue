<template>
    <div class="container">
        <div class="row">
            <loading :active.sync="isLoading"
                 :is-full-page="true"></loading>
                    <div class="col-xl-9 col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Submit Ticket </h4>
                            </div>
                            <div class="card-body">
                        <form @submit.prevent="sendTicket">
                            <div class="basic-form">
                                <span class="text-danger" v-if="error.subject.status">{{ error.subject.message }}</span>
                                <div class="mb-3">
                                   <select class="form-control wide" name="subject" id="subject" v-model="ticketform.subject" style="display">
                                        <option value="">Select Subject</option>
                                        <option value="Fund Transfer">Fund Transfer</option>
                                        <option value="Account Limit">Account Limit</option>
                                        <option value="Account Deactivation">Account Deactivation</option>
                                        <option value="Account Funding">Account Funding</option>
                                        <option value="Invalid Coupon">Invalid Coupon</option>
                                        <option value="System Errors">System Errors</option>
                                        <option value="Others">Others</option>

                                    </select>
                                </div>
                            </div>

                            <div class="basic-form">

                                <div class="mb-3">
                                    <input type="text" name="title" id="title" v-model="ticketform.title" class="form-control form-control-sm" placeholder="Title">
                                    <span class="text-danger" v-if="error.title.status">{{ error.title.message }}</span>
                                </div>
                            </div>

                            <div class="basic-form">
                                <div class="mb-3">
                                <textarea class="form-control" rows="2" name="shot_note" id="shot_note" v-model="ticketform.shot_note" placeholder="Message"></textarea>
                                <span class="text-danger" v-if="error.shot_note.status">{{ error.shot_note.message }}</span>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" v-model="ticketform.user_id">
                            <input type="hidden" name="user_email" v-model="ticketform.user_email">
                            <input type="hidden" name="user_name" v-model="ticketform.user_name">
                            <input type="hidden" name="user_phone" v-model="ticketform.user_phone">
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
        name: 'Ticket',

        data(){
            // declear variable here
            return{
             error: {
                 subject:{
                     status: false,
                     message: '',
                 },
                 title:{
                     status: false,
                     message: '',
                 },
                 shot_note:{
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
            ticketform:{
            /* declear form input name here */
                subject: "",
                user_id: this.$user.id,
                user_email: this.$user.email,
                user_name: this.$user.name,
                user_phone: this.$user.phone,
                shot_note: "",
                title: ""
             },
            };
        },
        methods:{

            // function to send cashout request to server
            sendTicket(){
                /* this start the progress bar */
                let loader = this.$loading.show({
                 container: this.fullPage ? null : this.$refs.formContainer,
                });

                // this send reguest to api
                 axios.post("/api/ticket", this.ticketform)
                .then((response) => {
                    toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: 'Request submitted successfully!.',
                    });
                 //clear the form input
                    this.ticketform.title = null;
                    this.ticketform.shot_note = null
                    loader.hide();

                 })
                    .catch((error) => {
                    this.error.title.status = typeof error.response.data.errors.title != undefined && error.response.data.errors.title != null;
                    this.error.title.message = error.response.data.errors.title[0];
                    this.error.subject.status = typeof error.response.data.errors.subject != undefined && error.response.data.errors.subject != null;
                    this.error.subject.message = error.response.data.errors.subject[0];
                    this.error.shot_note.status = typeof error.response.data.errors.shot_note != undefined && error.response.data.errors.shot_note != null;
                    this.error.shot_note.message = error.response.data.errors.shot_note[0];
                    toast.fire({
                    type: 'error',
                    icon: 'warning',
                    title: this.error.title.message + ',<br> ' + this.error.subject.message
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
