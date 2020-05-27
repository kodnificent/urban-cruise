<template>
    <div class="post-card__image">
        <img :src="src">
    </div>
</template>

<script>
export default {
    props: {
        src: {
            required: true,
            type: String,
        }
    }
}
</script>

<style lang="sass">
    .post-card__image
        max-height: 200px
        @apply overflow-hidden rounded shadow h-auto
</style>
