<template>
  <card class="text-center bg-secondary border-secondary text-white">
    <h3 class="errorMessage mb-4">{{ $t('page_not_found') }}</h3>

    <div class="links">
      <router-link :to="{ name: user ? 'home' : 'movies' }">
        {{ $t('go_home') }}
      </router-link>
    </div>
  </card>
</template>

<script>
export default {
  name: 'NotFound'
}
</script>
