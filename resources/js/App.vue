<template>
   Name: <input type="text" v-model="formData.name">
    Email: <input type="text" v-model="formData.email">

    Website: <input type="text" v-model="formData.website">
    <button @click="submit" type="submit">Submit</button>
</template>
<script setup>
import {ref} from 'vue'
import api from './api'
const formData=ref({
    name:'',
    email:'',
    logo:'',
    website:''
})

function submit(){
    api.addCompany(this.formData).then(response=>{
        console.log(response)
    })
    // axios.post('/api/company', this.formData).then(response => {
    //     console.log(response.data)
    // })
}
// const name=ref('')
// const email=ref('')
// const logo=ref('')
// const website=ref('')


</script>
