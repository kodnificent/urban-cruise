<template>
    <aside class="sticks-to-top">
        <div class="hidden md:block">
            <section-header>
                search
            </section-header>

            <desktop-search-form class="mt-6" />
        </div>

        <div class="flex mt-8">
            <div class="icon-container">
                <a title="like us on facebook" target="__blank" :href="$root.social_links.facebook" class="social-icon">
                    <span class="sr-only">Facebook</span>

                    <feather-icon fill="#3b5998" stroke-width="0" icon="facebook" size="lg" />

                    <span class="text-xs capitalize text-gray-700 font-bold mt-1">like</span>
                </a>
            </div>

            <div class="icon-container">
                <a title="follow us on twitter" target="__blank" :href="$root.social_links.twitter" class="social-icon">
                    <span class="sr-only">Twitter</span>

                    <feather-icon fill="#1da1f2" stroke-width="0" icon="twitter" size="lg" />

                    <span class="text-xs capitalize text-gray-700 font-bold mt-1">follow</span>
                </a>
            </div>

            <div class="icon-container">
                <a title="follow us on instagram" target="__blank" :href="$root.social_links.instagram" class="social-icon">
                    <feather-icon stroke="#e1306c" icon="instagram" size="lg" />

                    <span class="text-xs capitalize text-gray-700 font-bold mt-1">follow</span>
                </a>
            </div>
        </div>

        <div class="mt-8">
            <section-header>
                most recent articles
            </section-header>

            <most-recent-articles class="mt-6" />
        </div>
    </aside>
</template>

<script>
export default {
    //
}
</script>

<style lang="sass">
    .icon-container
        @apply w-1/3
        &:not(:first-child)
            @apply pl-2

    .social-icon
        min-height: 80px
        @apply border border-gray-200 w-full py-2 flex flex-col items-center shadow

</style>
