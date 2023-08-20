<template>
    <center>
      <div>
        <h2>Edit Question</h2>
        <!-- <form @submit.prevent="submitForm"> -->
        <input v-model="defaultQuestion" placeholder="Enter your question" required/>
        
        <br><br>

        <div v-for="(answer, index) in question.answers" :key="index">
            <input v-model="answer.text" :placeholder="'Answer ' + (index + 1)" required/>
            <!-- hidden: if answer[index] is false -->
            <button @click="markCorrect(index)" >
              <span v-if="answer.correct">👍</span>
            <span v-else>👎</span>
            </button>
            <!-- <button v-else>👎</button> -->
            <button @click="addAnswer">+</button>
            <button @click="removeAnswer(index)">-</button>
            
        </div>
        <br>
        <button @click="submitForm(question.id)">Submit</button>
        <!-- </form> -->
      </div>
    </center>
</template>

<script>
//import { router } from '@inertiajs/vue3'
export default {
    props:{
        question: Object,
    },
  data() {
    return {
      
        defaultQuestion:  this.question.question,
        answers: [{ text: "", correct: false }]
      
    };
  },
  
  methods: {
    markCorrect(index) {
      this.question.answers.forEach((answer, i) => {
        if (i === index) {
          answer.correct = true;
        } else {
          answer.correct = false;
        }
      });
    },
    
    addAnswer() {
      this.question.answers.push({ text: "", correct: false });
    },
    removeAnswer(index) {
      if(index!=0)
      {
        this.question.answers.splice(index, 1);
      }
    },
    submitForm(id) {
      this.$inertia.post('/update-question/' + id, {
        question: this.defaultQuestion,
        answers: this.question.answers,
      });
    }
  }
};
</script>

<style>
/* Add your CSS styling here */
</style>
