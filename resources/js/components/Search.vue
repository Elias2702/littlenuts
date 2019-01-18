<template>
    <div>
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" v-model.lazy="keywords" @keyup.enter="fetch()">
      <button class="btn btn-outline-info my-2 my-sm-0" @click="fetch()">Search...</button>
    </div>
</template>

<script>
import axios from "axios";
export default {
  name: "Search",
    data() {
        return {
            keywords: null,
            results: []
        };
    },

    // watch: {
    //     keywords(after, before) {
    //         this.fetch();
    //     }
    // },

    methods: {
        fetch() {
            axios.get('/api/search', { params: { keywords: this.keywords } })
                .then(response => this.results = response.data)
                .catch(error => {});

        }
    }
}
</script>

<style scoped>
</style>
