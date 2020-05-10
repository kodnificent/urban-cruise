<template>

</template>


<script>
export default {
    props: {
        data: {
            required: true,
            type: Array,
        }
    },

    mounted()
    {
        window.$layout = this;
    }
}
</script>
