<script setup>
import { ref,onMounted } from 'vue';
import axios from 'axios'
import { useRouter } from 'vue-router'

const router = useRouter()
const companies=ref('')

onMounted(() => {
     axios.get('/api/sanctum').then(response => {
        axios.get('/api/company').then(response => {

            companies.value = response.data
        })
    })
})

function edit(id){

    router.push('/companyedit/'+id)
}
function del(id){
    let cfrm=confirm('Are you sure you want to delete')
    if(cfrm){

        axios.delete('/api/company/'+id).then(response => {
            alert("Deleted Succesfully")
            router.push('/companies')
        }).catch(err=>{
            alert("Error Deleting Record. This Company might have child records that needs to be deleted first. \n"+err.message)
        })
    }
    else {
        alert("Next time be carefull :)")
    }
}



</script>

<template>
   <h1 class="text-2xl">Company List</h1>
        <div class="relative overflow-x-auto m-10">
        <table  class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="company in companies">
                            <td>{{ company.id }}</td>
                            <td>{{ company.name }}</td>
                            <td>{{ company.email }}</td>
                            <td><img class=" w-32 h-32" :src="'/storage/uploads/'+company.logo">
                                {{ company.logo.replace('public/uploads',company.logo) }}

                            </td>
                            <td>{{ company.website }}</td>
                            <td>
                                <button class="bg-sky-600 p-2 text-white rounded shadow hover:bg-sky-800 mr-5 " @click="edit(company.id)">Edit</button>
                                <button class="bg-red-600 p-2 rounded shadow hover:bg-red-800 text-white " @click="del(company.id)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                    </div>
{{ companies }}

</template>
