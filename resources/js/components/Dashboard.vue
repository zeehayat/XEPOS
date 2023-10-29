<script setup>

import { useRouter } from 'vue-router'
import store from '../store/index.js'
import {useStore} from 'vuex'
const router = useRouter()
const storex=useStore()

function logout (){
    store.dispatch('removeToken')
    localStorage.removeItem('token')

    router.push({ name: 'login' })
}
</script>

<template>
<button class="bg-sky-800 p-3 mt-5 text-white font-extrabold" @click="logout">Logout</button>
<p>{{ store.getters.getToken }}</p>
</template>
