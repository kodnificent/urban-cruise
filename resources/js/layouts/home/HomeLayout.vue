<template>
    <div>
        <header-component>
            <nav-bar />
            <header-logo />
            <header-search />
        </header-component>

        <content-component>
            <section-header>
                featured
            </section-header>
            <featured-posts :posts="data.featured_posts" />
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
