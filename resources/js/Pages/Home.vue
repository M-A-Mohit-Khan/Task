<template>
    <h1>hello</h1>
    <li v-for="user in users">
    {{ user.name }}
    </li>
</template>

<script>
export default{
    props:{
        users: Object
    }
}

</script>