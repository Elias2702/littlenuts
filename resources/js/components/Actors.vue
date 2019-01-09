<template>
    <div>
        <div v-for="actor in actors" class="card text-center">
            <div class="card-body">
                {{ actor.first_name }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                actor: '',
                actors: [
                { 'created_at' : '' },
                { 'first_name' : '' },
                { 'id' : '' },
                { 'last_name' : '' },
                { 'picture_path' : '' },
                { 'updated_at' : '' },
                ],
            }
        }
    }
</script>
