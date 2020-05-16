<template>
    <header class="header">
        <div class="header__container container mx-auto px-2 md:w-4/5 lg:w-3/4">
            <slot></slot>
        </div>
    </header>
</template>

<style lang="sass">
    .header
        background-color: #222222
        @apply shadow text-white sticky top-0 z-30

        &__container
            @apply flex
            @screen md
                @apply pt-4 flex-col

            @media(max-width: 767.9px)
                height: 60px
                background-color: #222222
                color: #ffffff
                @apply flex flex-row items-center sticky top-0
</style>
