<template>
    <div class="logo">
        <img class="logo__mobile" src="/assets/imgs/mobile-logo.png" alt="urban-cruise logo">
    </div>
</template>

<style lang="sass">
    .logo
        @apply flex justify-center flex-grow max-h-full px-1

        &__mobile
            max-width: 120px
            @screen md
                @apply hidden
</style>
