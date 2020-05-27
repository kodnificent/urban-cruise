<template>
    <div class="post-card">
        <a class="w-full md:w-1/2" :href="post.url">
            <post-card-image v-if="post.file" :src="post.file.thumbnails.medium" />
        </a>
        <div class="w-full md:w-1/2 pt-4 md:pt-0 md:pl-4">
            <div>
                <category-tag-light :href="post.category.url">
                    {{ post.category.title }}
                </category-tag-light>
            </div>

            <post-header>
                <post-header-link :title="post.title" :href="post.url">
                    {{ post.truncated_title_md }}
                </post-header-link>
            </post-header>

            <post-author :author="post.creator.name" />

            <div class="mt-4" v-html="post.truncated_summary"></div>

            <read-more class="block" :href="post.url" />
        </div>
    </div>
</template>

<script>
export default {
    props: {
        post: {
            required: true,
            type: Object,
        }
    }
}
</script>

<style lang="sass">
    .post-card
        @apply flex flex-wrap

</style>
