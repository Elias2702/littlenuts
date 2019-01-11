<template>
    <div class="main-layout">
        <navbar/>

        <div class="searchResult">
            <div  v-for="movie in filteredMovie" :key="movie.id" class="singleMovie">

                <h3>{{ movie.title }}</h3>
                
            </div>

        </div>

    </div>
</template>

<script>
import axios from 'axios';

export default {

    data() {
        return {
            movie: [
                title = '',
                synopsis = '',
                trailer_url = '',
                cover_path = '',
                release_date = '',
            ],
            search: '',
            searching: false,
        }
    },

    computed: {
        filteredMovie: function(){
            return this.movies.filter((movies) =>{
                return movies.title.match(this.search)
            })
        }
    },

}
</script>
