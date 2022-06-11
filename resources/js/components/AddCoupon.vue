<template>
    <div class="container">
                <div class="row">
                 <loading :active.sync="isLoading"
                 :is-full-page="true"></loading>
                    <div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Load coupon code </h4>

                            </div>

                            <div class="card-body">
                            <form @submit.prevent="createCoupon">
                                <div class="basic-form">
                                    <p class="text-danger" v-if="error">{{ error }}</p>
                                     <div class="mb-3">
                                            <input maxlength="6" type="text" v-model="couponform.coupon_code" name="coupon_code" id="coupon_code" class="form-control form-control-sm" placeholder="Enter coupon code">
                                        </div>
                                        {{ errors.get('coupon_code') }}

                                    </div>
                                <input type="hidden" name="user_id" v-model="couponform.user_id">

                                <button type="submit" class="btn btn-primary" id="btn_reg"><i class="fa fa-plus"></i> Add</button>
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
    /* declear the pros for logged in user details here */
        props: ['app'],

        // this will also call the vue component
        name: "AddCoupon",
     data() {
        return {
            error: '',
            isLoading: false,
            fullPage: false,
            errors: new Errors(),
            components: {
            Loading
            },
            /* this is where you assign/call the logged user details to a veriable so that you
            you it in the vue page */

            user_name: this.$user.name,

            user_email: this.$user.email,
            couponform: [],
      // declear veriable
      /* here you declear the form details below*/
             couponform: {
                coupon_code: "",
                user_id: this.$user.id,
                },

        };
    },

     methods:{
        // function to create/register new users
            createCoupon(){
        /* this start the progress bar */
                let loader = this.$loading.show({
                 container: this.fullPage ? null : this.$refs.formContainer,
                });

        // this send reguest to api to create/register the user
        axios.post("/api/coupon", this.couponform)
        .then((response) => {

        //clear the form
        this.couponform = {coupon_code:'' }
                    toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: 'Coupon added successfully.'
                    });

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

