<template>
    <v-container>
        <form @submit.prevent="create">
      <v-text-field
        label="Title"
        v-model="form.title"
        type="text"
        required
      ></v-text-field>
      <v-select
          :items="categories"
          item-text="name"
          item-value="id"
          v-model="form.category_id"
          label="Category"
          autocomplete
    ></v-select>
    <vue-simplemde v-model="form.body" ref="markdownEditor" />
      <v-btn class="mr-4" color="success"
      type="submit"
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
            categories:[]
        }
    },
    created(){
        axios.get('/api/category')
        .then(res => {this.categories = res.data.data})
        
    },
    methods:{
        create(){
            axios.post('/api/question' , this.form)
            .then(res => this.$router.push(res.data.path))
        }
    }
}
</script>

<style>
    @import '~simplemde/dist/simplemde.min.css';
</style>