import Vue from 'vue'
import Card from './Card'
import Register from '../pages/auth/register'
import Child from './Child'
import Button from './Button'
import Search from './Search'
import Checkbox from './Checkbox'
import AddToLists from './AddToLists'
import { HasError, AlertError, AlertSuccess } from 'vform'

// Components that are registered globally.
[
  AddToLists,
  Card,
  Child,
  Button,
  Checkbox,
  Register,
  Search,
  HasError,
  AlertError,
  AlertSuccess
].forEach(Component => {
  Vue.component(Component.name, Component);
})

Vue.component('pagination', require('laravel-vue-pagination'));
