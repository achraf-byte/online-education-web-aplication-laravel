<template>
    <div>
        <input class="form-control  h-100  p-3 text-white bg-transparent mr-sm-2" @keyup="searchit" v-model="search" type="search" placeholder="Search For Class" aria-label="Search">
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }

   
    
    
    }
</script>