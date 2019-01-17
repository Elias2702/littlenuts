<template>
  <card :title="$t('movies')" class="mb-4">
    <div class="row mb-2">
      <div v-for="movie in movies.data" :key="movie.id" class="col-lg-3 col-md-4 col-6">
        <div class="card-body text-center">
          <router-link :to="{ name: 'movie', params: { id: movie.id }}">
            <img :src="movie.cover_path" class="img-fluid mb-3">
          </router-link>
          <h5 class="card-title" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
            <router-link :to="{ name: 'movie', params: { id: movie.id }}">{{ movie.title }}</router-link>
          </h5>
          <add-to-lists :movie="movie"></add-to-lists>
          <p
            class="card-text"
            style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"
          >{{ movie.synopsis }}</p>
          <p class="card-text">/movies
            <small class="text-muted">{{ movie.release_date }}</small>
          </p>
        </div>
      </div>
    </div>
    <div class="d-flex mt-2">
      <div class="mx-auto">
        <pagination :data="movies" @pagination-change-page="getResults" :limit="2"></pagination>
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
      movies: {}
    };
  },

  created() {
    this.getResults();
  },

  methods: {
    getResults(page = 1) {
      axios.get("/api/movies?page=" + page).then(response => {
        this.movies = response.data;
      });
    }
  }
};
</script>
