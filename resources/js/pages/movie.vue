<template>
  <div class="card mb-4">
    <div v-if="user.is_premium" class="card-img-top embed-responsive embed-responsive-16by9">
      <iframe
        class="embed-responsive-item"
        :src="'https://www.youtube.com/embed/' + movie.trailer_url"
        allowfullscreen
      ></iframe>
    </div>
    <template v-else>
      <img
        class="card-img-top img-fluid"
        :src="'https://img.youtube.com/vi/' + movie.trailer_url +'/maxresdefault.jpg'"
        alt
      >
    </template>

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
import { mapGetters } from 'vuex';
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

  computed: mapGetters({
    user: 'auth/user'
  }),

  created() {
    axios.get(`/api/movies/${this.$route.params.id}`).then(response => {
      this.movie = response.data;
    });

    console.log(this.user);
  }
};
</script>
