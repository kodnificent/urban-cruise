<template>
    <div>
        <header-component>
            <nav-bar :with-back-btn="true" />

            <header-logo class="hidden md:block" />

            <div class="order-2 md:hidden" aria-live="polite">
                <template v-if="res">
                    <span class="block text-gray-500 text-xs">Published in</span>

                    <span class="block uppercase text-sm truncate">
                        <a :href="res.data.category.parent.url" class="font-semibold text-gray-100">
                            {{ res.data.category.parent.title }}
                        </a>

                        <feather-icon style="top: -2px;" class="relative" icon="chevron-right" size="sm" />

                        <a :href="res.data.category.url" class="text-gray-400">
                            {{ res.data.category.title}}
                        </a>
                    </span>
                </template>
            </div>

            <div class="order-3 flex-grow"></div>

            <div class="order-3 flex">
                <mobile-share-button v-if="res.data" :data="{
                    title: res.data.title,
                    url: res.data.url
                }" />

                <mobile-secondary-menu />
            </div>
        </header-component>

        <content-component>
            <div v-if="base_fetching">
                fetching
            </div>

            <template v-else>
                <main-layout>
                    <post-article v-bind="{
                        post: res.data,
                        prev_post: res.prev_post,
                        next_post: res.next_post
                    }" />

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
