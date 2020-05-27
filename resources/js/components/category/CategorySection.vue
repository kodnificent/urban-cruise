<template>
    <section class="category-section">

        <div class="flex justify-between">
            <section-header>
                {{ category.title }}
            </section-header>

            <a
                :href="category.url"
                class="h-7 text-sm capitalize border-gray-800
                    text-gray-800 border rounded-full px-4 flex items-center
                    font-bold hover:text-primary hover:border-primary">
                all
            </a>
        </div>

        <category-posts class="mt-6" v-bind="{
            posts: [],
            meta: {}
        }" />
    </section>
</template>

<script>
export default {
    props: {
        category: {
            required: true,
            type: Object,
        }
    },

    data(){
        return {
            //
        }
    },

    methods: {
        getFirstPost()
        {
            return this.category.posts[0];
        },

        getOtherPosts()
        {
            this.category.posts.shift();

            return this.category.posts;
        }
    }
}
</script>

<style lang="sass">
    .category-section
        &:not(:first-child)
            @apply mt-12
</style>
