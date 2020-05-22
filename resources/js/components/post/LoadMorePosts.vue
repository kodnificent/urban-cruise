<template>
    <button
        type="button"
        @click.stop.prevent="fetchPosts"
        class="button h-8 flex items-center text-sm bg-gray-200 text-black font-semibold"
        :disabled="isFetching">
        <bubble-loader class="bubble-loader--dark" v-if="isFetching">
        </bubble-loader>

        <span v-else> load more </span>
    </button>
</template>

<script>
export default {
    data(){
        return {
            isFetching: false,
        }
    },

    methods: {
        fetchPosts(){
            this.isFetching = true;
        }
    },
}
</script>
