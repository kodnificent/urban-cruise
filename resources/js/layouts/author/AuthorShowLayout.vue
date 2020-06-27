<template>
    <div>
        <header-component>
            <nav-bar :with-back-btn="true" />

            <div v-if="$root.isMobile" class="order-2 md:hidden truncate" aria-live="polite">
                <span class="block uppercase text-base font-bold">
                    Author's Profile
                </span>
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
                    <div class="flex flex-row mb-6">
                        <div class="mr-3 w-24" v-if="res.data.profile.photo_thumbnail">
                            <img class="rounded-full h-24 w-24 block" :src="res.data.profile.photo_thumbnail" :alt="res.data.name" />
                        </div>
                        <div style="width: calc(100% - 6rem);">
                            <h1 class="font-semibold">{{ res.data.name }}</h1>

                            <span class="block text-gray-600 mb-2 text-sm">
                                <span v-if="res.data.profile.job_title">{{ res.data.profile.job_title }}</span><span v-if="res.data.profile.job_title && res.data.profile.company">, {{ res.data.profile.company }}</span>
                            </span>

                            <ul v-if="authorSocialLinks.length > 0" class="flex flex-wrap" aria-label="social links">
                                <li class="pr-2" v-for="(link, index) in authorSocialLinks" :key="index">
                                    <a rel="nofollow" target="__blank" class="rounded-full w-6 h-6 flex justify-center"
                                        :style="{
                                            background: link.bg
                                        }"
                                        :href="link.url">
                                        <span class="sr-only">{{ link.title }}</span>

                                        <feather-icon class="flex items-center" :fill="link.color" stroke-width="0" :icon="link.icon" size="sm" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <section class="mb-6" v-if="res.data.profile.about">
                        <div class="mb-3">
                            <section-header>about</section-header>
                        </div>

                        <p>{{ res.data.profile.about }}</p>
                    </section>

                    <section>
                        <div class="mb-6">
                            <section-header>articles</section-header>
                        </div>

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
                            <span class="italic text-gray-600">This author has not published any posts yet</span>
                        </div>
                    </section>

                    <template v-slot:sidebar>
                        <sidebar v-if="! $root.isMobile" />
                        <span v-else></span>
                    </template>
                </main-layout>
            </template>
        </content-component>
    </div>
</template>

<script>
import { layout } from "../../mixins/layout/layout";
import { posts } from '../../mixins/post/posts';

export default {
    mixins: [layout, posts],

    data(){
        return {

        }
    },

    computed: {
        authorSocialLinks()
        {
            let links = [];

            if (this.res.data.profile){
                if (this.res.data.profile.facebook) {
                    let facebook = {};
                    facebook.title = 'facebook';
                    facebook.icon = 'facebook';
                    facebook.url = this.res.data.profile.facebook;
                    facebook.bg = '#3b5998';
                    facebook.color = '#ffffff';
                    links.push(facebook);
                }

                if (this.res.data.profile.twitter) {
                    let twitter = {};
                    twitter.title = 'twitter';
                    twitter.icon = 'twitter';
                    twitter.url = this.res.data.profile.twitter;
                    twitter.bg = '#1da1f2';
                    twitter.color = '#ffffff';
                    links.push(twitter);
                }

                if (this.res.data.profile.linkedin) {
                    let linkedin = {};
                    linkedin.title = 'linkedin';
                    linkedin.icon = 'linkedin';
                    linkedin.url = this.res.data.profile.linkedin;
                    linkedin.bg = '#0077b5';
                    linkedin.color = '#ffffff';
                    links.push(linkedin);
                }
            }

            return links;
        }
    },

    mounted()
    {
        this.fetchInitialPosts(this.res.endpoints.author_posts);
    }
}
</script>
