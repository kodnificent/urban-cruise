<template>
    <div>
        <header-component>
            <nav-bar :with-back-btn="true" />

            <div v-if="$root.isMobile" class="order-2 md:hidden truncate" aria-live="polite">
                <template v-if="res">
                    <span class="block uppercase text-base font-bold">
                        {{ res.data.title }}
                    </span>
                </template>
            </div>

            <header-logo v-else />

            <div class="order-3 flex-grow"></div>

            <div class="order-3">
                <mobile-secondary-menu />
            </div>
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

                    <template v-slot:sidebar>
                        <sidebar v-if="! $root.isMobile" />
                        <span v-else></span>
                    </template>
                </main-layout>
            </template>
        </content-component>

        <footer-component v-if="! $root.isMobile" />
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
