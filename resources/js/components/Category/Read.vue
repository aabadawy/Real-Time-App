<template>
    <v-container>
        <create-category class="mb-2"></create-category>
        <all-categories></all-categories>
    </v-container>
</template>

<script>
import CreateCategory from './CreateCategory'
import AllCategories from './Categories'
export default {
    components:{CreateCategory,AllCategories},
}
</script>

<style>

</style>