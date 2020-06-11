<template>
    <v-container fluid grid-list-md>
        <v-layout row wrap>
            <v-flex xs8>
                <div v-if="questions.length == 0" >
                    <div class="text-center mt-2"  v-if="CheckOption">
                        <v-btn  @click="getAll()" color="blue lighten-4" class="text-center">
                            Back<v-icon color="blue">mdi-refresh</v-icon>
                        </v-btn>
                    </div>
                    <v-alert type="error"  class="mt-2 text-center">
                       There are No Questions Yet!
                    </v-alert>
                    
                </div>
                <div v-else>
                    <div class="text-center mt-2" >
                        <v-btn  @click="getAll()" color="blue lighten-4" class="text-center" v-if="CheckOption">
                            Back<v-icon color="blue">mdi-refresh</v-icon>
                        </v-btn>
                    </div>
                    <question
                    v-for="question in questions"
                    :key="question.id"
                    :data=question
                    ></question>
                    <div class="text-center">
                        <v-pagination
                        v-model="meta.current_page"
                        :length="meta.last_page"
                        circle
                        @input="changePage"
                        ></v-pagination>
                    </div>
                </div>
            </v-flex >
            <v-flex xs4>
                <sidebar></sidebar>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import question from './question'
import sidebar from './sidebar'
export default {
    data(){
        return{
        questions:{},
        CheckOption : false,
        meta : {},
        }
    },
    components:{question,sidebar},
    created(){
        this.getAll()
        EventBus.$on('getQuestionCategries' , (id)=>{
            axios.get(`/api/question/category/${id}`)
            .then(res => {
                this.questions = res.data.data
                this.CheckOption = true})
            .catch(error => console.log(error.response.data))
            
        })
    },
    methods:{
        getAll(page){
            let url = page ?  `/api/question?page=${page}` : '/api/question'
            axios.get(url)
            .then(res => {this.questions = res.data.data
            this.CheckOption = false
            this.meta = res.data.meta})
            .catch(error => console.log(error.response.data))
        },
        changePage(page){
           this.getAll(page)
        },
        
    }
}
</script>

<style>

</style>