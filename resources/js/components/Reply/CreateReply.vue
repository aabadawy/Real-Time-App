<template>
    <div class="mt-4">
        <vue-simplemde v-model="body" ref="markdownEditor" />
        <v-btn color="success" @click="submit">
            Reply
        </v-btn>
    </div>
</template>

<script>
export default {
    props:['question_slug'],
    data(){
        return{
                body: '',
        }
    },
    methods:{
        
        submit(){
            axios.post(`/api/question/${this.question_slug}/reply`,{body:this.body})
            .then(res => {
                this.body = ''
                EventBus.$emit('newReply' , res.data)
                window.scrollTo(0,0)
            })
        }
    }
}
</script>

<style>
    @import '~simplemde/dist/simplemde.min.css';
</style>