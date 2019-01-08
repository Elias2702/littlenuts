<template>
    <div id="app">
        
        <input type="text" v-model="search">
        <button @click.prevent="filteredMovies" placeholder="Search" name="Search" class="btn btn-outline-dark"><i class="fa fa-search" aria-hidden="true"></i></button>

         <div v-if="showsearch=true">
            <div class="row">
                <div v-for="movie in movies" v-bind:key="movie.id">
                    <div>
                        <img :src="movie.picture_url" :alt="movie.id">
                    </div>
                    <h2> {{ movie.title }} </h2>
                    <p> {{ movie.synopsis }} </p>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    data() {
        return {
            movies: [],
            actors: [],
            search: '',

        }
    },

    computed: {
        filteredMovies : function() {
            fetch('/search');
            console.log(fetch());

        },
    }
}
</script>
