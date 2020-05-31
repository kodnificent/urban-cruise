<template>
    <button @click.stop.prevent="share" v-if="$root.isMobile && canShare" class="order-3 p-1 rounded-full focus:shadow-outline focus:outline-none">
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
    props: {
        data: {
            required: true,
            type: Object,
        }
    },
    computed: {
        canShare()
        {
            return Boolean(navigator.share);
        }
    },

    methods: {
        share()
        {
            navigator.share(this.data).catch(err=>{
                console.log(err);
            });
        }
    }
}
</script>
