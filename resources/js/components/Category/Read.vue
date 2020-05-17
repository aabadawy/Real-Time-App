<template>
    <v-container>
            <v-form @submit.prevent="create">
                <v-text-field
                    label="Category Name"
                    type="text"
                    v-model="form.name"
                    required
                    ></v-text-field>
                    <v-btn class="mr-4" color="green"
                    type="submit"
                    >Craete
                    </v-btn>
            </v-form>
            <v-card class="mt-2">
            <v-toolbar color="indigo" dark dense >
                <v-toolbar-title>Categories</v-toolbar-title>
            </v-toolbar>
            <v-list flat>
                <v-list-item-group >
                    <v-list-item v-for="(category,index) in categories" :key="category.id">
                        <v-list-item-action>
                            <v-btn icon small>
                                <v-icon color="orange">mdi-pencil</v-icon>
                            </v-btn>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>{{category.name}}</v-list-item-title>
                        </v-list-item-content>
                        <v-list-item-action>
                            <v-btn icon small @click="destroy(category.slug,index)">
                                <v-icon color="error">mdi-delete</v-icon>
                            </v-btn>
                        </v-list-item-action>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
        </v-card>
    </v-container>
</template>

<script>
export default {
    data(){
        return{
            categories:{},
            form:{
                name:null,
            }
        }
    },
    created(){
        axios.get(`/api/category`)
        .then(res => this.categories = res.data.data)
        
    },
    methods:{
        destroy(slug,index){
            axios.delete(`/api/category/${slug}`)
            .then(res => this.categories.splice(index,1))
        },
        create(){
            axios.post('/api/category',this.form)
            .then(res => {
                this.categories.unshift(res.data)
                this.form.name =null
            }) //This """"unshift still dosnt workd """"""
        },
    }
}
</script>

<style>

</style>