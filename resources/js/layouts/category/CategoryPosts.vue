<template>
    <div aria-live="polite">
        <div class="flex flex-wrap">
            <div class="w-full md:w-1/2 overflow-y-hidden rounded shadow h-auto" style="max-height: 200px">
                <img :src="firstPost.file.thumbnails.medium">
            </div>

            <div class="w-full md:w-1/2 pt-4 md:pt-0 md:pl-4">
                <div>
                    <category-tag-light :href="firstPost.category.url">
                        {{ firstPost.category.title }}
                    </category-tag-light>
                </div>
                <h2 class="capitalize text-lg font-semibold leading-5">
                    <a :title="firstPost.title" class="text-gray-800 hover:text-primary" :href="firstPost.url">
                        {{ firstPost.truncated_title_md }}
                    </a>
                </h2>

                <div>
                    <span class="text-sm text-gray-700">{{ firstPost.creator.name }}</span>
                </div>

                <div class="mt-4" v-html="firstPost.truncated_summary"></div>

                <read-more class="block" :href="firstPost.url" />
            </div>
        </div>

        <div class="flex flex-wrap -ml-4 mt-8">
            <post-small v-for="post in otherPosts" :key="post.id" v-bind="{ post }" class="w-full md:w-1/2 mb-8 pl-4 mt-0" />
        </div>

        <div class="flex flex-col items-center justify-center">
            <button v-if="category_meta.next_page_url"
                type="button"
                @click.stop.prevent="fetchPosts(category_meta.next_page_url)"
                class="button h-8 flex items-center text-sm bg-gray-200 text-black font-semibold"
                :disabled="isFetching">
                <bubble-loader class="bubble-loader--dark" v-if="isFetching">
                </bubble-loader>

                <span v-else> load more </span>
            </button>

            <span aria-hidden="true" class="text-sm font-semibold text-gray-600 lowercase italic" v-else>*** no more ***</span>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        posts: {
            required: true,
            type: Array,
        },

        meta: {
            required: true,
            type: Object,
        }
    },

    computed: {
        firstPost()
        {
            return this.category_posts[0];
        },

        otherPosts()
        {
            return this.category_posts.filter((post, index)=>{
                return index !== 0;
            });
        }
    },

    data(){
        return {
            isFetching: false,
            category_posts: this.posts,
            category_meta: this.meta,
        }
    },

    methods: {
        fetchPosts(url){
            this.isFetching = true;

            axios.get(url).then(res=>{
                this.category_posts.push(...res.data.data.posts);
                this.category_meta = res.data.data.posts_meta;
            }).catch(err=>{
                //
            }).then(()=>{
                this.isFetching = false;
            })
        }
    },

    mounted(){
        //
    }
}
</script>
