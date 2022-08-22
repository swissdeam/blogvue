import axios from "axios";

const instance = axios.create({
    baseURL: 'http://localhost',
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