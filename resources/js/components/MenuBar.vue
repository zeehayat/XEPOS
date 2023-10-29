<template>
    <div class="mt-0 bg-sky-600 shadow-2xl p-5 sticky">
        <router-link class="p-2 m-2 text-white font-bold hover:text-red-300 uppercase" to="/company">Create Company</router-link>

            <router-link  class="p-2 m-2 hover:text-red-300 text-white font-bold uppercase" to="/employee">Create Employee</router-link>

            <router-link  class="p-2 m-2 text-white font-bold hover:text-red-300 uppercase" to="/employees">List Employee</router-link>

            <router-link  class="p-2 m-2 text-white font-bold hover:text-red-300 uppercase" to="/companies">List Companies</router-link>
            <router-link  class="p-2 m-2 text-white font-bold hover:text-red-300 uppercase" to="/dashboard">Dashboard</router-link>

            <router-link  class="p-2 mr-0 ml-96 bg-gray-500 rounded shadow hover:bg-gray-400 px-3 py-2.5 text-white font-bold uppercase hover:shadow-2xl" to="/login">Login</router-link>

            </div>
          <router-view />
</template>
