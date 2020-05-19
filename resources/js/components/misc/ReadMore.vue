<template>
    <a title="read more">
        <span class="sr-only">read more</span>
        <span class="dots" aria-hidden="true"></span>
        <span class="dots" aria-hidden="true"></span>
        <span class="dots" aria-hidden="true"></span>
    </a>
</template>

<style lang="sass" scoped>
    .dots
        width: 8px
        height: 8px
        @apply bg-primary inline-block rounded-full

        &:not(:first-child)
            margin-left: 0.1rem
</style>
