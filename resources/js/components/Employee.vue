<script setup>
import {ref,onMounted} from 'vue'
import axios from 'axios';
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
    alert('submitting')
    const formData = new FormData()
    formData.append('first_name',first_name.value)
    formData.append('last_name', last_name.value)
    formData.append('company_id', company.value)

    formData.append('email', email.value)
    formData.append('phone', phone.value)
    axios.post('api/employee',formData).then(
        (response)=>{
        console.log(response.data)
    })
}
</script>

<template>
    <h1>Add Employee</h1>
    <div class="flex place-content-center justify-center">
    <div class="w-2/3 p-10 m-10 shadow rounded">
    <form @submit.prevent="submit">
    <div class="grid grid-cols-2 gap-2 mb-5">
        <div>
             <label class="font-bold">First Name</label>
        </div>
        <div>
            <input class='ring-1 focus:ring-2 p-2 rounded'  type="text" v-model="first_name">
        </div>
    </div>

    <div class="grid grid-cols-2 gap-2 mb-5">
            <div>
                 <label class="font-bold">Last Name</label>
            </div>
            <div>
    <input class='ring-1 focus:ring-2 p-2 rounded'  type="text" v-model="last_name">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2 mb-5">
            <div>
                 <label class="font-bold">Company</label>
            </div>
            <div>
                <select v-model="company" class='ring-1 focus:ring-2 p-2 rounded' >
                    <option v-for="company in company_list" :value="company.id">{{ company.name }}</option>
                </select>
            </div>
        </div>

         <div class="grid grid-cols-2 gap-2 mb-5">
                <div>
                     <label class="font-bold">Email</label>
                </div>
                <div>
                        <input class='ring-1 focus:ring-2 p-2 rounded'  type="email" v-model="email">
                </div>
            </div>
             <div class="grid grid-cols-2 gap-2 mb-5">
                <div>
                     <label class="font-bold">Phone</label>
                </div>
                <div>
                        <input class='ring-1 focus:ring-2 p-2 rounded'  type="text" v-model="phone">
                </div>
            </div>
             <div class="grid grid-cols-2 gap-2 mb-5">
                    <div>

                    </div>
                    <div>
                        <button type="submit" class="p-3 bg-blue-400 text-white rounded shadoe-2xl">Add Employee</button>
                    </div>
                </div>

    </form>
    </div>
    </div>
</template>
