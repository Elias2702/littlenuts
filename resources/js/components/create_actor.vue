<template>
    <fieldset id="CreateNewActor">
            <legend>Add an actor</legend>

            <form @submit.prevent="CreateNewActor">
              @csrf
              <!-- {{ method_field('PATCH') }} -->
              BONJPUR
                <div class="form-group">
                    <label>First name</label>
                    <div>
                        <input id="textinput" name="textinput" type="text" placeholder="Firstname" v-model="actor">

                        <button name="submit" class="btn btn-success">Add actor</button>
                    </div>
                </div>
            </form>
</template>

<script>
    export default{

        data(){
            return {
                actor: '',
            }
        },
        methods: {
            CreateNewActor(){
                axios.post('/addactors', {
                    firstname: this.actor
                })
                console.log(this.actor)
            },
        },

    }
</script>