<template>
  <card :title="$t('actors')" class="mb-4">
    <div class="row text-center">
      <div v-for="actor in actors" :key="actor.id" class="col-lg-3 col-md-4 col-6">
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
      actors: ""
    };
  },

  created() {
    axios.get("api/actors").then(response => {
      this.actors = response.data;
    });
  }
};
</script>
