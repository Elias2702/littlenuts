<template>
  <div v-if="user" class="btn-group-vertical btn-group-sm" role="group">
    <button
      class="btn btn-info"
      @click="setToWatchList(movie.id)"
    >{{ watchBtn ? 'Add to' : 'Remove from'}} Watch List</button>
    <button
      class="btn btn-success"
      @click="setToWatchedList(movie.id)"
    >{{ watchedBtn ? 'Add to' : 'Remove from'}} Watched List</button>
    <button
      class="btn btn-warning"
      @click="setToStarredList(movie.id)"
    >{{ starredBtn ? 'Add to' : 'Remove from'}} Starred List</button>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import axios from "axios";

export default {
  name: "AddToLists",

  props: ["movie"],

  data: () => {
    return {
      watchBtn: true,
      watchedBtn: true,
      starredBtn: true
    };
  },

  created() {
    isInWatchList = this.movie.users === undefined || this.movie.users == 0 ||
                    this.movie.users[this.user.id].pivot.is_watched;

    isInWatchedList = this.movie.users === undefined || this.movie.users == 0 ||
                      this.movie.users[this.user.id].pivot.is_watched;

    isInStarredList = this.movie.users === undefined || this.movie.users == 0 ||
                      this.movie.users[this.user.id].pivot.is_starred;
  },

  computed: mapGetters({
    user: "auth/user"
  }),

  methods: {
    setToWatchList: function(id) {
      this.watchBtn
        ? axios.put(`/api/watchlist/${id}`).then(response => {})
        : axios.delete(`/api/watchlist/${id}`).then(response => {});

      this.watchBtn = !this.watchBtn;
    },

    setToWatchedList: function(id) {
      this.watchedBtn
        ? axios.put(`/api/watchedlist/${id}`).then(response => {})
        : axios.delete(`/api/watchedlist/${id}`).then(response => {});

      this.watchedBtn = !this.watchedBtn;
    },

    setToStarredList: function(id) {
      this.starredBtn
        ? axios.put(`/api/starredlist/${id}`).then(response => {})
        : axios.delete(`/api/starredlist/${id}`).then(response => {});

      this.starredBtn = !this.starredBtn;
    }

    // hasInWatchList: function(id) {
    //   axios.get(`/api/hasinwatchlist/${id}`).then(response => {
    //     console.log(response);
    //     this.watchBtn = response.data;
    //   });
    // },

    // hasInWatchedList: function(id) {
    //   axios.get(`/api/hasinwatchedlist/${id}`).then(response => {
    //     this.watchedBtn = response.data;
    //   });
    // },

    // hasInStarredList: function(id) {
    //   axios.get(`/api/hasinstarredlist/${id}`).then(response => {
    //     this.starredBtn = response.data;
    //   });
    // }
  }
};
</script>
