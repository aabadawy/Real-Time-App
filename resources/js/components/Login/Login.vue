<template>
 <v-container>
    <form @submit.prevent="login">
      <v-text-field
        label="E-mail"
        v-model="form.email"
        type="email"
        required
      ></v-text-field>

      <v-text-field
        label="Password"
        v-model="form.password"
        type="password"
        required
      ></v-text-field>
      <v-btn class="mr-4" 
      type="submit"
      >submit
      </v-btn>
    </form>
  </v-container>
</template>

<script>
export default {
  data(){
    return{
      form:{
        email:null,
        password:null
      }
    }
  },
  methods:{
    login(){
      axios.post('/api/auth/login', this.form)
      .then(res => console.log(res.data))
      .catch(error => console.log(error.response.data))
    }
  }
}
</script>

<style>

</style>