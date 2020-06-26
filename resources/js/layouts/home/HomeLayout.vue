<template>
    <div>
        <header-component>
            <nav-bar />
            <header-logo />
            <header-search />
        </header-component>

        <content-component>
            <div v-if="base_fetching">
                fetching
            </div>

            <template v-else>
                <section v-if="res.featured_posts.length > 0">
                    <section-header>
                        featured
                    </section-header>

                    <featured-posts :posts="res.featured_posts" />
                </section>

                <main-layout class="py-8">
                    <category-section
                        v-for="category in res.categories"
                        :key="category.id"
                        v-bind="{category}" />
                </main-layout>
            </template>
        </content-component>

        <footer-component />
    </div>
</template>
<script>
import { layout } from "../../mixins/layout/layout";
export default {
    mixins: [layout],

    data(){
        return {

        }
    },

    mounted()
    {
        //
    }
}
</script>
