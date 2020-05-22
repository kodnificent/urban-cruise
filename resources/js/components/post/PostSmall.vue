<template>
    <div class="post-small">
        <div class="post-small__image-container">
            <img :src="post.file.thumbnails.small">
        </div>

        <div class="post-small__card">
            <category-tag-light :href="post.category.url">
                {{ post.category.title }}
            </category-tag-light>

            <h2 class="post-small__card-title">
                <a :title="post.title" class="post-small__card-link" :href="post.url">
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

        &__image-container
            max-height: 80px
            @apply w-1/3 overflow-y-hidden rounded shadow h-auto

        &__card
            @apply w-2/3 pl-4

            &-title
                @apply capitalize text-lg font-semibold leading-5

            &-link
                @apply text-gray-800
                &:hover text-primary
</style>
