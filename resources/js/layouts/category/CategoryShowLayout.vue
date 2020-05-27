<template>
    <div>
        <header-component>
            <nav-bar />
            <header-logo />
            <header-search />
        </header-component>

        <content-component>
            <!--<section>
                <section-header>
                    featured
                </section-header>

                <featured-posts :posts="data.featured_posts" />
            </section>-->

            <main-layout class="pt-0">
                <category-section
                    :key="data.id"
                    v-bind="{category: data, meta}" />
            </main-layout>
        </content-component>
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
