<template>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">

      <router-link :to="{ name: user ? 'home' : 'movies' }" class="navbar-brand text-white">
        <img src='/assets/images/logo_white.svg' alt="LittleNuts" width="90">
      </router-link>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false">
        <span class="navbar-toggler-icon"/>
      </button>

      <div id="navbarToggler" class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link :to="{ name: 'movies' }" class="nav-link text-white" active-class="active">
              <fa icon="film" style="color: white;"/> {{ $t('catalogue') }}
            </router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{ name: 'actors' }" class="nav-link text-white" active-class="active">
              <fa icon="users" style="color: white;"/> {{ $t('actors') }}
            </router-link>
          </li>
          <!--Béné-->
          <li class="nav-item">
            <search></search>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <!-- Authenticated -->
          <li v-if="user" class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light"
               href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <fa icon="user-cog" style="color: white;"/>
              {{ user.firstname }}
            </a>
            <div class="dropdown-menu">
              <router-link :to="{ name: 'settings.profile' }" class="dropdown-item pl-3">
                <fa icon="cog" fixed-width/>
                {{ $t('settings') }}
              </router-link>

              <div class="dropdown-divider"/>
              <a href="#" class="dropdown-item pl-3" @click.prevent="logout">
                <fa icon="sign-out-alt" fixed-width/>
                {{ $t('logout') }}
              </a>
            </div>
          </li>
          <!-- Guest -->
          <template v-else>
            <li class="nav-item">
              <router-link :to="{ name: 'login' }" class="nav-link text-white" active-class="active">
                {{ $t('login') }}
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'register' }" class="nav-link text-white" active-class="active">
                {{ $t('register') }}
              </router-link>
            </li>
          </template>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from 'vuex'
import LocaleDropdown from './LocaleDropdown'

export default {
  components: {
    LocaleDropdown
  },

  data: () => ({
    appName: window.config.appName
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>

<style scoped>
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -.375rem 0;
}
</style>
