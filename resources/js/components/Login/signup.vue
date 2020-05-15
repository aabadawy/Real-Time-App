<template>
  <v-container>
    <form @submit.prevent="signup">
        <v-text-field
        label="Name"
        v-model="form.name"
        type="text"
      ></v-text-field>
      <span class="red--text" v-if="errors.name">{{errors.name[0]}}</span>
      <v-text-field
        label="E-mail"
        v-model="form.email"
        type="email"
      ></v-text-field>
      <span class="red--text" v-if="errors.email">{{errors.email[0]}}</span>
      <v-text-field
        label="Password"
        v-model="form.password"
        type="password"
      ></v-text-field>
      <span class="red--text" v-if="errors.password">{{errors.password[0]}}</span>
      <v-text-field
        label="Password"
        v-model="form.password_confirmation"
        type="password"
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
            },
            errors:{}
        }
    },
    methods:{
        
        signup(){
            axios.post('/api/auth/signup', this.form)
            .then(res => User.responseAfterLogin(res))
            .catch(error => this.errors = error.response.data.errors)
        }
    }
}
</script>

<style>

</style>