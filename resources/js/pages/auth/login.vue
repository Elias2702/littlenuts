<template>
  <div class="row">
    <!-- Explanatory (dissmissable) message -->
    <div class="col-lg-8 m-auto">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">{{ $t('littlenuts all access') }}</h4>
            <p><strong>You do not need to be logged in to take a look at our awesome movie and actor catalogues!</strong><br>If you have a Guest account, you can enjoy our 6-month free trial. After that, you will either need to upgrade to Premium membership, or keep your Guest account and find a Premium person to enroll you as one of their guest. More info in the Account settings section.</p>
            <hr>
            <p class="mb-0">If you do not have an account, register for free!</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

      <card class="text-white bg-dark">
          <!-- Card Navbar -->
          <div class="card-header text-white bg-dark">
              <ul class="nav nav-pills card-header-tabs justify-content-center">
                <li class="nav-item">
                  <a class="nav-link btn"  @click="islogin=true" :class="{active:islogin}">{{ $t('login') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" @click="islogin=false" :class="{active:!islogin}">{{ $t('register') }}</a>
                </li>
              </ul>
          </div>

            <!-- Login Form -->
          <form v-if="islogin"  @submit.prevent="login" @keydown="form.onKeydown($event)" style="margin-top: 30px;">
            <!-- Email -->
            <div class="form-group row">
              <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
              <div class="col-md-7">
                <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email">
                <has-error :form="form" field="email"/>
              </div>
            </div>

            <!-- Password -->
            <div class="form-group row">
              <label class="col-md-3 col-form-label text-md-right">{{ $t('password') }}</label>
              <div class="col-md-7">
                <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password">
                <has-error :form="form" field="password"/>
              </div>
            </div>

            <!-- Remember Me -->
            <div class="form-group row">
              <div class="col-md-3"/>
              <div class="col-md-7 d-flex">
                <checkbox v-model="remember" name="remember">
                  {{ $t('remember_me') }}
                </checkbox>

                <router-link :to="{ name: 'password.request' }" class="small ml-auto my-auto">
                  {{ $t('forgot_password') }}
                </router-link>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-7 offset-md-3 d-flex">
                <!-- Submit Button -->
                <v-button :loading="form.busy">
                  {{ $t('login') }}
                </v-button>

                <!-- GitHub Login Button -->
                <login-with-github/>
              </div>
            </div>
          </form>

          <div v-else="">
              <register></register>
          </div>

      </card>
    </div>
  </div>
</template>

<script>
import Form from 'vform'
import LoginWithGithub from '~/components/LoginWithGithub'

export default {
  middleware: 'guest',

  components: {
    LoginWithGithub
  },

  metaInfo () {
    return { title: this.$t('login') }
  },

  data: () => ({
    form: new Form({
      email: '',
      password: ''
    }),
    remember: false,
    islogin: true
  }),

  methods: {
    async login () {
      // Submit the form.
      const { data } = await this.form.post('/api/login')

      // Save the token.
      this.$store.dispatch('auth/saveToken', {
        token: data.token,
        remember: this.remember
      })

      // Fetch the user.
      await this.$store.dispatch('auth/fetchUser')

      // Redirect home.
      this.$router.push({ name: 'home' })
    }
  }
}
</script>
