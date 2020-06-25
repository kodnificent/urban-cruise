<template>
    <vue-glide class="relative post-slider" v-bind="options">
        <vue-glide-slide class="py-4" v-for="post in posts" :key="post.id">
            <div class="slider__item relative">

                <img class="rounded" v-if="post.file" :src="post.file.thumbnails.medium" />

                <a :href="post.url" class="post__container">
                    <div>
                        <category-tag :href="post.category.parent.url" class="mr-2">
                            {{ post.category.parent.title }}
                        </category-tag>
                        <category-tag :href="post.category.url">
                            {{ post.category.title }}
                        </category-tag>
                    </div>

                    <h1 class="capitalize font-bold post__title text-shadow">
                        <a class="text-current" :href="post.url">
                            {{ post.title }}
                        </a>
                    </h1>

                    <p class="text-sm -mt-1 text-shadow">
                        {{ post.creator.name }}
                    </p>
                </a>
            </div>
        </vue-glide-slide>

        <template slot="control" id="controls">
            <button type="button" data-glide-dir="<">
                <feather-icon icon="arrow-left" />
                <span class="sr-only">previous</span>
            </button>

            <button type="button" data-glide-dir=">">
                <feather-icon icon="arrow-right" />
                <span class="sr-only">next</span>
            </button>
        </template>
    </vue-glide>
</template>

<script>
import PostSlider from "../../mixins/slider/post-slider";

export default {
    mixins: [PostSlider],

    props: {
        posts: {
            required: true,
            type: Array,
        }
    },

    data(){
        return {
            //
        }
    },

    beforeMount()
    {
        this.options.peek = {
            before: 0,
            after: 50
        };
    }
}
</script>

<style lang="sass">
@import '../../mixins/slider/post-slider'

.post-slider [data-glide-el=controls]
    top: -11%
    @apply absolute right-0 hidden
    @screen md
        @apply block
</style>

<style lang="sass" scoped>
    .post__container
        background: rgba(0,0,0, 0.4)
        @apply flex flex-col justify-end p-4 rounded text-gray-100 absolute top-0 left-0 w-full h-full

    .text-shadow
        text-shadow: 0px 2px 4px rgba(0,0,0,0.6)
</style>
