<template>
  <div class="card">
    <!-- Header -->
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link btn" @click="watchList(); isActive = 1" :class="{active:isActive == 1}">Watchlist</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn" @click="watchedList(); isActive = 2" :class="{active:isActive == 2}">Watched</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn" @click="starredList(); isActive = 3" :class="{active:isActive == 3}">Starred</a>
        </li>
      </ul>
    </div>

    <!-- Body -->
    <div class="card-body">
      <div class="row text-center">
        <div v-for="movie in movies" :key="movie.id" class="col-lg-3 col-md-4 col-6">
          <div class="card-body">
            <a :href="movie.id">
              <img :src="movie.cover_path" class="img-fluid mb-3">
            </a>
            <h5
              class="card-title"
              style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"
            >
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
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  middleware: "auth",

  metaInfo() {
    return { title: this.$t("home") };
  },

  data: () => {
    return {
      movies: "",
      isActive: 1,
    };
  },

  created() {
    this.watchList();
  },

  methods: {
    watchList: function() {
      axios.get("api/watchlist").then(response => {
        this.movies = response.data;
      });
    },

    watchedList: function() {
      axios.get("api/watchedlist").then(response => {
        this.movies = response.data;
      });
    },

    starredList: function() {
      axios.get("api/starredlist").then(response => {
        this.movies = response.data;
      });
    }
  }
};
</script>
