<template>
    <div>
        <div v-if="base_fetching">
            fetching
        </div>
        <template v-else-if="base_fetched">
            <header-component>
                <nav-bar />
                <header-logo />
                <header-search />
            </header-component>

            <content-component>
                <section>
                    <section-header>
                        featured
                    </section-header>

                    <featured-posts :posts="res.featured_posts" />
                </section>

                <main-layout>
                    <category-section
                        v-for="category in res.categories"
                        :key="category.id"
                        v-bind="{category}" />
                </main-layout>
            </content-component>

            <footer-component />
        </template>
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
