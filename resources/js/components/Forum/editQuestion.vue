<template>
    <v-container >
        <form @submit.prevent="update">
            <v-text-field
                label="Title"
                v-model="form.title"
                type="text"
                required
            ></v-text-field>
            <vue-simplemde v-model="form.body" ref="markdownEditor" />
            <v-card-actions>
                <v-btn class="mr-4" color="success"
                type="submit"
                >Save
                <v-icon>mdi-update</v-icon>
                </v-btn>
                <v-btn @click="cancel" color="orange">
                    <v-icon dark left>mdi-arrow-left</v-icon>Back
                </v-btn>
            </v-card-actions>
        </form>
    </v-container>
</template>

<script>
export default {
    props:['data'],
    data(){
        return{
            form:{
                title:null,
                body:null
            }
        }
    },
    mounted(){
        this.form = this.data
    },
    methods:{
        update(){
            axios.patch(`/api/question/${this.data.slug}`, this.form)
            .then(res => this.cancel())
        },
        cancel(){
            EventBus.$emit('backThere')
        },
    }
}
</script>

<style>

</style>