<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
  email: null,
  password: null,
})

function submit() {
  router.post('/user/login', form)
}
</script>

<template>
    <center>
        <section>
        <h1>Login Here</h1>
        <form @submit.prevent="submit">
            
            <label for="email">Email:</label>
            <input id="email" v-model="form.email" required/>
            <br><br>
            <label for="password">password:</label>
            <input id="password" v-model="form.password" required/>
            <br><br>
            <button type="submit">Submit</button>
        </form>
        </section>
    </center>
</template>