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
                <main-layout>
                    <category-section
                        v-bind="{category: res.data, show_description: true }" />
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
