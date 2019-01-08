<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Personalized message</div>
                    <div class="card-body">
                    <label>Type your name here:   </label>
                    <input type="text" v-model="name"></input>
                        <div><strong>Hello {{ name }}. We would love to let you upload a movie, but this functionality is still being developed at the moment. Stay tuned!.</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      data () {
        return {
          name: 'friend'
        };
      },
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>
