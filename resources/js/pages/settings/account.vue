<template>
  <div>

      <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <h4 class="alert-heading">Our Membership Policy</h4>
          <hr>
          <p><strong>If you have a Guest account</strong>, you need to find a Premium member to enroll you as their guest in order to watch our great movies. You can manage your requests here.</p>
          <p><strong>If you have a Premium account</strong>, you can manage your guests (max. of 2) here.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>

          <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <h4 class="alert-heading">Winter Deal!</h4>
              <hr>
              <p>Because we're so great, you can freely chose your Account type for the time being.</p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>

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
            <hr>
          </div>
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
