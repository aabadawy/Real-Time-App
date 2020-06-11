<!--<template>
  <v-card height="150">
    <v-footer
      absolute
      class="font-weight-medium"
    >
      <v-col
        class="text-center"
        cols="12"
      >
        {{ new Date().getFullYear() }} — <strong>Our Single Page</strong>
      </v-col>
    </v-footer>
  </v-card>
</template>
-->
<template>
  <v-footer
    dark
    padless
  >
    <v-card
      flat
      tile
      class="blue lighten-1 white--text text-center"
    >
      <v-card-text>
        <v-btn class="mx-4" icon>
          <a href="http://facebook.com/ahmed.ali.badawy22" class="white--text" target="_blank" rel="noopener noreferrer">
            <v-icon size="24px">mdi-facebook</v-icon>
          </a>
        </v-btn>

        <v-btn class="mx-4 white--text"  icon>
          <a href="http://instagram.com/ahmedbadawy11/" class="white--text" target="_blank" rel="noopener noreferrer">
            <v-icon  size="24px">mdi-instagram</v-icon>
          </a> 
        </v-btn>
        
        <v-btn class="mx-4 white--text" icon >
          <a href="http://linkedin.com/in/ahmed-badawy-1ba663147/" class="white--text" target="_blank" rel="noopener noreferrer">
            <v-icon size="24px">mdi-linkedin</v-icon>
          </a>
        </v-btn>
      </v-card-text>

      <v-card-text class="white--text pt-0">
        Phasellus feugiat arcu sapien, et iaculis ipsum elementum sit amet. Mauris cursus commodo interdum. Praesent ut risus eget metus luctus accumsan id ultrices nunc. Sed at orci sed massa consectetur dignissim a sit amet dui. Duis commodo vitae velit et faucibus. Morbi vehicula lacinia malesuada. Nulla placerat augue vel ipsum ultrices, cursus iaculis dui sollicitudin. Vestibulum eu ipsum vel diam elementum tempor vel ut orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
      </v-card-text>

      <v-divider></v-divider>

      <v-card-text class="white--text">
        {{ new Date().getFullYear() }} — <strong>Vuetify</strong>
      </v-card-text>
    </v-card>
  </v-footer>
</template>
<script>
export default {

}
</script>

<style>

</style>