<template>
  <v-card>
    <v-toolbar dense>
      <!-- <v-app-bar-nav-icon></v-app-bar-nav-icon> -->
    
    <v-toolbar-title>
        Home
    </v-toolbar-title>
      <v-spacer></v-spacer>

      <router-link 
      
      v-for="item in items"
      :key="item.title"
      :to="item.title" 
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
export default {
    data(){
        return{
            items: [
                {title: 'Forum' , ic: 'mdi-forum' , to:'forum', show:true},
                {title: 'Login' , ic: 'mdi-account-circle' , to:'login', show: !User.loggedIn()},
                {title: 'Ask Question' , ic: 'mdi-pencil' , to:'ask', show: User.loggedIn()},
                {title: 'Category' , ic: 'mdi-format-list-bulleted-square' , to:'category', show: User.loggedIn()},
                {title: 'Logout' , ic: 'mdi-account-circle' , to:'logout', show: User.loggedIn()},
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