<template>
    <header class="header container mx-auto">
        <slot></slot>
    </header>
</template>

<style lang="sass">
    .header
        @apply mx-auto px-4

        @media(max-width: 767.9px)
            height: 60px
            background-color: #222222
            color: #ffffff
            @apply flex flex-row items-center sticky top-0
</style>
