<template>
    <form class="px-1 relative" aria-live="assertive">
        <label class="sr-only">Search</label>
        <input
            v-model="query"
            ref="search"
            class="rounded border w-full p-2 px-4 shadow block focus:shadow-outline focus:outline-none"
            placeholder="Enter keyword here" type="search" />

            <div v-if="query !== ''" class="desktop-search__dialog">

                <div v-if="searching" class="flex items-center justify-center w-full">
                    <bubble-loader class="bubble-loader--dark" />
                    <span class="sr-only">searching</span>
                </div>

                <no-search-data class="mt-20" v-else-if="no_result_found" />

                <search-result v-else-if="result.length > 0" :result="result"/>
            </div>
    </form>
</template>

<script>
import {search} from '../../mixins/search/search';

export default {
    mixins: [search]
}
</script>

<style lang="sass">
    .desktop-search__dialog
        min-height: 400px
        max-height: 500px
        @apply absolute overflow-auto top-auto border mt-2 -ml-1 block bg-white px-4 py-4 shadow w-full
</style>
