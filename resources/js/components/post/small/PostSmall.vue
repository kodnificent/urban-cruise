<template>
    <div class="post-small">
        <a class="block w-1/3" :href="post.url">
            <post-small-image :src="post.file.thumbnails.small" />
        </a>

        <div class="w-2/3 pl-4">
            <category-tag-light :href="post.category.url">
                {{ post.category.title }}
            </category-tag-light>

            <post-header>
                <post-header-link :title="post.title" :href="post.url">
                    {{ post.truncated_title }}
                </post-header-link>
            </post-header>

            <post-author :post="post" />
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
    .post-small
        @apply flex

        &:not(:first-child)
            @apply mt-4
</style>
