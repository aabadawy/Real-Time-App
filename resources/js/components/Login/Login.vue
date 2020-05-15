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
      <v-btn class="mr-4" color="green"
      type="submit"
      >Signin
      </v-btn>
      <router-link to="/signup">
            <v-btn text class="mx-2" color="blue">
                <v-icon>mdi-account-circle</v-icon>Signup
            </v-btn>
        </router-link>
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
      User.login(this.form);
    }
  }
}
</script>

<style>

</style>