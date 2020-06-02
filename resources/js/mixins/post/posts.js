export const posts = {
    data(){
        return {
            meta: {},
            posts: [],
            no_post_found: false,
            fetching_initial_posts: false,
            fetching_posts_failed: false,
            fetching_more_posts: false,
            fetch_limit: 7,
        }
    },

    computed: {
        firstPost()
        {
            return this.posts[0];
        },

        otherPosts()
        {
            return this.posts.filter((post, index)=>{
                return index !== 0;
            });
        }
    },

    methods: {

        /**
         * Fetch posts for the first time
         */
        fetchInitialPosts(url)
        {
            this.fetching_initial_posts = true;

            axios.get(`${url}`, {
                params: {
                    limit: this.fetch_limit
                }
            }).then(res=>{
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

        /**
         * Fetch more posts
         */
        fetchMorePosts(url)
        {
            this.fetching_more_posts = true;

            axios.get(`${url}`, {
                params: {
                    limit: this.fetch_limit
                }
            }).then(res=>{
                this.meta = res.data.meta;
                this.posts.push(...res.data.data);
            }).catch( err =>{
                this.fetching_posts_failed = true;
            }).then( () => {
                this.fetching_more_posts = false;
            })
        },
    },
};
