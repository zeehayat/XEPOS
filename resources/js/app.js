import './bootstrap';
import {createApp} from 'vue'
import { createRouter, createWebHistory } from 'vue-router';

import App from './App.vue'
import Employee from './components/Employee.vue'
import Company from './components/Company.vue'
import EmployeeList from './components/EmployeeList.vue'
import EditEmployee from './components/EditEmployees.vue'
const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/', component: App },
    { path: '/company', component: Company },
    { path: '/employee', component: Employee },
    { path: '/empeit/:id', component: EditEmployee },
  ],
});
createApp(App).use(router).mount("#app")




