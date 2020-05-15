<template>
  <v-card>
    <v-toolbar dense>
      <!-- <v-app-bar-nav-icon></v-app-bar-nav-icon> -->
    
    <v-toolbar-title>
        Home
    </v-toolbar-title>
      <v-spacer></v-spacer>
        <router-link to="">
            <v-btn text class="mx-2">
                <v-icon>mdi-forum</v-icon> forum
            </v-btn>
        </router-link>
        <router-link to="">
            <v-btn text class="mx-2">
                <v-icon>mdi-pencil</v-icon>Ask Question
            </v-btn>
        </router-link>
        <router-link to="">
            <v-btn text class="mx-2">
                <v-icon>mdi-format-list-bulleted-square</v-icon>Category
            </v-btn>
        </router-link>
        <router-link to="/login">
            <v-btn text class="mx-2">
                <v-icon>mdi-account-circle</v-icon>signin
            </v-btn>
        </router-link>
    </v-toolbar>
  </v-card>
</template>

<script>
export default {

}
</script>

<style>

</style>