<script setup>
import {ref,onMounted} from 'vue'
import axios from 'axios';
const employeeList=ref('')

onMounted(() => {
    console.log('Mounted')
     axios.get('api/employee/2').then(response => {
        employeeList.value=response.data
        console.log(response.data)

    })
})
function edit(){

    alert("editing")
}

function del(){
alert('Deleting')
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
                    <td>{{ el.first_name }}</td>
                    <td>{{ el.last_name }}</td>
                    <td>{{ el.company_id }}</td>
                    <td>{{ el.email }}</td>
                    <td>{{ el.phone }}</td>
                    <td>
                        <button class="p-1 m-2 rounded bg-blue-400 text-white" @click="view">View</button>
                        <button class="p-1 m-2 rounded bg-yellow-400 text-red" @click="edit">Edit</button>
                        <button class="p-1 m-2 rounded bg-red-400 text-white" @click="del">Delete</button>

                    </td>
                </tr>
            </tbody>


    </table>
                        <button class="p-1 m-2 rounded bg-blue-400 text-white">Next</button>
                                                <button class="p-1 m-2 rounded bg-blue-400 text-white">Previous</button>
</div>
</template>
