<template>
    <div>
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

                <div class="mt-4" v-html="firstPost.truncated_summary">
                </div>
                <read-more class="block" :href="firstPost.url" />
            </div>
        </div>

        <div class="flex flex-wrap -ml-4 mt-8">
            <div v-for="post in otherPosts" :key="post.id" class="w-full md:w-1/2 mb-8 pl-4 flex">
                <div class=" w-1/3 overflow-y-hidden rounded shadow h-auto" style="max-height: 80px;">
                    <img :src="post.file.thumbnails.small">
                </div>

                <div class="w-2/3 pl-4">
                    <category-tag-light :href="post.category.url">
                        {{ post.category.title }}
                    </category-tag-light>

                    <h2 class="capitalize text-lg font-semibold leading-5">
                        <a :title="post.title" class="text-gray-800 hover:text-primary" :href="post.url">
                            {{ post.truncated_title }}
                        </a>
                    </h2>

                    <div>
                        <span class="text-sm text-gray-700">
                            {{ post.creator.name}}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-center">
            <button class="button">
                load more
            </button>
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

    methods: {

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
    }
}
</script>
