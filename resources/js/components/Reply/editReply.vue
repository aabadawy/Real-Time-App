<template>
    <div >
        <vue-simplemde v-model="reply.reply" ref="markdownEditor" />
        <v-card-actions>
            <v-btn icon @click="update">
                <v-icon  color="orange">mdi-update</v-icon>
            </v-btn>
            <v-btn icon @click="cancel" >
                <v-icon  color="error">mdi-cancel</v-icon>
            </v-btn>
        </v-card-actions>
    </div>
</template>

<script>
export default {
    props:['reply'],
    methods:{
        cancel(reply){
            EventBus.$emit('cancelEditing' ,)
            // I will add the next line untill now how to fix the wierd bug XD, to see the bug 
            // comment the next line 
            window.location.reload()
        },
        update(){
            axios.patch(`/api/question/${this.reply.question_slug}/reply/${this.reply.id}`,{body:this.reply.reply})
            .then(res => this.cancel(this.reply.reply))
            // I will add the next line untill now how to fix the wierd bug XD, to see the bug 
            // comment the next line 
            window.location.reload()
        }
    }
}
</script>

<style>
    @import '~simplemde/dist/simplemde.min.css';
</style>