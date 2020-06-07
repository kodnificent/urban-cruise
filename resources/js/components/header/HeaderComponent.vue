<template>
    <header class="header">
        <div class="header__container container mx-auto px-2 w-full lg:w-3/4">
            <slot></slot>
        </div>
    </header>
</template>

<style lang="sass">
    .header
        background-color: #222222
        @apply shadow text-white fixed top-0 z-30 w-full

        &__container
            @apply flex
            @screen md
                @apply pt-4

            @media(max-width: 767.9px)
                height: 60px
                background-color: #222222
                color: #ffffff
                @apply flex flex-row items-center

    .header + .after-header
        margin-top: 60px
        @screen md
            margin-top: 96px
</style>
