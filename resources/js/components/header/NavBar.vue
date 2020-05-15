<template>
    <div class="navbar">
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
            <!--<button
                ref="close-btn"
                @click="toggleNav"
                class="navbar__close-btn"
                type="button"
                >
                <span class="sr-only">close navigation bar</span>

                <feather-icon icon="x" size="lg" />
            </button>-->

            <ul></ul>
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
                //this.$refs['close-btn'].focus();
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
            @media(max-width: 767.9px)
                width: 250px
                transform: translateX(-255px)
                transition: all ease-in 0.25s
                @apply fixed top-0 left-0 h-screen bg-gray-100 z-30

                &[data-expanded=true]
                    transform: translateX(0)

        &__close-btn
            position: absolute
            top: 0.5rem
            right: 0.5rem
            @screen md
                @apply hidden
            @apply text-gray-800 p-1 rounded-full
            &:hover, &:focus
                @apply bg-gray-300 shadow outline-none
</style>
