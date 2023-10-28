<script setup>
import {ref,onMounted} from 'vue'

import axios from 'axios';
const employeeList=ref('')
const first_name=ref('')
const last_name = ref('')
const company = ref('')
const email = ref('')
const phone = ref('')
const company_list=ref('')
onMounted(() => {

     axios.get('api/employee/').then(response => {
        employeeList.value=response.data
        console.log(response.data)

    })
})
function edit(){

    //router.push
}

function del(id){
var cfrm=confirm("Are you sure you want to delete")
if(cfrm){
    axios.delete('/api/employee/'+id).then(response=>{
        alert("Succesfully deleted")
    })
}
}

function view(){
alert("viewing")
}
</script>
<template>
<h1 class="text-2xl">Employee List</h1>
    <div class="relative overflow-x-auto m-10">
    <table  class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <td>ID</td>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Company ID</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

                <tr v-for="el in employeeList"  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td>{{ el.id }}</td>
                    <td>{{ el.first_name }}</td>
                    <td>{{ el.last_name }}</td>
                    <td>{{ el.company_id }}</td>
                    <td>{{ el.email }}</td>
                    <td>{{ el.phone }}</td>
                    <td>
                        <button class="p-1 m-2 rounded bg-blue-400 text-white" @click="view">View</button>
                        <router-link :to="'/empeit/'+ el.id" class="p-1 m-2 rounded bg-yellow-400 text-red">Edit</router-link>
                        <button class="p-1 m-2 rounded bg-red-400 text-white" @click="del(el.id)">Delete</button>

                    </td>
                </tr>
            </tbody>


    </table>
                        <button class="p-1 m-2 rounded bg-blue-400 text-white">Next</button>
                                                <button class="p-1 m-2 rounded bg-blue-400 text-white">Previous</button>
</div>
</template>
