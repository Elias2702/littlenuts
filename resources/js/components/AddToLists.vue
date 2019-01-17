<template>
  <div v-if="user" class="btn-group-vertical btn-group-sm mb-2" role="group">
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
    },

    isInWatchList: function() {
      return !isInWatchedList();
    },

    isInWatchedList: function() {
      try {
        for (let i = 0; i <= this.movie.users.length; i++) {
          if (this.movie.users[i].id == this.user.id) {
            return this.movie.users[i].pivot.is_watched == 1;
          }
        }
      } catch (e) {
        return false;
      }
    },

    isInStarredList: function() {
      try {
        for (let i = 0; i <= this.movie.users.length; i++) {
          if (this.movie.users[i].id == this.user.id) {
            return this.movie.users[i].pivot.is_starred == 1;
          }
        }
      } catch (e) {
        return false;
      }
    }
  },

  created: () => {
    this.watchBtn = ! this.isInWatchList();
    this.watchedBtn = ! this.isInWatchedList();
    this.starredBtn = ! this.isInStarredList();
  }
};
</script>
