<template>
    <h1>Edit Employee</h1>
    <div>Employee {{ $route.params.id }}</div>
     <div class="flex place-content-center justify-center">
        <div class="w-2/3 p-10 m-10 shadow rounded">
        <form @submit.prevent="submit">
        <div class="grid grid-cols-2 gap-2 mb-5">
            <div>
                 <label class="font-bold">First Name</label>
            </div>
            <div>
                <input class='ring-1 focus:ring-2 p-2 rounded' type="text" v-model="formData.first_name">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-2 mb-5">
                <div>
                     <label class="font-bold">Last Name</label>
                </div>
                <div>
        <input class='ring-1 focus:ring-2 p-2 rounded'  type="text" v-model="formData.last_name">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2 mb-5">
                <div>
                     <label class="font-bold">Company</label>
                </div>
                <div>
                    <select v-model="formData.company_id" class='ring-1 focus:ring-2 p-2 rounded' >
                        <option v-for="company in formData.company_list" :value="company.id">{{ company.name }}</option>
                    </select>
                </div>
            </div>

             <div class="grid grid-cols-2 gap-2 mb-5">
                    <div>
                         <label class="font-bold">Email</label>
                    </div>
                    <div>
                            <input class='ring-1 focus:ring-2 p-2 rounded'  type="email" v-model="formData.email">
                    </div>
                </div>
                 <div class="grid grid-cols-2 gap-2 mb-5">
                    <div>
                         <label class="font-bold">Phone</label>
                    </div>
                    <div>
                            <input class='ring-1 focus:ring-2 p-2 rounded'  type="text" v-model="formData.phone">
                    </div>
                </div>
                 <div class="grid grid-cols-2 gap-2 mb-5">
                        <div>

                        </div>
                        <div>
                            <button type="submit" class="p-3 bg-blue-400 text-white rounded shadoe-2xl">Edit Employee</button>
                        </div>
                    </div>

        </form>
        </div>
        </div>
</template>
<script>
import axios from 'axios';
export default {

    data(){
        return {
            id: this.$route.params.id,
            employee:null,
            formData:{
            first_name:'',
            last_name:'',
            company_id:'',
            email:'',
            phone:'',
            company_list:null,
            company:''
            }
        }

    },
    mounted(){

        axios.get('/api/employee/get/'+this.$route.params.id).then(response => {

            this.employee = response.data
            this.formData.first_name=this.employee.first_name
            this.formData.last_name=this.employee.last_name
            this.formData.company_list=this.employee.company_list
            this.formData.email=this.employee.email,
            this.formData.phone=this.employee.phone

        })
        axios.get('/api/company').then(response => {
            this.formData.company_list = response.data
        })
    },
    methods: {
        submit(){
            axios.patch('/api/employee/'+this.id,this.formData).then(response=>{
                console.log(response.data)
            })
        }
    }

}
</script>
