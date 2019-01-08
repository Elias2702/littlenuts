<template>
        <div v-for "actor in actors">
            {{actors.firstname}}
        </div>
</template>

<script>
    export default {
        data() {
            return {
                actor:'',
                actors: [
                    {firstname: 'Brad'},
                    {firstname: 'Angelina'},
                ]
            }
        },
        methods: {

        }
    }

