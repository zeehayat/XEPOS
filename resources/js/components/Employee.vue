<script setup>
import {ref,onMounted} from 'vue'
import { useRouter, useRoute } from 'vue-router'
import axios from 'axios';


const route = useRoute();
const router=useRouter();

const first_name=ref('')
const last_name = ref('')
const company = ref('')
const email = ref('')
const phone = ref('')
const company_list=ref('')

onMounted(()=>{
axios.get('api/company').then(response=>{
    company_list.value=response.data

})
});
function submit(){

    const formData = new FormData()
    formData.append('first_name',first_name.value)
    formData.append('last_name', last_name.value)
    formData.append('company_id', company.value)

    formData.append('email', email.value)
    formData.append('phone', phone.value)
    axios.post('api/employee',formData).then(
        (response)=>{
            router.push('employees')
    })
}
</script>

<template>
    <div class="flex place-content-center justify-center mt-10 rounded shadow p-5 ml-72 mr-72 bg-sky-400">
        <h1 class="text-white text-2xl font-bold">Add Employee</h1>

    </div>
    <div class="flex place-content-center justify-center">
    <div class="w-2/3 p-10 m-10 shadow rounded">
    <form @submit.prevent="submit">
    <div class="grid grid-cols-2 gap-2 mb-5">
        <div>
             <label class="font-bold">First Name</label>
        </div>
        <div>
            <input class='ring-1 focus:ring-2 p-2 rounded w-72'  type="text" v-model="first_name">
        </div>
    </div>

    <div class="grid grid-cols-2 gap-2 mb-5">
            <div>
                 <label class="font-bold">Last Name</label>
            </div>
            <div>
    <input class='ring-1 focus:ring-2 p-2 rounded w-72'  type="text" v-model="last_name">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2 mb-5">
            <div>
                 <label class="font-bold">Company</label>
            </div>
            <div>
                <select v-model="company" class='ring-1 focus:ring-2 p-2 rounded w-72' >
                    <option v-for="company in company_list" :value="company.id">{{ company.name }}</option>
                </select>
            </div>
        </div>

         <div class="grid grid-cols-2 gap-2 mb-5">
                <div>
                     <label class="font-bold">Email</label>
                </div>
                <div>
                        <input class='ring-1 focus:ring-2 p-2 rounded w-72'  type="email" v-model="email">
                </div>
            </div>
             <div class="grid grid-cols-2 gap-2 mb-5">
                <div>
                     <label class="font-bold">Phone</label>
                </div>
                <div>
                        <input class='ring-1 focus:ring-2 p-2 rounded w-72'  type="text" v-model="phone">
                </div>
            </div>
             <div class="grid grid-cols-2 gap-2 mb-5">
                    <div>

                    </div>
                    <div>
                        <button type="submit" class="p-3 bg-sky-600 hover:bg-sky-800 font-bold text-white rounded shadoe-2xl">Add Employee</button>
                    </div>
                </div>

    </form>
    </div>
    </div>
</template>
