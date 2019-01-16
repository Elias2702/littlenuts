<template>
  <card :title="$t('movies')" class="mb-4">
    <div class="row">
      <div v-for="movie in movies" :key="movie.id" class="col-lg-3 col-md-4 col-6">
        <div class="card-body text-center">
          <router-link :to="{ name: 'movie', params: { id: movie.id }}">
            <img :src="movie.cover_path" class="img-fluid mb-3">
          </router-link>
          <h5 class="card-title" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
            <router-link :to="{ name: 'movie', params: { id: movie.id }}">{{ movie.title }}</router-link>
          </h5>
          <p
            class="card-text"
            style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"
          >{{ movie.synopsis }}</p>
          <p class="card-text">
            <small class="text-muted">{{ movie.release_date }}</small>
          </p>
          <button type="button" class="btn btn-light" @click="addToWatchList(movie.id)">Watch later</button>
          <!-- Au clic du bouton, récupérer la donnée current movie id et la passer dans data, pour quelle puisse être envoyée lors de la requête axios Post -->
        </div>
      </div>
    </div>
  </card>
</template>

<script>
import axios from "axios";

export default {
  // middleware: "guest",

  metaInfo() {
    return { title: this.$t("movies") };
  },

  data: () => {
    return {
      movies: ""
    };
  },

  created() {
    axios.get("/api/movies").then(response => {
      this.movies = response.data;
    });
  },

  methods: {
    addToWatchList: function (id) {
        axios.post("/api/addToWatchList", {
          movie_id: id
        });
    },
  },
};
</script>
