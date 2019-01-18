<template>
    <div class="searchbar input-group mb-3">
        <input class="inputsearch form-control" type="search" placeholder="Search a movie" aria-label="Search" v-model.lazy="keywords" @keyup.enter="fetch()">
        <button class="btn btn-outline-secondary" @click="fetch()"><fa icon="search" style="color: white;"/></button>
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
