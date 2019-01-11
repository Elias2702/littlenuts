const Login = () => import('~/pages/auth/login').then(m => m.default || m)
const Register = () => import('~/pages/auth/register').then(m => m.default || m)
const PasswordEmail = () => import('~/pages/auth/password/email').then(m => m.default || m)
const PasswordReset = () => import('~/pages/auth/password/reset').then(m => m.default || m)
const NotFound = () => import('~/pages/errors/404').then(m => m.default || m)

const Home = () => import('~/pages/home').then(m => m.default || m)
const Settings = () => import('~/pages/settings/index').then(m => m.default || m)
const SettingsProfile = () => import('~/pages/settings/profile').then(m => m.default || m)
const SettingsAccount = () => import('~/pages/settings/account').then(m => m.default || m)
const SettingsPassword = () => import('~/pages/settings/password').then(m => m.default || m)
const Catalogue = () => import('~/pages/catalogue').then(m => m.default || m)
const Actors = () => import('~/pages/actors').then(m => m.default || m)
const Search = () => import('~/pages/testsearch').then(m => m.default || m)

export default [
  { path: '/catalogue', name: 'catalogue', component: Catalogue },
  { path: '/actors', name: 'actors', component: Actors },
  { path: '/testsearch', name: 'search', component: Search },

  { path: '/login', name: 'login', component: Login },
  { path: '/register', name: 'register', component: Register },
  { path: '/password/reset', name: 'password.request', component: PasswordEmail },
  { path: '/password/reset/:token', name: 'password.reset', component: PasswordReset },

  { path: '/home', name: 'home', component: Home },
  { path: '/settings',
    component: Settings,
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: SettingsProfile },
      { path: 'account', name: 'settings.account', component: SettingsAccount },
      { path: 'password', name: 'settings.password', component: SettingsPassword }
    ]
  },


  { path: '*', component: NotFound }
]
