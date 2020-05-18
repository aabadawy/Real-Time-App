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
        cancel(){
            EventBus.$emit('cancelEditing')
        },
        update(){
            axios.patch(`/api/question/${this.reply.question_slug}/reply/${this.reply.id}`,{body:this.reply.reply})
            .then(res => this.cancel())
        }
    }
}
</script>

<style>
    @import '~simplemde/dist/simplemde.min.css';
</style>