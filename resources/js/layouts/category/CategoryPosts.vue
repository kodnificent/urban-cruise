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
            <load-more-posts />
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
