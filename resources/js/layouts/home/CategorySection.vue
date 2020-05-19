<template>
    <section class="category-section">

        <section-header>
            {{ category.title }}
        </section-header>

        <category-posts class="mt-6" v-bind="{
            posts: category.posts,
            meta: category.posts_meta
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
