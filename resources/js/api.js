import axios from 'axios';

const apiClient = axios.create({
    baseURL: '/api',
    withCredentials: true,
});

export default {
    getUser() {
        return apiClient.get('/user');
    },
    addCompany(formData){
        alert('Submitting')
        return apiClient.post('/company',formData)
    }
};
