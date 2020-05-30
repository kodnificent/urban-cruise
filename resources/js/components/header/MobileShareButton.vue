<template>
    <button v-if="$root.isMobile" class="order-3 p-1 rounded-full focus:shadow-outline focus:outline-none">
        <span class="sr-only">
            <slot>
                share
            </slot>
        </span>
        <feather-icon icon="share-2" />
    </button>
</template>

<script>
export default {
    //
}
</script>
