<template>
  <card :title="$t('catalogue')">
      <ul>
        <li v-for="movie in movies" :key="movie.id">{{ movie.title }}</li>
      </ul>
  </card>
</template>

<script>

import axios from 'axios';

export default {
  middleware: "guest",

  metaInfo() {
    return { title: this.$t("catalogue") };
  },

  data: () => {
    return {
      movies: ''
    };
  },

  created() {
    // TODO: Make it working correctly!!!
    axios.get('movies').then((response) => {
      console.log(response.data);
      // this.movies = response.data;
    });
  },

  methods: {
    getMovies: function() {
      this.movies = [
        { id: 1, title: "Test #1" },
        { id: 2, title: "Test #2" },
        { id: 3, title: "Test #3" }
      ];
    }
  }
};
</script>
