<template>
    <div>
        <header-component>
            <nav-bar :with-back-btn="true" />

            <header-logo :text="res.data.title" />

            <header-search />
        </header-component>

        <content-component>
            <div v-if="base_fetching">
                fetching
            </div>

            <template v-else>
                <main-layout>
                    <ul class="flex flex-wrap" v-if="res.data.children.length > 0">
                        <li class="mr-2 mb-4" v-for="child in res.data.children" :key="child.id">
                            <a
                                :href="child.url"
                                class="rounded-full px-3 py-1 text-gray-800
                                    bg-gray-200 font-semibold hover:text-primary hover:bg-primary-lighter">
                                {{ child.title }}
                            </a>
                        </li>
                    </ul>

                    <ul class="flex flex-wrap" v-else-if="res.data.parent">
                        <li class="mr-2 mb-4">
                            <a
                                :href="res.data.parent.url"
                                class="rounded-full px-3 py-1 text-gray-800
                                    bg-gray-200 font-semibold hover:text-primary hover:bg-primary-lighter">
                                {{ res.data.parent.title }}
                            </a>
                        </li>
                    </ul>

                    <category-section class="mt-2"
                        v-bind="{category: res.data, show_description: true, show_title: false }" />
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
