import axios from 'axios';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

window.axios.defaults.timeout = 10000;

window.axios.interceptors.request.use(
    config => {
        if (config.method === 'get') {
            config.params = config.params || {};
            config.params['_'] = new Date().getTime();
        }
        return config;
    },
    error => {
        return Promise.reject(error);
    }
);

window.axios.interceptors.response.use(
    response => {
        return response;
    },
    error => {
        if (error.response?.status === 401) {
            window.location.href = '/login';
        }
        if (error.response?.status === 419) {
            window.location.reload();
        }
        return Promise.reject(error);
    }
);

window.api = {
    get: (url, config = {}) => axios.get(url, config),
    post: (url, data = {}, config = {}) => axios.post(url, data, config),
    put: (url, data = {}, config = {}) => axios.put(url, data, config),
    patch: (url, data = {}, config = {}) => axios.patch(url, data, config),
    delete: (url, config = {}) => axios.delete(url, config)
};