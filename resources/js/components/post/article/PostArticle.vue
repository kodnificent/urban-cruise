<template>
    <article v-once>
        <h1 class="mb-3">
            {{ post.title }}
        </h1>

        <div class="flex mb-6 items-center">
            <a v-if="post.creator" :href="post.creator.url">
                <img v-if="post.creator.profile.photo_thumbnail" :src="post.creator.profile.photo_thumbnail" class="w-6 h-6 rounded-full mr-2" />
            </a>

            <a v-if="post.creator" :href="post.creator.url" class="text-sm font-semibold mr-2 post-nav__link">{{ post.creator.name }}</a>

            <span class="text-gray-600 text-sm">
                {{ post.created_at_for_humans }}
            </span>
        </div>

        <p class="italic text-gray-600 mb-6" v-if="post.summary" v-text="post.summary"></p>

        <div class="md:flex">
            <div class="w-auto md:pr-2">

                <!-- POST IMAGE -->
                <div
                    style="max-height: 350px;"
                    class="mb-6 overflow-hidden flex justify-center"
                    v-if="post.image_url">
                    <img :src="post.image_url" />
                </div>

                <!-- POST CONTENT -->
                <div class="mb-6 article__content" v-html="post.content">
                </div>
            </div>

            <!-- Share Button here -->
            <div class="mb-6 md:w-12">
                <div class="sticks-to-top">
                    <post-share-icons :post="post" />
                </div>
            </div>
        </div>

        <!-- NEXT AND PREV POSTS -->
        <div class="flex mb-6">
            <div class="w-1/2 text-left pr-2">
                <div class="post-nav" v-if="prev_post">
                    <span class="post-nav__header">Previous</span>

                    <h2 class="post-nav__title">
                        <a :href="prev_post.url" class="post-nav__link">
                            {{ prev_post.truncated_title_md }}
                        </a>
                    </h2>
                </div>
            </div>

            <div class="w-1/2 text-right pl-2">
                <div class="post-nav" v-if="next_post">
                    <span class="post-nav__header">Next</span>

                    <h2 class="post-nav__title">
                        <a :href="next_post.url" class="post-nav__link">
                            {{ next_post.truncated_title_md }}
                        </a>
                    </h2>
                </div>
            </div>
        </div>

        <!-- POST AUTHOR -->
        <div
            v-if="post.creator"
            class="shadow flex flex-col md:flex-row items-center
                md:items-start py-8 px-4 w-auto mx-auto
                xl:w-3/4">
            <h2 class="sr-only">Author</h2>

            <div class="mb-3 md:mb-0 md:pr-6" v-if="post.creator.profile.photo_thumbnail">
                <a class="block text-gray-800 hover:text-primary" :href="post.creator.url">
                    <img
                        v-lazy="post.creator.profile.photo_thumbnail"
                        :alt="post.creator.name"
                        class="rounded-full h-24 w-24 shadow-md" />
                </a>
            </div>

            <div class="flex flex-col items-center md:items-start md:w-2/3">
                <h3 class="text-xl font-semibold text-center md:text-left mb-2">
                    <a class="block text-gray-800 hover:text-primary" :href="post.creator.url">
                        <span class="block">{{ post.creator.name }}</span>

                        <span class="block text-gray-600 mt-1 text-sm">
                            <span v-if="post.creator.profile.job_title">{{ post.creator.profile.job_title }}</span><span v-if="post.creator.profile.job_title && post.creator.profile.company">, {{ post.creator.profile.company }}</span>
                        </span>
                    </a>
                </h3>

                <ul v-if="authorSocialLinks.length > 0" class="mb-4 flex flex-wrap justify-center" aria-label="social links">
                    <li class="pr-2" v-for="(link, index) in authorSocialLinks" :key="index">
                        <a rel="nofollow" target="__blank" class="rounded-full w-6 h-6 flex justify-center block"
                            :style="{
                                background: link.bg
                            }"
                            :href="link.url">
                            <span class="sr-only">{{ link.title }}</span>

                            <feather-icon class="flex items-center" :fill="link.color" stroke-width="0" :icon="link.icon" size="sm" />
                        </a>
                    </li>
                </ul>

                <p v-if="post.creator.profile.about" class="text-center md:text-left" v-text="post.creator.profile.about"></p>
            </div>
        </div>
    </article>
</template>

<script>
export default {
    props: {
        post: {
            required: true,
            type: Object,
        },

        prev_post: {
            required: false,
            type: Object,
        },

        next_post: {
            required: false,
            type: Object
        }
    },

    computed: {
        authorSocialLinks()
        {
            let links = [];

            if (this.post.creator.profile){
                if (this.post.creator.profile.facebook) {
                    let facebook = {};
                    facebook.title = 'facebook';
                    facebook.icon = 'facebook';
                    facebook.url = this.post.creator.profile.facebook;
                    facebook.bg = '#3b5998';
                    facebook.color = '#ffffff';
                    links.push(facebook);
                }

                if (this.post.creator.profile.twitter) {
                    let twitter = {};
                    twitter.title = 'twitter';
                    twitter.icon = 'twitter';
                    twitter.url = this.post.creator.profile.twitter;
                    twitter.bg = '#1da1f2';
                    twitter.color = '#ffffff';
                    links.push(twitter);
                }

                if (this.post.creator.profile.linkedin) {
                    let linkedin = {};
                    linkedin.title = 'linkedin';
                    linkedin.icon = 'linkedin';
                    linkedin.url = this.post.creator.profile.linkedin;
                    linkedin.bg = '#0077b5';
                    linkedin.color = '#ffffff';
                    links.push(linkedin);
                }
            }

            return links;
        }
    }
}
</script>

<style lang="sass">
    .article__content
        h1, h2, h3, h4, h5, h6
            @apply mb-2
        p
            @apply mb-4
    .post-nav
        @apply px-2 py-1
        &__header
            @apply uppercase text-sm font-semibold text-primary

        &__title
            @apply text-base font-semibold

        &__link
            @apply text-gray-800
</style>
