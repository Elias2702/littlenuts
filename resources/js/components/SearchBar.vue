<template>
    


    <div class="app">

        <div class="input">
            <input type="text" v-model="search">

        </div>
        
        <div class="searchResult">
            <div v-for="movie in filteredMovies" :key="movie.id" class="singleMovie">

                <h3>{{ movie.title }}</h3>
                
            </div>

        </div>
    </div>

</template>

<script>
import axios from 'axios';

export default {


    data:({
        return: {
            movies: axios.get("api/movies").then(response => {
      this.movies = response.data;
    }),
            search: '',
        }
    }),

    computed: {
        filteredMovies(){
            return this.movies.filter((movies) =>{
                return movies.title.match(this.search)
            })
        }
    },

}
</script>
