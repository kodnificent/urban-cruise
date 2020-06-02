<template>
    <section class="category-section" aria-live="polite">

        <div class="flex justify-between mb-6" v-if="show_title">
            <section-header>
                <a class="text-current" :href="category.url">{{ category.title }}</a>
            </section-header>

            <div class="mdc-menu-surface--anchor">
                <button aria-expanded="false" @click.prevent.stop="toggleCategoryMenu" v-if="category.children.length > 0"
                    class="h-7 text-sm capitalize border-gray-800
                        text-gray-800 border rounded-full px-4 flex items-center
                        font-bold hover:text-primary hover:border-primary">
                    <span class="mr-1">{{ selected_category }}</span>

                    <feather-icon icon="chevron-down" size="sm" />
                </button>

                <MDC-menu ref="category_menu">

                    <MDC-menu-item>
                        <button @click.prevent="selectCategory(category)">
                            <MDC-menu-text>
                                All
                            </MDC-menu-text>
                        </button>
                    </MDC-menu-item>

                    <MDC-menu-item v-for="child in category.children" :key="child.id">
                        <button @click.prevent="selectCategory(child)">
                            <MDC-menu-text>
                                {{ child.title }}
                            </MDC-menu-text>
                        </button>
                    </MDC-menu-item>
                </MDC-menu>
            </div>
        </div>

        <p class="italic text-gray-600 mb-6" v-if="show_description">
            {{ category.description }}
        </p>

        <div v-if="fetching_initial_posts">
            <div class="flex flex-wrap">
                <post-card-skeleton />
            </div>
            <div class="flex flex-wrap -ml-4 mt-8">
                <post-small-skeleton v-for="index in [1,2,3,4]" :key="index" class="w-full md:w-1/2 mb-8 pl-4 mt-0" />
            </div>
        </div>

        <div v-else-if="posts.length > 0">
            <post-card :post="firstPost" />

            <div class="flex flex-wrap -ml-4 mt-8">
                <post-small v-for="post in otherPosts" :key="post.id" v-bind="{ post }" class="w-full md:w-1/2 mb-8 pl-4 mt-0" />
            </div>

            <div class="flex flex-col items-center justify-center">
                <button v-if="meta.next_page_url"
                    type="button"
                    @click.stop.prevent="fetchMorePosts(meta.next_page_url)"
                    class="button h-8 flex items-center text-sm bg-gray-200 text-black font-semibold"
                    :disabled="fetching_more_posts">
                    <bubble-loader class="bubble-loader--dark" v-if="fetching_more_posts" />

                    <span v-else> load more </span>
                </button>

                <span aria-hidden="true" class="text-sm font-semibold text-gray-600 lowercase italic" v-else>*** no more ***</span>
            </div>
        </div>

        <div v-else-if="no_post_found">
            <span class="italic text-gray-600">We've not published any article yet on this category</span>
        </div>
    </section>
</template>

<script>
import { posts } from '../../mixins/post/posts';

export default {
    mixins: [posts],
    props: {
        category: {
            required: true,
            type: Object,
        },

        show_title: {
            required: false,
            type: Boolean,
            default: true,
        },

        show_description: {
            required: false,
            type: Boolean,
            default: false,
        }
    },

    data(){
        return {
            selected_category: 'all',
        }
    },

    methods: {
        toggleCategoryMenu(e)
        {
            return this.$refs['category_menu'].toggleMenu(e);
        },

        selectCategory(category)
        {
            if (category.id === this.category.id)
            {
                this.selected_category = 'all';
            } else {
                this.selected_category = category.title;
            }

            this.fetchInitialPosts(category.endpoints.posts)
        }
    },

    mounted(){
        this.fetchInitialPosts(this.category.endpoints.posts);
    }
}
</script>

<style lang="sass">
    .category-section
        &:not(:first-child)
            @apply mt-12
</style>
