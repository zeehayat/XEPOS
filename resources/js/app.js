import './bootstrap';
import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import store from './store/index.js'
import App from './App.vue'
import Employee from './components/Employee.vue'
import Company from './components/Company.vue'
import EmployeeList from './components/EmployeeList.vue'
import EditEmployee from './components/EditEmployees.vue'
import EditCompany from './components/EditCompany.vue'
import ListCompany from './components/ListCompany.vue'
import Dashboard from './components/Dashboard.vue'
import Login from './components/Login.vue'
const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: App },
        {
            path: '/company', component: Company, meta: {
                requiresAuth: true
            }
        },
        {
            path: '/employee', component: Employee, meta: {
                requiresAuth: true
            }
        },
        {
            path: '/employees', component: EmployeeList, meta: {
                requiresAuth: true
            }
        },
        {
            path: '/empeit/:id', component: EditEmployee, meta: {
                requiresAuth: true
            }
        },
        {
            path: '/companies/', component: ListCompany,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/companyedit/:id', component: EditCompany,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/login', name: 'login', component: Login,
        },
        { path: '/', component: Login },
        {
            path: '/dashboard', name: 'dashboard', component: Dashboard,
            meta: {
                requiresAuth: true
            }
        },
    ],
});
router.beforeEach((to, from) => {
    if (to.meta.requiresAuth && !localStorage.getItem('token')) {
        return { name: 'login' }
    }
    if (to.meta.requiresAuth == false && localStorage.getItem('token')) {
        return { name: 'dashboard' }
    }

})
export default router
createApp(App).use(router, store).mount("#app")




