<template>
    <center>
        <h1>Question List</h1>
        <li v-for="question in questions">
        {{ question.question }}
        {{ question.answes }}
        
       
        </li>
    </center>
    
</template>

<script>
export default{
    props:{
        questions: Object
    }
}

</script>