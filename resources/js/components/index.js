import Vue from 'vue'
import Card from './Card'
import Child from './Child'
import Button from './Button'
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
  HasError,
  AlertError,
  AlertSuccess
].forEach(Component => {
  Vue.component(Component.name, Component)
})
