<template>
  <div class="btn-group-vertical btn-group-sm" role="group">
    <button
      class="btn"
      @click="setToWatchList(movieId)"
    >{{ watchBtn ? 'Add to' : 'Remove from'}} Watch List</button>
    <button
      class="btn"
      @click="setToWatchedList(movieId)"
    >{{ watchedBtn ? 'Add to' : 'Remove from'}} Watched List</button>
    <button
      class="btn"
      @click="setToStarredList(movieId)"
    >{{ starredBtn ? 'Add to' : 'Remove from'}} Starred List</button>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "AddToLists",

  props: ["movieId"],

  data: () => {
    return {
      movie: "",
      watchBtn: true,
      watchedBtn: true,
      starredBtn: true
    };
  },

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
  }
};
</script>
