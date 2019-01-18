<template>
  <div class="card mb-4 p-4">
    <div class="row">
      <div class="col-md-3 text-center">
        <img :src="actor.picture_path" class="img-fluid mb-3">
      </div>
      <div class="col-md-9">
        <h2 class="mb-3 pb-2 border-bottom">{{ actor.first_name + " " + actor.last_name }}</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi, assumenda! Quas rerum natus eum exercitationem rem saepe, eaque voluptatem praesentium quia officiis, officia, pariatur eius blanditiis ex doloremque eos perspiciatis. Quod fuga magnam iste praesentium illum. Tempora sapiente eius asperiores.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h2 class="mb-3 pb-2 border-bottom">Filmography</h2>
        <div class="row text-center">
          <div v-for="movie in actor.movies" :key="movie.id" class="col-lg-3 col-md-4 col-6">
            <div class="card-body">
              <router-link :to="{ name: 'movie', params: { id: movie.id }}">
                <img :src="movie.cover_path" class="img-fluid mb-3">
              </router-link>
              <h5
                class="card-title"
                style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"
              >
                <router-link :to="{ name: 'movie', params: { id: movie.id }}">{{ movie.title }}</router-link>
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
  </div>
</template>

<script>
import axios from "axios";

export default {
  // middleware: "guest",

  metaInfo() {
    return { title: this.actor.first_name + " " + this.actor.last_name };
  },

  data: () => {
    return {
      actor: ""
    };
  },

  created() {
    axios.get(`/api/actors/${this.$route.params.id}`).then(response => {
      console.log(response.data);
      this.actor = response.data;
    });
  }
};
</script>
