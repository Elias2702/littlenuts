<template>

    <div id="app">

        <input type="text" v-model="search" placeholder="Type your search here ...">
        <button @click.prevent="searchMovie()" placeholder="Search" name="Search" class="btn btn-outline-dark"><i class="fa fa-search" aria-hidden="true"></i></button>
        

        <div v-if="showsearch=true">
            <div class="row">
                <div v-for="movie in movies" v-bind:key="movie.id">
                    <div>
                        <img :src="movie.picture_url" >
                        <div>
                            <h5 class="card-title" style="text-align: center;"> {{ movie.title }} </h5>
                            <p class="card-text" style="text-align: center;"> {{ movie.synopsis }} </p>
                            <a class="btn btn-primary" :class="route('moviecard') ? 'active' : ''" :href="route('show_movie', movie.id)" style="margin:2%;">See more</a>-->
                            <a href="#" class="btn btn-primary">Watch now</a><br /><br />
                            <a href="#" class="btn btn-default" style="margin:2%;">Favorite</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>


<script>

export default {
    data() {
        return{
            movies: [],
            movies: {
                id: '',
                title: '',
                synopsis: '',
                picture_url:'',
                trailer_url:'',
                release_date:'',
            },
            actors: [],
            actors: {
                id:'',
                first_name:'',
                last_name: '',
                picture_url:'',
            },
            search: '',
            showsearch: false,
            movies: [],
            actors: [],
        };
    },

    methods: {
        searchMovie() {
            fetch('/movies/search?q=' + this.search) 
            .then(res => res.json)
            .then(res => {
                this.movies = res;
                this.search = '';
                this.showsearch = true;
                console.log(searchMovie());
            })
        
            .catch(err => {
                console.log(err);
            });
        } 
    },
}

</script>
