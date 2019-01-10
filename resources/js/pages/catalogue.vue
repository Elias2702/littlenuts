<template>
  <card :title="$t('catalogue')">
      <div>
          <ul>
              <li v-for="movie in movies"></li>
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
      movies: ''
  },

  computed: mapGetters({
      movies: 'movies'
  }),

  methods: {

  }
}
</script>
