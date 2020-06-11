<template>
    <v-container>
        <form @submit.prevent="create">
      <v-text-field
        label="Title"
        v-model="form.title"
        type="text"
      ></v-text-field>
      <span class="red--text mb-1" v-if="errors.title">{{errors.title[0]}}</span>
      <v-select
          :items="categories"
          item-text="name"
          item-value="id"
          v-model="form.category_id"
          label="Category"
          autocomplete
    ></v-select>
      <span class="red--text mb-1" v-if="errors.category_id">{{errors.category_id[0]}}</span>
    <vue-simplemde v-model="form.body" ref="markdownEditor" />
      <span class="red--text mb-1" v-if="errors.body">{{errors.body[0]}}</span>
      <br class="mb-1">
      <v-btn class="mr-4" color="success"
      type="submit"
      :disabled="disabled"
      >Create
      </v-btn>
    </form>
    </v-container>
</template>

<script>
  
export default {
    data(){
        return{
            form:{
                title:null,
                body:null,
                category_id:null,
            },
            categories:[],
            errors: {},
        }
    },
    created(){
        axios.get('/api/category')
        .then(res => {this.categories = res.data.data})
    },
    computed:{
        disabled(){
            return !(this.form.title&& this.form.category_id && this.form.body);
        }
    },
    methods:{
        create(){
            axios.post('/api/question' , this.form)
            .then(res => this.$router.push(res.data.path))
            .catch(error => this.errors = error.response.data.errors)
        }
    }
}
</script>

<style>
    @import '~simplemde/dist/simplemde.min.css';
</style>