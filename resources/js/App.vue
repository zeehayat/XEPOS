<template>

<div class="mt-0 bg-sky-600 shadow-2xl p-5 sticky">
    <router-link class="p-2 m-2 text-white font-bold hover:text-red-300 uppercase" to="/company">Create Company</router-link>

        <router-link  class="p-2 m-2 hover:text-red-300 text-white font-bold uppercase" to="/employee">Create Employee</router-link>

        <router-link  class="p-2 m-2 text-white font-bold hover:text-red-300 uppercase" to="/employees">Employee List</router-link>
        </div>
      <router-view />

</template>
