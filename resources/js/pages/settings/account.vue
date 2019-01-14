<template>
  <card :title="$t('your_account')">
      <form>
      <div class="form-group row">
        <div class="custom-control custom-switch" style="margin-left: 10px">
            <label class="custom-control-label" for="customSwitch1">You have a {{ accountType }} account.</label>
            <input type="checkbox" class="custom-control-input" v-model="is_premium">
            <v-switch
                :label="`Switch 1: ${is_premium.toString()}`"
                v-model="is_premium">
            </v-switch>
        </div>
      </div>
      </form>
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
    accountType: '',
    form: new Form({
      is_premium: ''
    })
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  created () {
    this.is_premium = this.user.is_premium;
    this.form.is_premium = this.user.is_premium;
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
