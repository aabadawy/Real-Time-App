<template>
  <v-card>
    <v-toolbar dense>
      <!-- <v-app-bar-nav-icon></v-app-bar-nav-icon> -->
    
    <v-toolbar-title>
        Home
    </v-toolbar-title>
      <v-spacer></v-spacer>
        <app-notification v-if="loggedIn"></app-notification>
      <router-link 
      
      v-for="item in items"
      :key="item.title"
      :to="item.to"  
      v-if="item.show"
      >
            <v-btn text class="mx-2">
                <v-icon>{{item.ic}}</v-icon> {{item.title}}
            </v-btn>
        </router-link>
        
    </v-toolbar>
  </v-card>
</template>

<script>
import AppNotification from './AppNotification'
export default {
    components:{AppNotification},
    data(){
        return{
            loggedIn: User.loggedIn(),
            items: [
                {title: 'Forum' , ic: 'mdi-forum' , to:'/forum', show:true},
                {title: 'Login' , ic: 'mdi-account-circle' , to:'/login', show: !User.loggedIn()},
                {title: 'Ask Question' , ic: 'mdi-pencil' , to:'/ask', show: User.loggedIn()},
                {title: 'Category' , ic: 'mdi-format-list-bulleted-square' , to:'/category' , show: User.loggedIn() && User.isAdmin()},
                {title: 'Logout' , ic: 'mdi-account-circle' , to:'/logout', show: User.loggedIn()},
            ]
        }
    },
    created(){
        EventBus.$on('logout', () =>{
            User.logout()
        })
    }
}
</script>

<style>

</style>