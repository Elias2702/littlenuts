<template>
<<<<<<< HEAD
  <card :title="$t('catalogue')">
      <div>
          <ul>
              <!-- <li>{{ title }}</li> -->
          </ul>

=======
  <card :title="$t('catalogue')" class="mb-4">
    <div class="row text-center">
      <div v-for="movie in movies" :key="movie.id" class="col-lg-3 col-md-4 col-6">
        <div class="card-body">
          <a :href="movie.id">
            <img :src="movie.cover_path" class="img-fluid mb-3">
          </a>
          <h5 class="card-title" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
            <a :href="movie.id">{{ movie.title }}</a>
          </h5>
          <p
            class="card-text"
            style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"
          >{{ movie.synopsis }}</p>
          <p class="card-text">
            <small class="text-muted">{{ movie.release_date }}</small>
          </p>
        </div>
>>>>>>> cc44276d8f2765a19c2a85f9c244153438c65ee5
      </div>
    </div>
  </card>
</template>

<script>
import axios from "axios";

export default {
  // middleware: "guest",

  metaInfo() {
    return { title: this.$t("catalogue") };
  },

<<<<<<< HEAD
  data () {
      title: ''
  },

  created () {
      // this.title = this.movies.title;
=======
  data: () => {
    return {
      movies: ""
    };
>>>>>>> cc44276d8f2765a19c2a85f9c244153438c65ee5
  },

  created() {
    axios.get("api/movies").then(response => {
      this.movies = response.data;
    });
  }
};
</script>
