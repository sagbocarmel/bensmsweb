
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
    // instance.defaults.headers.post['Authorization'] = ele;
    // instance.get('/user',{}).then((res) =>{
    //     console.log(res.data);
    // }).catch((err) =>{
    //     //console.log(ele);
    // })

    dateInstance.defaults.headers.common['Authorization'] = this.form.token;
    dateInstance.get('/user').then((res) =>{
        this.form.user = res.data.data.user;
        if(this.form.user.email == this.form.email){
            // this.$router.push('dashboard')
            window.location.href = "/sms/dashboard"
        }
    }).catch((err) =>{
        this.errored = true
    })
}).catch((error)=>{
    this.errored = true
});

export default class Request{

}