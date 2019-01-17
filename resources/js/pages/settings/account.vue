<template>
  <div class="card">
    <div class="card-header">{{ $t('your_account' )}}</div>
    <div class="card-body">
      <form>
          <div class="form-check">
              <input type="checkbox" v-model="form.is_premium" name="is_premium" v-on:change="update">
              <label for="is_premium">You have a {{ accountTyper( form.is_premium ) }} account.</label>
          </div>
          <alert-success :form="form" :message="$t('info_updated')"/>
      </form>
    </div>
  </div>
</template>

<script>
import Form from 'vform'
import { mapGetters } from 'vuex'

export default {
  scrollToTop: false,

  metaInfo () {
    return { title: this.$t('settings') }
  },

  data: () => ({
    accountType: '',
    form: new Form({
      is_premium: ''
    })
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  created () {
    this.form.is_premium = this.user.is_premium;
  },

  methods: {
   accountTyper: function ( value ) {
        let accountType = ''
        if (value == 1) {
            accountType = 'Premium'
        } else {
            accountType = 'Guest'
        }
        return accountType;
    },

    update: async function () {
      const { data } = await this.form.patch('/api/settings/account')

      this.$store.dispatch('auth/updateUser', { user: data })
    }
  }
}
</script>

<style scoped>
body {
    position: absolute;
}
</style>
