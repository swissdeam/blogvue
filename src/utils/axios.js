import axios from "axios";

const instance = axios.create({
    baseURL: 'http://127.1.0.1:8080',
    timeout: 1000,
    headers: {'X-Requested-With': 'XMLHttpRequest'},
    withCredentials: true,
});

instance.interceptors.request.use(function (config) {
    const token = localStorage.getItem('x_xsrf_token');
    console.log(token)
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }

    return config;
});

export default instance