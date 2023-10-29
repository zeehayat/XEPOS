<script setup>
import {ref} from 'vue'
import axios from 'axios'
import {useRouter} from 'vue-router'
import store from '../store/index.js'

const router=useRouter()



const email = ref('')
const password = ref('')
const errors = ref('')

function submit(){
    const formData = new FormData()

    formData.append('email',email.value)
    formData.append('password',password.value)
    axios.get('/sanctum/csrf-cookie').then(response=>{
        console.log(response)
        axios.post('/api/login', formData).then(response => {

            localStorage.setItem('token',response.data.access_token)
            store.dispatch('setToken',response.data.access_token)
            router.push({'name':'dashboard'})

        }).catch(err => {
            errors.value = err.message
        })
    })

}
</script>
<template>
<div class="md:flex md:place-content-center lg:m-5 xs:m-2 md:m-5 md:items-center md:justify-center">
    <div class="shadow-2xl w-1/2 h-96 m-10 p-5 rounded">
        <h1 class="text-2xl text-sky-600 mb-10 border-b-2 border-b-sky-800 pb-5">Login</h1>
    <form @submit.prevent="submit">
        <div class="grid grid-cols-2 md:gap-2 mt-4">
            <div>
                <label>Email</label>
            </div>
            <div>
                <input type="email" v-model="email" class="ring-1 ring-gray-300 md:h-10 focus:ring-4 focus:ring-sky-800 md:pl-1 rounded md:w-96 xs:w-auto">
            </div>
        </div>
        <div class="grid grid-cols-2 md:gap-2 mt-4">
        <div>
                    <label>Password</label>
                </div>
                <div>
                    <input type="password" v-model="password" class="ring-1 ring-gray-300 md:h-10 pl-1 rounded md:w-96 xs:w-16">
                </div>
            </div>
            <div class="grid grid-cols-4 gap-2 mt-4">
            <div class="col-span-3">

                    </div>
                    <div>
                        <button type="submit" class="bg-sky-600 hover:bg-sky-800 md:p-3 rounded md:w-32 font-extrabold text-white shadow">Login</button>
                    </div>
                </div>
    </form>
    {{ errors }}
    </div>
</div>

</template>
