<script setup>
import {ref,onMounted} from 'vue'
import axios from "axios"

import { useRouter } from 'vue-router'
const name=ref('')
const email=ref('')
const website=ref('')
const logo=ref('')
const success=ref(false)
const router = useRouter()
const file=ref(null)
onMounted(()=>{
    let id=router.currentRoute.value.params.id
   // let id=$route.params.id

    axios.get('/api/company/'+id).then(response=>{
        name.value=response.data.name
        email.value=response.data.email
        website.value=response.data.website
        logo.value=response.data.logo
        console.log(response.data)
    })
})

const onChange = (e) => {

    file.value = e.target.files[0];
}

function submit(){
    const config = {
        headers: {
            'content-type': 'multipart/form-data'
        }
    }
    let formData = new FormData();
    formData.append('logo', file.value)
    formData.append('name', name.value)
    formData.append('email', email.value)
    formData.append('website', website.value)


    let id = router.currentRoute.value.params.id
    axios.post('/api/company/'+id,formData,config).then(response=>{
          name.value = response.data.name
        email.value = response.data.email
        website.value = response.data.website
        logo.value = response.data.logo
    });
}
</script>

<template>
     <div
            class="flex place-content-center justify-center place-items-center mt-10 bg-blue-300 text-white ml-72 mr-72 rounded shadow">
            <h2 class="text-[36px] font-bold">Edit Company</h2>
        </div>

        <div class="flex place-content-center justify-center">
            <div class="p-5 m-5 rounded shadow-2xl h-auto">
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="grid grid-cols-2 gap-2  mt-10">
                        <div>
                            <label class="font-bold">Name</label>
                        </div>
                        <div>
                            <input type="text" v-model="name" class="ring-1 focus:ring-2 ring-blue-400 rounded">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2  mt-10">
                        <div>
                            <label class="font-bold">Email</label>
                        </div>
                        <div>
                            <input type="email" v-model="email" class="ring-1 focus:ring-2 ring-blue-400 rounded">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2  mt-10">
                        <div>
                            <label class="font-bold">Website</label>
                        </div>
                        <div>
                            <input type="text" v-model="website" class="ring-1 focus:ring-2 ring-blue-400 rounded">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2  mt-10">
                        <div>
                            <label class="font-bold">Logo</label>
                        </div>
                        <div>
                            <img :src="'/storage/uploads/' + logo" class="w-32 h-32 mb-4">
                            <input ref="fileInput" type="file" v-on:change="onChange" class="ring-1 ring-blue-400 rounded">
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-2 mt-10">
                        <div class="col-span-2">

                        </div>
                        <div>
                            <button type="submit"
                                class="bg-sky-600 hover:bg-sky-800 text-white p-2 rounded shadow-2xl font-bold">Update Company</button>
                        </div>
                    </div>


                </form>
                <div class="grid grid-cols-1">
                    <div class=" flex place-content-center justify-center bg-yellow-300 text-red-400 w-64" v-if="success">
                        Company Stored Succesfully</div>
                </div>
            </div>
        </div>
</template>
