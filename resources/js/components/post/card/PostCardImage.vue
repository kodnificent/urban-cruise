<template>
    <div class="post-card__image">
        <img v-lazy="src" :alt="alt">
    </div>
</template>

<script>
export default {
    props: {
        src: {
            required: true,
            type: String,
        },

        alt: {
            required: false
        }
    }
}
</script>

<style lang="sass">
    .post-card__image
        max-height: 200px
        @apply overflow-hidden rounded shadow h-auto
</style>
