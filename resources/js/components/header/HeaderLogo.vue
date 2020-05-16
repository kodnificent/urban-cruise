<template>
    <div class="logo order-2 md:order-1">
        <img class="logo__desktop" src="/assets/imgs/desktop-logo.png" alt="urban-cruise logo">
        <img class="logo__mobile" src="/assets/imgs/mobile-logo.png" alt="urban-cruise logo">
    </div>
</template>

<style lang="sass">
    .logo
        @apply flex justify-center flex-grow max-h-full px-1

        &__mobile
            max-height: 60px
            @screen md
                @apply hidden
        &__desktop
            @apply hidden
            max-height: 100px
            @screen md
                @apply block
</style>
