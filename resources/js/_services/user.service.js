import config from 'config';
import axios from 'axios'
import { authHeader } from '../_helpers';

const instance = axios.create({
    baseURL: 'http://127.0.0.1:8000/api/bensms'
});

const dataInstance = axios.create({
    baseURL: 'http://127.0.0.1:8000/api/bensms'
});

instance.defaults.headers.common['Authorization'] = "Bearer mpH9a996ARCSLIxa73OH6Kc2EmTO9PxduLvC3Ke0";
instance.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

export const userService = {
    login,
    logout,
    register,
    getAll,
    getById,
    update,
    delete: _delete
};

function login(username, password) {


    instance.post('/login',{
        email: this.form.email,
        password: this.form.password
    }).then(handleResponse).then((response) => {
        const token = response.data.success.token;
        localStorage.setItem('token', token)
        const ele = "Bearer ".concat(token);
        localStorage.setItem('authorization',ele);
        this.form.token = ele;
        dataInstance.defaults.headers.common['Authorization'] = this.form.token;
        dataInstance.get('/user').then((res) =>{
            this.form.user = res.data.data.user;
            localStorage.setItem('user', this.form.user );
            if(this.form.user.email === this.form.email){
                return  this.form.user;
            }
        }).catch((err) =>{
            this.errored = true
        })
    }).catch((error)=>{
        this.errored = true
    });
}

function logout() {
    // remove user from local storage to log user out
    localStorage.removeItem('user');
    localStorage.removeItem('token');
    localStorage.removeItem('authorization');
}

function register(user) {
    setHeader();
    return dataInstance.post('user', user).then(handleResponse);
}

function getAll() {
    const requestOptions = {
        method: 'GET',
        headers: authHeader()
    };

    return fetch(`${config.apiUrl}/users`, requestOptions).then(handleResponse);
}


function getById(id) {
    setHeader();
    return dataInstance.get('user', {
        id: id
    }).then(handleResponse);
}

function update(user) {
    setHeader();
    return dataInstance.put('user', user).then(handleResponse);
}

// prefixed function name with underscore because delete is a reserved word in javascript
function _delete(id) {
    setHeader();
    return dataInstance.delete('user', {
        id:id
    }).then(handleResponse);
}

function handleResponse(response) {
    return response.text().then(text => {
        const data = text && JSON.parse(text);
        if (!response.ok) {
            if (response.status === 401) {
                // auto logout if 401 response returned from api
                logout();
                location.reload(true);
            }
            const error = (data && data.message) || response.statusText;
            return Promise.reject(error);
        }

        return data;
    });
}

function setHeader() {
    dataInstance.defaults.headers.common['Authorization'] = localStorage.getItem('authorization');
}