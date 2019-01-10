<template>
  <card :title="$t('your_account')">
      <div class="form-group row">
        <p>Change your Littlenuts account type: </p>
        <!--  La checkbox updatera le type de compte de l'utilisateur. Compte Premium (is_premium = 1) ou Compte Guest (is_premium = 0)-->
        <!-- {{ accountType }} est actif et va prendre dans la DB le type de compte de l'utilisateur authentifié -->
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1">You have a {{ accountType }} account.</label>
        </div>
      </div>
  </card>
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
    is_premium: '',
    accountType: ''
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  created () {
    this.is_premium = this.user.is_premium;
  },

  mounted () {
    this.accountTyper ()
  },

  methods: {
   accountTyper: function () {
        let accountType = ''
        if (this.is_premium == 1) {
            accountType = 'Premium'
        } else {
            accountType = 'Guest'
        }
        this.accountType = accountType;
    },

    update: async function () {
      const { data } = await this.form.patch('/api/settings/profile')

      this.$store.dispatch('auth/updateUser', { user: data })
    }
  }
}
</script>
