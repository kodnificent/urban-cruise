<template>
    <div class="mobile-search">
        <button @click="toggleDialog" class="mobile-search__button p-1 rounded-full focus:shadow-outline focus:outline-none" type="button">
            <feather-icon icon="search" />
            <span class="sr-only">open search form</span>
        </button>

        <form
            @submit.prevent="search"
            class="mobile-search__dialog"
            :data-expanded="dialog_is_expanded ? 'true' : 'false'">
            <div class="mobile-search__dialog-header">
                <button
                    type="button"
                    @click="toggleDialog"
                    class="mobile-search__dialog-button">
                    <feather-icon icon="arrow-left" />

                    <span class="sr-only"> close search form</span>
                </button>

                <input
                    ref="dialog-input"
                    class="mobile-search__dialog-input"
                    type="search"
                    placeholder="Enter a keyword here to search" autofocus />
            </div>

            <div class="flex flex-col h-screen mx-auto items-center justify-center px-8">
                <img src="/assets/imgs/search.svg" class="-mt-40 mb-6" height="200px" width="200px" />

                <p class="text-center text-gray-700">
                    Looking for information on Politics, News, Enterntainment, Sports, Lifestyle? We've got you covered
                </p>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data()
    {
        return {
            dialog_is_expanded: false
        }
    },

    methods: {
        toggleDialog()
        {
            if (this.dialog_is_expanded === true) {
                this.dialog_is_expanded = false;
            } else {
                this.dialog_is_expanded = true;
                this.$refs['dialog-input'].focus();
            }
        },

        search()
        {
            //
        }
    },

    mounted()
    {
        //
    }
}
</script>

<style lang="sass">
    .mobile-search
        @screen md
            @apply hidden

        &__dialog
            width: 100vw
            transform: translateX(100vw)
            transition: all ease-in 0.25s
            @apply fixed top-0 left-0 h-screen bg-white text-gray-700 z-30

            &[data-expanded=true]
                transform: translateX(0)

            &-header
                height: 60px
                @apply sticky top-0 shadow w-full px-2 py-1 flex items-center

            &-button
                @apply p-1 rounded-full mr-1
                &:focus
                    @apply outline-none shadow-outline

            &-input
                @apply flex-grow px-2 py-1
                &:focus
                    @apply outline-none
</style>
