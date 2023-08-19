<template>
    <center>
        <h1>All Questions</h1>
        <div>
            <table>
            <thead>
                <tr>
                <th>No</th>
                <th>Question</th>
                <th>Answer Text</th>
                <th>State</th>
                <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(question, index) in questions" :key="index">
                    <td>{{ index+1 }}</td>
                    <td>{{ question.question }}</td>
                <td>
                    <table>
                    <tr v-for="(answer, index) in question.answers" :key="index">
                        <td>{{ answer.text }}</td>
                        
                    </tr>
                    </table>
                </td>
                <td>
                    <tr v-for="(answer, index) in question.answers" :key="index">
                        <td>{{ answer.correct }}</td>
                        
                    </tr>
                </td>
                <td>
                    <tr>
                        <button @click="editQuestion(question.id)">
                        Edit
                        </button>
                        <button @click="deleteQuestion(question.id)">
                        Delete
                        </button>
                        
                    </tr>
                </td>
                </tr>
            </tbody>
            </table>
        </div>
    </center>
    
</template>

<script>
export default{
    props:{
        questions: Object
    },
    // computed: {
    //     parsedAnswers() {
    //         try {
    //             return JSON.parse(this.questions.answers);
    //         } catch (error) {
    //             console.error('Error parsing answers:', error);
    //             return [];
    //         }
    //     }
    // },
    methods: {
        editQuestion(id){
            this.$inertia.visit('/edit-question/' + id);
        },
        deleteQuestion(id){
            this.$inertia.delete('/delete-question/' + id);
        }
    }   

}

</script>
<style>
    table {
        border:1px solid black;
        width: 80%;
    }
    
    th, td {
        text-align: left;
        padding: 8px;
    }
    
    
    
    
</style>