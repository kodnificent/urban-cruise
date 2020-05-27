<template>
    <div class="post-small__image">
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
    .post-small__image
        max-height: 80px
        @apply overflow-hidden rounded shadow h-auto
</style>
