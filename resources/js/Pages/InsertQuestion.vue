<template>
  <div>
    <Link href="show-question">All Question</Link>
  </div>
    <center>
      <div>
        <h2>Insert Question</h2>
        <!-- <form @submit.prevent="submitForm"> -->
        <input v-model="question" placeholder="Enter your question" required/>
        <br><br>

        <div v-for="(answer, index) in answers" :key="index">
            <input v-model="answer.text" :placeholder="'Answer ' + (index + 1)" required/>
            <!-- hidden: if answer[index] is false -->
            <button @click="markCorrect(index)" >
              <span v-if="!answer.correct">👍</span>
            <span v-else>👎</span>
            </button>
            <!-- <button v-else>👎</button> -->
            <button @click="addAnswer">+</button>
            <button @click="removeAnswer(index)">-</button>
            
        </div>
        <br>
        <button @click="submitForm">Submit</button>
        <!-- </form> -->
      </div>
    </center>
</template>

<script>
//import { router } from '@inertiajs/vue3'
import {Link} from '@inertiajs/vue3';
export default {
  components:{
    Link
  },
  data() {
    return {
      
        question: "",
        answers: [{ text: "", correct: false }]
      
    };
  },
  
  methods: {
    markCorrect(index) {
      this.answers.forEach((answer, i) => {
        if (i === index) {
          answer.correct = false;
        } else {
          answer.correct = true;
        }
      });
    },
    markWrong(index) {
      this.answers[index].correct = false;
    },
    addAnswer() {
      this.answers.push({ text: "", correct: false });
    },
    removeAnswer(index) {
      if(index!=0)
      {
        this.answers.splice(index, 1);
      }
    },
    submitForm() {
      this.$inertia.post("/submit-question", {
        question: this.question,
        answers: this.answers,
      });
    }
  }
};
</script>

<style>
/* Add your CSS styling here */
</style>
