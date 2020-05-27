<template>
    <div class="navbar order-1 md:order-2">
        <button
            @click="toggleNav"
            class="navbar__toggler p-1 rounded-full focus:shadow-outline focus:outline-none"
            type="button" :aria-expanded="nav_is_expanded ? 'true' : 'false'">
            <span class="sr-only">toggle navigation visibility</span>

            <feather-icon icon="menu" />
        </button>

        <span
            aria-hidden="true"
            v-if="nav_is_expanded"
            @click="toggleNav"
            class="md:hidden top-0 left-0 bg-black opacity-50 fixed h-full w-full z-30">
        </span>

        <nav class="navbar__nav" :data-expanded="nav_is_expanded ? 'true' : 'false'">
            <button
                ref="close-btn"
                @click="toggleNav"
                class="navbar__close-btn"
                type="button"
                >
                <span class="sr-only">close navigation bar</span>

                <feather-icon icon="x" size="lg" />
            </button>
            <div class="md:hidden" style="width: 100%; height: 150px;">
                <img class="mx-auto block" width="150px" src="/assets/imgs/desktop-logo.png" alt="urban-cruise logo">
            </div>

            <ul class="navbar__list">
                <li v-for="(menu, index) in $root.primary_menu" :key="index" class="navbar__item">
                    <a class="navbar__link"
                        :class="{
                            active: menu.active
                        }" :href="menu.url">
                        {{ menu.name }}
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    data()
    {
        return {
            nav_is_expanded: false
        }
    },

    methods: {
        toggleNav()
        {
            if (this.nav_is_expanded === true) {
                this.nav_is_expanded = false;
            } else {
                this.nav_is_expanded = true;
                this.$refs['close-btn'].focus();
            }
        }
    }
}
</script>

<style lang="sass">
    .navbar
        &__toggler
            @apply mr-3
            @screen md
                @apply hidden
        &__nav
            @apply text-gray-800
            @media(max-width: 767.9px)
                width: 100%
                transform: translateX(-100%)
                transition: all ease-in 0.25s
                @apply fixed top-0 left-0 h-screen bg-gray-100 z-30 px-10

                &[data-expanded=true]
                    transform: translateX(0)

            @screen md
                @apply w-full

        &__list
            @media(max-width: 767.9px)
                @apply h-full mt-6 px-4

            @screen md
                @apply flex justify-center

        &__item
            @media(max-width: 767.9px)
                &:not(:first-child)
                    @apply mt-3
            @screen md
                &:not(:first-child)
                    @apply ml-3

        &__link
            transition: all ease-in 0.25s
            @media(max-width: 767.9px)
                @apply block uppercase p-1 bg-transparent rounded text-gray-800
                &:hover, &:focus, &:active, &.active
                    @apply bg-primary text-on-primary shadow outline-none ml-2

            @screen md
                @apply px-4 py-2 inline-block uppercase text-gray-300 font-bold border-b-2 border-transparent

                &:hover, &:focus, &:active, &.active
                    @apply border-gray-100 text-gray-100

        &__close-btn
            position: absolute
            top: 0.5rem
            right: 0.5rem
            transition: all ease-in 0.25s
            @screen md
                @apply hidden
            @apply text-gray-800 p-1 rounded-full
            &:hover, &:focus
                @apply bg-primary-lighter text-primary outline-none
</style>
