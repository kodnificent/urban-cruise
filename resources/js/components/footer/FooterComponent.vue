<template>
    <footer class="footer">
        <div class="container mx-auto px-4 md:px-10 lg:w-4/5 xl:w-3/4">
            <div class="py-8 md:pt-12 flex flex-wrap">
                <div class="w-1/2 md:w-1/4 mb-6" v-for="category in $root.categories" :key="category.id">
                    <h2 class="uppercase text-sm font-bold">
                        <a :href="category.url" class="text-gray-300">
                            {{ category.title }}
                        </a>
                    </h2>

                    <ul class="mt-3">
                        <li class="pb-1" v-for="child in category.children" :key="child.id">
                            <a :href="child.url" class="text-gray-300 py-1">{{ child.title }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="py-4 text-center text-sm border-t border-gray-700">
                <span>
                    &copy; 2020 Urban Cruise. All rights reserved.
                </span>

                <span>
                    Teched up with <span class="sr-only">love</span> <feather-icon icon="heart" size="sm" fill="red" /> by
                    <a href="https://github.com/kodnificent" target="__blank" rel="nofollow" class="underline text-white">Kodnificent</a>
                </span>
            </div>
        </div>
    </footer>
</template>

<style lang="sass">
    .footer
        background-color: #222222
        @apply text-gray-300
</style>
