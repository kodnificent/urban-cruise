<template>
    <section class="category-section" aria-live="polite">

        <div class="flex justify-between mb-6">
            <section-header>
                {{ category.title }}
            </section-header>

            <a v-if="category.children.length > 0"
                :href="category.url"
                class="h-7 text-sm capitalize border-gray-800
                    text-gray-800 border rounded-full px-4 flex items-center
                    font-bold hover:text-primary hover:border-primary">
                all
            </a>
        </div>

        <p class="italic text-gray-600 mb-6" v-if="show_description">
            {{ category.description }}
        </p>

        <div v-if="fetching_initial_posts">
            <div class="flex flex-wrap">
                <post-card-skeleton />
            </div>
            <div class="flex flex-wrap -ml-4 mt-8">
                <post-small-skeleton v-for="index in [1,2,3,4]" :key="index" class="w-full md:w-1/2 mb-8 pl-4 mt-0" />
            </div>
        </div>

        <div v-else-if="posts.length > 0">
            <post-card :post="firstPost" />

            <div class="flex flex-wrap -ml-4 mt-8">
                <post-small v-for="post in otherPosts" :key="post.id" v-bind="{ post }" class="w-full md:w-1/2 mb-8 pl-4 mt-0" />
            </div>

            <div class="flex flex-col items-center justify-center">
                <button v-if="meta.next_page_url"
                    type="button"
                    @click.stop.prevent="fetchMorePosts(meta.next_page_url)"
                    class="button h-8 flex items-center text-sm bg-gray-200 text-black font-semibold"
                    :disabled="fetching_more_posts">
                    <bubble-loader class="bubble-loader--dark" v-if="fetching_more_posts" />

                    <span v-else> load more </span>
                </button>

                <span aria-hidden="true" class="text-sm font-semibold text-gray-600 lowercase italic" v-else>*** no more ***</span>
            </div>
        </div>

        <div v-else-if="no_post_found"></div>
    </section>
</template>

<script>
export default {
    props: {
        category: {
            required: true,
            type: Object,
        },

        show_description: {
            required: false,
            type: Boolean,
            default: false,
        }
    },

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
        fetchInitialPosts()
        {
            this.fetching_initial_posts = true;

            axios.get(`${this.category.endpoints.posts}?limit=${this.fetch_limit}`).then(res=>{
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

            axios.get(`${url}&limit=${this.fetch_limit}`).then(res=>{
                this.meta = res.data.meta;
                this.posts.push(...res.data.data);
            }).catch( err =>{
                this.fetching_posts_failed = true;
            }).then( () => {
                this.fetching_more_posts = false;
            })
        },
    },

    mounted(){
        this.fetchInitialPosts();
    }
}
</script>

<style lang="sass">
    .category-section
        &:not(:first-child)
            @apply mt-12
</style>
