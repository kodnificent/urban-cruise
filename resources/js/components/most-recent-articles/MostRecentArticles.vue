<template>
    <div aria-live="polite">
        <div v-if="fetching_initial_posts">
            <post-small-skeleton v-for="index in [1,2,3,4]" :key="index" />
        </div>

        <div v-else-if="posts.length > 0">
            <post-small v-for="post in posts" :key="post.id" v-bind="{ post }" />
        </div>

        <div v-else-if="no_post_found"></div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            meta: {},
            posts: [],
            no_post_found: false,
            fetching_initial_posts: false,
            fetching_posts_failed: false,
            fetch_limit: 5,
        }
    },

    methods: {
        /**
         * Fetch posts for the first time
         */
        fetchInitialPosts()
        {
            this.fetching_initial_posts = true;

            axios.get(`${this.$root.endpoints.posts}?limit=${this.fetch_limit}`).then(res=>{
                this.meta = res.data.meta;
                this.posts = res.data.data;

                if( this.posts.length === 0) {
                    this.no_post_found = true;
                }
            }).catch( err =>{
                this.fetching_posts_failed = true;
            }).then( () => {
                this.fetching_initial_posts = false;
            })
        },
    },
    mounted()
    {
        this.fetchInitialPosts();
    }
}
</script>
