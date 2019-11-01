<template>
   <b-container>
       <b-alert  class="offset-4 col-sm-4 justify-content-center" v-if="errored" variant="danger" show dismissible>
           Nom d'utilisateur ou mot de passe incorrect
       </b-alert>
       <b-container class="bg-light pt-4 pl-5 mb-4 pr-2 justify-content-sm-start col-sm-4">
           <b-h2 class="font-weight-bold p-4 m-5 text-center col-12">
               Connexion
           </b-h2>
           <b-row class="pt-4">
               <b-form @submit="onSubmit" v-if="show">
                   <b-form-group
                           id="input-group-1"
                           label="Email address:"
                           label-for="input-1"
                           description="Votre adresse e-mail "
                   >
                       <b-form-input
                               id="input-1"
                               v-model="form.email"
                               type="email"
                               required
                               placeholder="Votre e-mail"
                       ></b-form-input>
                   </b-form-group>

                   <b-form-group id="input-group-2" label="Password:" label-for="input-2"
                                 description="Votre mot passe">
                       <b-form-input
                               id="input-2"
                               v-model="form.password"
                               required
                               placeholder="Mot de passe"
                               type="password"
                       ></b-form-input>
                   </b-form-group>

                   <b-form-group id="input-group-4">
                       <b-form-checkbox-group v-model="form.checked" id="checkboxes-4">
                           <b-form-checkbox value="me">Se souvenir</b-form-checkbox>
                       </b-form-checkbox-group>
                   </b-form-group>
                   <b-button type="submit" variant="secondary">Se connecter</b-button>
                   <b-form-group class="pt-4 text-center col-12">
                       <b-link :to="'resetPass'" >Mot de passe oublié</b-link>
                   </b-form-group>

               </b-form>
           </b-row>
       </b-container>
   </b-container>
</template>

<script>

    export default {
        name: "Login",
        data(){
            return{
                form: {
                    email: '',
                    password: '',
                    checked: [],
                    token: '',
                    user: []
                },
                show: true,
                errored: false
            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault()

                //According to the docs from Lyft (https://developer.lyft.com/docs/authentication), you need to use HTTP Basic auth.

                var axios = require("axios");

                const instance = axios.create({
                    baseURL: 'http://127.0.0.1:8000/api/bensms'
                });

                const dateInstance = axios.create({
                    baseURL: 'http://127.0.0.1:8000/api/bensms'
                });


                instance.defaults.headers.common['Authorization'] = "Bearer mpH9a996ARCSLIxa73OH6Kc2EmTO9PxduLvC3Ke0";
                instance.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';


                instance.post('/login',{
                        email: this.form.email,
                        password: this.form.password
                }).then((response) => {
                    const token = response.data.success.token;
                    const ele = "Bearer ".concat(token);
                    this.form.token = ele;
                    dateInstance.defaults.headers.common['Authorization'] = this.form.token;
                    dateInstance.get('/user').then((res) =>{
                        this.form.user = res.data.data.user;
                        if(this.form.user.email == this.form.email){
                            // this.$router.push('dashboard')
                            this.$parent.$data.dashboardHeader = true
                            this.$parent.$data.noDashboardHeader = false
                            router.push("dashboard")
                        }
                    }).catch((err) =>{
                        this.errored = true
                    })
                }).catch((error)=>{
                    this.errored = true
                });

            },
            login(){

            },
        }
    }
</script>

<style scoped>

</style>