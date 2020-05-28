<template>
    <div class="logo order-2 md:order-1">
        <span class="text-lg uppercase font-bold md:hidden" v-if="text">{{ text }}</span>

        <img v-else class="logo__mobile" src="/assets/imgs/mobile-logo.png" alt="urban-cruise logo">

        <img class="logo__desktop" src="/assets/imgs/mobile-logo.png" alt="urban-cruise logo">
    </div>
</template>

<script>
export default {
    props: {
        text: {
            required: false,
            type: String,
        }
    }
}
</script>

<style lang="sass">
    .logo
        @apply flex justify-center flex-grow max-h-full px-1

        &__mobile
            max-height: 60px
            @screen md
                @apply hidden
        &__desktop
            @apply hidden
            max-height: 80px
            @screen md
                @apply block
</style>
