<template>
      <v-form @submit.prevent="create">
          <v-text-field
            label="Category Name"
            type="text"
            v-model="form.name"
            required
            ></v-text-field>
            <v-btn class="mr-4" color="green"
            type="submit"
            >Craete
            </v-btn>
      </v-form>
</template>

<script>
export default {
    data(){
        return{
            form:{
                name:null,
            }
        }
    },
    methods:{
        create(){
            axios.post(`/api/category`,this.form)
            .then(res => this.$router.push('/category'))
        }
    }
}
</script>

<style>

</style>