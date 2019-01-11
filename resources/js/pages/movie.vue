<template>
  <div class="card mb-4">
    <div class="card-body">
      <h2 lass="card-title">{{ movie.title }}</h2>
      <p class="card-text">
        <small class="text-muted">{{ movie.release_date }}</small>
      </p>
      <p class="card-text">{{ movie.synopsis }}</p>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  // middleware: "guest",

  metaInfo() {
    return { title: this.movie.title };
  },

  data: () => {
    return {
      movie: ""
    };
  },

  created() {
    axios.get(`/api/movies/${this.$route.params.id}`).then(response => {
      this.movie = response.data;
    });
  }
};
</script>
