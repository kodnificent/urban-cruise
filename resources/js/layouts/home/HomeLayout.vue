<template>
    <div>
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

                <featured-posts :posts="data.featured_posts" />
            </section>

            <main-layout>
                <category-section
                    v-for="category in data.categories"
                    :key="category.id"
                    v-bind="{category}" />
            </main-layout>
        </content-component>
    </div>
</template>
<script>
import { layout } from "../../mixins/layout";
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
