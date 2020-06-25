<template>
    <a :title="title">
        <span class="sr-only">{{ title }}</span>
        <span class="dots" aria-hidden="true"></span>
        <span class="dots" aria-hidden="true"></span>
        <span class="dots" aria-hidden="true"></span>
    </a>
</template>

<script>
export default {
    props: {
        title: {
            required: true,
            type: String,
        }
    }
}
</script>

<style lang="sass" scoped>
    .dots
        width: 8px
        height: 8px
        @apply bg-primary inline-block rounded-full

        &:not(:first-child)
            margin-left: 0.1rem
</style>
