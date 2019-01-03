<template>

    <div id="app">

        <input type="text" v-model="keywords" placeholder="Type your search here ...">
            <button type="submit" placeholder="Search" name="Search" class="btn btn-outline-dark"><i class="fa fa-search" aria-hidden="true"></i>
</button>
        </input>
        

        <ul v-if="results.length > 0">

            <li v-for="result in results" :key="result.id" v-text="result.title" ></li>

        </ul>

    </div>
    
</template>


<script>

export default {
    data() {
        return{
            keywords: null,
            results: []
        };
    },

    watch: {
        keywords(after, before){
            this.fetch();
        }
    },

    methods: {
        fetch() {
            axios.get('/api/search', { 
                params: { 
                    keywords: this.keywords 
                } 
            })

            .then(response => this.results = response.data)
            .catch(error => {})
        }
    }
}

</script>
