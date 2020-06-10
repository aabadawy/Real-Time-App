<template>
    <div v-if="question">
        <edit-question v-if="editing" :data = question></edit-question>
            <single-question  v-else  :data = question ></single-question>
        <v-container>
            <replies :question="question"></replies>
            <create-reply v-if="loggedIn" :question_slug="question.slug"></create-reply>
            <div class="mt-4" v-else>
                <router-link to="/login">
                    <v-btn color="blue">logIn To Reply</v-btn>
                </router-link>
            </div>
        </v-container>
    </div>
</template>

<script>
import singleQuestion from './singleQuestion'
import EditQuestion from './editQuestion'
import Replies from '../Reply/Replies'
import CreateReply from '../Reply/CreateReply'

export default {
    components:{singleQuestion,EditQuestion,Replies,CreateReply},
    data(){
        return{
            question:null,
            editing:false
        }
    },
    created(){
        this.getQuestion()
        this.listenToEdit()
        this.listenToback()
    },
    computed:{
        loggedIn(){
            return User.loggedIn();
        }
    },
    methods:{
        listenToEdit(){
            EventBus.$on('startEditing',()=>{ 
                this.editing = true
            });
        },
        getQuestion(){
            axios.get(`/api/question/${this.$route.params.slug}`)
            .then(res => this.question = res.data.data)
        },
        listenToback(){
            EventBus.$on('backThere',()=>{
                this.editing = false
            })
        },
    }
}
</script>

<style>

</style>