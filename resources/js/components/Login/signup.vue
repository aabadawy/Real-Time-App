<template>
  <v-container>
    <form @submit.prevent="signup">
        <v-text-field
        label="Name"
        v-model="form.name"
        type="text"
        required
      ></v-text-field>
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

      <v-text-field
        label="Password"
        v-model="form.password_confirmation"
        type="password"
        required
      ></v-text-field>
      <v-btn class="mr-4" color="green"
      type="submit"
      >Signup
      </v-btn>
      <router-link to="/login">
            <v-btn text class="mx-2" color="blue">
                <v-icon>mdi-account-circle</v-icon>signin
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
                name:null,
                email:null,
                password:null,
                password_confirmation:null,
            }
        }
    },
    methods:{
        signup(){
            User.signup(this.form)
        }
    }
}
</script>

<style>

</style>