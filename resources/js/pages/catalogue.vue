<template>
  <card :title="$t('catalogue')">
      <div>
          <ul>
              <!-- <li>{{ title }}</li> -->
          </ul>

      </div>
  </card>
</template>

<script>

import { mapGetters } from 'vue'

export default {
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('catalogue') }
  },

  data () {
      title: ''
  },

  created () {
      // this.title = this.movies.title;
  },

  computed: mapGetters({
      movies: 'movies'
  }),

  methods: {

  }
}
</script>
