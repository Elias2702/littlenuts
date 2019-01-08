<template>
  <!-- BE CAREFUL: there must be one global div around the whole component -->
  <div>
      <div class="col-md-4">
          <form>
              <div class="form-group">
                  <label for="exampleInputEmail1">Add movie title</label>
                  <input type="text" class="form-control" v-model="title">
                  <small class="form-text text-muted">Please enter the title's English version.</small>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Youtube URL</label>
                  <input type="text" class="form-control" v-model="youtubeUrl">
                  <small class="form-text text-muted">The entry must be a valid Youtube URL</small>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Add release year</label>
                  <input type="text" class="form-control" v-model="release">
                  <small class="form-text text-muted">Must be in YYYY format</small>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Add synopsys</label>
                  <input type="textarea" class="form-control" v-model="synopsis">
                  <small class="form-text text-muted">Max. 5000 characters</small>
              </div>
              <div class="form-group">
                  <label for="customRange2">Age limit</label>
                  <input type="range" class="custom-range" min="0" max="5" v-model="age">
              </div>
              <div class="form-group custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Check this box if the movie is awesome</label>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
      <br>
      <div class="col-md-4">
          <div class="card card-default">
              <div class="card-header"><h2>{{ title }}</h2></div>
              <div class="card-body">
                  <p>{{ release }}</p>
                  <p>{{ synopsis }}</p>
                  <p>{{ age }}</p>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
    export default {
      data () {
          return {
              title: '',
              youtubeUrl: '',
              release: '',
              synopsis: '',
              age: '',
          }
      },
      mounted() {
          console.log('Component mounted.')
      }
    }
</script>
