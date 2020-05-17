<template>
    <v-card>
        <v-toolbar color="indigo" dark dense >
            <v-toolbar-title>Categories</v-toolbar-title>
        </v-toolbar>
        <v-list flat>
            <v-list-item-group >
                <v-list-item v-for="category in categories" :key="category.id">
                    <v-list-item-action>
                        <v-btn icon small>
                            <v-icon color="orange">mdi-pencil</v-icon>
                        </v-btn>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title >{{category.name}}</v-list-item-title>
                    </v-list-item-content>
                    <v-list-item-action>
                        <v-btn icon small>
                            <v-icon color="error">mdi-delete</v-icon>
                        </v-btn>
                    </v-list-item-action>
                </v-list-item>
            </v-list-item-group>
        </v-list>
    </v-card>
</template>

<script>
export default {
    data(){
        return{
            categories:[]
        }
    },
    created(){
        axios.get(`/api/category`)
        .then(res => this.categories = res.data.data)
    }
}
</script>

<style>

</style>