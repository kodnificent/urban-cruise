<template>
    <vue-glide>
        <vue-glide-slide>
            hello
        </vue-glide-slide>
    </vue-glide>
</template>

<script>
import { Glide, GlideSlide } from "vue-glide-js";
export default {
    components: {
        [Glide.name]: Glide,
        [GlideSlide.name]: GlideSlide
    }
}
</script>
