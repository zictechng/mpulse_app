<template>
    <div class="container">
        <div class="row">
            <div class="col-xl-5">
            <span class="text-danger" v-if="error">{{ error.response.message }}</span>

                <loading :active.sync="isLoading" :is-full-page="true">
                </loading>
					<div class="col-xl-9 col-lg-6 col-sm-6">

						<div class="card overflow-hidden">

							<div class="text-center p-3 overlay-box " style="background-image: url(/master/images/big/img1.jpg);">
                                <div v-if="profileform.photo ==''">
                                <div class="profile-photo">
									<img :src="'/master/images/profile/pic1.jpg'" class="img-fluid rounded-circle" alt="" width="100">
								</div>
                                </div>
                                <div v-else>
                                <div class="profile-photo">
									<img :src="avatar" class="img-fluid rounded-circle" alt="Profile Photo" width="100"/>
								</div>
                                </div>

								<h3 class="mt-3 mb-1 text-white">{{profileform.name}}</h3>
								<p class="text-white mb-0">{{profileform.email}}</p>

							</div>
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Update Photo</span>
                                    <strong class="text-muted">
                                        <div class="form-check custom-checkbox mb-4">
											<input type="checkbox" class="form-check-input" v-on:click="showimageform()" :id="acct_alert" v-model="rolesSelected" ref="rolesSelected" required="">
											<label class="form-check-label" for="acct_alert"></label>
										</div>
                                    </strong>
                                </li>

							</ul>

                            <form method="post" enctype="multipart/form-data" v-if="showupload_form">
                                <li>
                                <input type="file" @change="getPhoto" name="image" id="image" class="form-control" placeholder="Photo" accept="image/*">
                                </li>
                                <div class="card-footer border-0 mt-0" v-if="loadedbutton">
                                    <button @click.prevent="photoUpload" class="btn btn-primary btn-sm btn-block">
                                        <i class="fa fa-camera"></i> Update
                                    </button>
                                </div>
                            </form>

					    </div>
					</div>
                </div>
                    <div class="col-xl-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">Personal Information</a>
                                            </li>
                                            <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Update Profile</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="my-posts" class="tab-pane fade active show">
                                                <div class="profile-personal-info">
                                                    <br><br>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{profileform.name}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Phone <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{profileform.phone}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Sex <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{profileform.sex}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">State <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{profileform.state}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Location <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{profileform.location}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Date of Birth <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{profileform.dob}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Occupation <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{profileform.occupation}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-5 col-5">
                                                            <h5 class="f-w-500">Married Status <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-8 col-7"><span>{{profileform.married_status}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Address <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{profileform.address}}</span>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <h4 class="text-primary">Account Info</h4>
                                                    <div class="row">
                                                        <div class="col-md-2 col-4">
                                                            <h5 class="f-w-500">Account MPIN <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-9 col-9"><span></span>
                                                        </div>
                                                    </div>

                                                        <div class="row mb-3">
                                                        <div class="col-sm-2 col-4">
                                                            <h5 class="f-w-500">Account Number:</h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{profileform.acctno}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Bank Account Name <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{profileform.acct_name}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Bank Name <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{profileform.bankname}}</span>
                                                        </div>
                                                    </div>
                                            </div>

                                            <div id="profile-settings" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary">Account Setting</h4>
                                                        <form>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Name</label>
                                                                    <input type="text" v-model="profileform.name" name="name" id="name" class="form-control" placeholder="Name" >
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Phone</label>
                                                                    <input type="text" v-model="profileform.phone" name="phone" id="phone" class="form-control" placeholder="Phone">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Sex</label>
                                                                    <input type="text" v-model="profileform.sex" name="sex" id="sex" class="form-control" placeholder="Sex">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Date of Birth</label>
                                                                    <input type="text" v-model="profileform.dob" name="dob" id="dob" class="form-control" placeholder="Date of Birth">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Location</label>
                                                                    <input type="text" v-model="profileform.location" name="location" id="location" placeholder="Current Location" class="form-control">
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label class="form-label">Married Status</label>
                                                                    <select class="form-control default-select wide" v-model="profileform.married_status" name="married_status" id="married_status">
                                                                        <option value="">Choose...</option>
                                                                        <option value="Married">Married</option>
                                                                        <option value="Single">Single</option>
                                                                        <option value="Other">Other</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                             <div class="row">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Address</label>
                                                                    <textarea class="form-control" rows="1" v-model="profileform.address" name="address" id="address" placeholder="Address"></textarea>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="mb-3 col-md-4">
                                                                    <label class="form-label">Account Number</label>
                                                                    <input class="form-control" v-model="profileform.acctno" name="acctno" id="acctno" placeholder="Account Number">
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label class="form-label">Account Name</label>
                                                                    <input type="text" class="form-control" v-model="profileform.acct_name" name="acct_name" id="acct_name" placeholder="Account Name">
                                                                </div>

                                                                <div class="mb-3 col-md-4">
                                                                    <label class="form-label">Bank Name</label>
                                                                    <input type="text" class="form-control" v-model="profileform.bank_name" name="bank_name" id="bank_name" placeholder="Bank Name">
                                                                </div>
                                                            </div>
                                                            <input type="hidden" class="form-control" v-model="profileform.id" name="uid" id="uid" placeholder="User ID">
                                                            <button @click.prevent="updateInfo" class="btn btn-primary" type="submit">Update</button>
                                                        </form>
                                                    </div>
                                                    <br>
                                                        <h4 class="text-primary">Change Password
                                                            <strong class="text-muted" style="float: right;">
                                                                <div class="form-check custom-checkbox mb-4">
                                                                    <input type="checkbox" class="form-check-input" v-on:click="showpasswordform()" :id="acct_alertp" v-model="rolesPass" ref="rolesPass" required="">
                                                                    <label class="form-check-label" for="acct_alert"></label>
                                                                </div>
                                                            </strong>
                                                        </h4>

                                                        <hr>
                                                         <form v-if="showpass_form">
                                                            <div class="row">
                                                                    <div class="mb-3 col-md-4">
                                                                        <label class="form-label">Old Password </label>
                                                                        <input type="password" v-model="passwordform.old_password" name="old_password" id="old_password" class="form-control" placeholder="Old Password">
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label class="form-label">New Password </label>
                                                                        <input type="password" v-model="passwordform.password" name="password" id="password" class="form-control" placeholder="New Password">
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label class="form-label">Confirm Password</label>
                                                                        <input type="password" v-model="passwordform.confirm_password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                                                                    </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Update Password</button>
                                                         </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        name: 'Profile',

        data(){
            return{
                error: '',
                 errors: new Errors(),
                user_id: this.$user.id,
                user_photo: this.$user.photo,
                id: this.$user.id,
                page: 1,
                isLoading: false,

                components: {
                Loading
                },
                historys: {},
                profileform: {
                name: '',
                email: "",
                phone: "",
                sex: "",
                state: "",
                location: "",
                address: "",
                username: "",
                dob: "",
                occupation: "",
                married_status: "",
                acctno: "",
                acct_name: "",
                bank_name: "",

                utid: this.$user.id,
                },

                profilephotoform: {

                user_id: this.$user.id,
                },
                avatar: "/master/images/profile/"+ this.$user.photo,

                //avatar: this.$user.photo,
                image: null,
                file: null,
                showupload_form: false,
                showpass_form: false,

                acct_alert: "",
                acct_alertp: "",
                loadedbutton: false,
                rolesSelected:"",
                rolesPass:"",
                files: "",
                passwordform: {
                old_password: "",
                password: "",
                confirm_password:"",
                user_id: this.$user.id,
                },
            }

        },

        methods:{
            getProfile() {
        let loader = this.$loading.show({
                 container: this.fullPage ? null : this.$refs.formContainer,
                });

        axios.get("api/profile?id="+ this.$user.id)
        .then(({data}) => (this.profileform = data));
        //.then(({ data }) => (this.historys = data));
        // axios.get("/api/viewhistory?id="+ this.$user.id)
        // .then(({data}) =>(this.historys = data))
            if(this.$user.photo ==''){
                this.avatar = "/master/images/profile/pic1.jpg";
                }
                else{
                this. avatar = "/master/images/profile/"+ this.$user.photo;
                };
                loader.hide();
                this.isLoading = false;
            },

            /* update profile goes here */
             updateInfo(){
                 let loader = this.$loading.show({
                 container: this.fullPage ? null : this.$refs.formContainer,
                });
                axios.post("/api/profileupdate", this.profileform)
                .then(() =>{
                    // show success alert message
                    toast.fire({
                    icon: 'success',
                    title: 'Profile updated successfully!'
                    });
                Fire.$emit('AfterCreation');
                 loader.hide();
                })
                .catch(() =>{
                    toast.fire({
                    icon: 'warning',
                    title: error.response.message
                    });
                    loader.hide();
                    this.isLoading = false;

                });
            },

        // here will convert image to base64 string
            getPhoto(e){
                //console.log('File Uploading...')
                let image = e.target.files[0];

                let reader = new FileReader();
                this.file = image;

                let form = new FormData();
                form.append('image', image);
                form.append('user_id', this.$user.id);
                this.file = form;
            reader.readAsDataURL(image);
            reader.onload = e => {
                this.avatar = e.target.result
                this.loadedbutton = true;
                console.log(e)
                }

            },

              photoUpload(){
                  let loader = this.$loading.show({
                 container: this.fullPage ? null : this.$refs.formContainer,
                });
                  /* check for image size here */
                  if(this.avatar['size'] > '211175'){
                      //alert('Error Image type');
                    toast.fire({
                    icon: 'error',
                    title: 'Image size should not be greater than 2MB'
                    });
                  }else{
                  axios.post('/api/uploadimage', this.file)
                  .then(()=>{
                      loader.hide();
                      this.isLoading = false;
                      this.showupload_form = false;

                      // show success alert message
                    toast.fire({
                    icon: 'success',
                    title: 'Profile image updated successfully!'
                    });

                  }).catch(()=>{
                    console.log(errors)
                // show success alert message
                    loader.hide();
                    this.isLoading = false;
                    toast.fire({
                    icon: 'error',
                    title: 'Something went wrong! Try again'
                    });
                  })
                  }
              },
               /* this validate profile image upload form to be visible when checked */
            showimageform(){
             if(this.$refs.rolesSelected.checked == true) {
                    //do something
                    this.showupload_form = true;
                }
                else{
                    this.showupload_form = false;
                }
            },
            /* this validate password form to make it visible when checked */
            showpasswordform(){
             if(this.$refs.rolesPass.checked == true) {
                    //do something
                    this.showpass_form = true;
                }
                else{
                    this.showpass_form = false;
                }
            },

         },
        created() {
            // this function to load users once the page is call
            this.getProfile();
             Fire.$on('AfterCreation',() =>{
                this.getProfile();
            });
        },

    }
</script>
