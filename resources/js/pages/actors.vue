<template>
  <card :title="$t('actors')" class="mb-4">
    <div class="row text-center">
      <div v-for="actor in actors.data" :key="actor.id" class="col-lg-3 col-md-4 col-6">
        <div class="card-body">
          <router-link :to="{ name: 'actor', params: { id: actor.id }}">
            <img :src="actor.picture_path" class="img-fluid mb-3">
          </router-link>
          <h5 class="card-title" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
            <router-link
              :to="{ name: 'actor', params: { id: actor.id }}"
            >{{ actor.first_name }} {{ actor.last_name }}</router-link>
          </h5>
        </div>
      </div>
    </div>
    <div class="d-flex mt-2">
      <div class="mx-auto">
        <pagination :data="actors" @pagination-change-page="getResults" :limit="2"></pagination>
      </div>
    </div>
  </card>
</template>

<script>
import axios from "axios";

export default {
  // middleware: "guest",

  metaInfo() {
    return { title: this.$t("actors") };
  },

  data: () => {
    return {
      actors: {}
    };
  },

  created() {
    this.getResults();
  },

  methods: {
    getResults(page = 1) {
      axios.get("/api/actors?page=" + page).then(response => {
        this.actors = response.data;
      });
    }
  }
};
</script>
