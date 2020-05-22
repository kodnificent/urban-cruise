<template>
    <div>
        <div class="post-small" v-for="index in total" :key="index">
            <div class="post-small__image-container skeleton" style="height: 80px;"></div>

            <div class="post-small__card">
                <div class="skeleton w-1/4 h-4 app-rounded mb-1"></div>

                <div class="w-full h-6 skeleton"></div>

                <div class="mt-1 h-6 w-5/6 skeleton"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        total: {
            required: false,
            default: 2
        }
    }
}
</script>

