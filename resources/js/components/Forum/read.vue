<template>
    <div v-if="question">
        <edit-question v-if="editing" :data = question></edit-question>
            <single-question  v-else  :data = question 
            ></single-question>
    </div>
</template>

<script>
import singleQuestion from './singleQuestion'
import EditQuestion from './editQuestion'
export default {
    components:{singleQuestion,EditQuestion},
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