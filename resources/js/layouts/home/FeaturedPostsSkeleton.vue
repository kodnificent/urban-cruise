<template>
    <vue-glide v-bind="options">
        <vue-glide-slide>
            <div class="slider__item skeleton">
            </div>
        </vue-glide-slide>

        <vue-glide-slide>
            <div class="slider__item skeleton">
            </div>
        </vue-glide-slide>

        <vue-glide-slide>
            <div class="slider__item skeleton">
            </div>
        </vue-glide-slide>
    </vue-glide>
</template>

<script>
import PostSlider from "./post-slider";

export default {
    mixins: [PostSlider],

    beforeMount()
    {
        this.options.autoplay = false;
    }
}
</script>

<style lang="sass">
@import './post-slider'
</style>
