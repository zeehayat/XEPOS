import './bootstrap';
import {createApp} from 'vue'
import { createRouter, createWebHistory } from 'vue-router';

import App from './App.vue'
import Employee from './components/Employee.vue'
import Company from './components/Company.vue'
import EmployeeList from './components/EmployeeList.vue'
import EditEmployee from './components/EditEmployees.vue'
import EditCompany from './components/EditCompany.vue'
import ListCompany from './components/ListCompany.vue'
import Login from './components/Login.vue'
const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/', component: App },
    { path: '/company', component: Company },
    { path: '/employee', component: Employee },
    {path:'/employees',component: EmployeeList},
    { path: '/empeit/:id', component: EditEmployee },
    { path: '/companies/', component: ListCompany },
    { path: '/companyedit/:id', component: EditCompany },
    {path:'/login', component:Login},
    {path:'/', component:Login},
  ],
});
export default router
createApp(App).use(router).mount("#app")




