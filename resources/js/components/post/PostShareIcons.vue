<template>
    <ul class="flex md:flex-col items-center justify-center" aria-label="social share">
        <li aria-hidden="true" class="mb-0 mr-2 md:mb-2 md:mr-0">
            <div class="rounded-full w-8 h-8 text-gray-600">
                <feather-icon icon="share-2" />
            </div>
        </li>

        <li class="mb-0 mr-2 md:mb-2 md:mr-0" v-for="(icon, index) in icons" :key="index">
            <a
                :title="icon.title"
                class="rounded-full w-8 h-8 flex justify-center"
                :href="icon.link(post, $root.isMobile)"
                target="__blank"
                rel="nofollow"
                :style="{
                    background: icon.bg,
                }">
                <span class="sr-only">{{ icon.title }}</span>

                <div class="relative flex items-center" v-if="icon.icon === 'whatsapp'">
                    <feather-icon class="flex items-center"
                        :stroke="icon.color" icon="message-circle" />

                    <feather-icon class="absolute" style="top: 2px; left: 6px;"
                        :fill="icon.color" stroke="0" icon="phone" size="xs" />
                </div>

                <feather-icon v-else class="flex items-center" :fill="icon.color" stroke-width="0" :icon="icon.icon" size="md" />
            </a>
        </li>
    </ul>
</template>

<script>
export default {
    props: {
        post: {
            required: true,
            type: Object,
        }
    },

    data(){
        return {
            icons: [
                {
                    link: function (post) {
                        return `https://www.facebook.com/sharer/sharer.php?u=${post.url}`;
                    },
                    icon: 'facebook',
                    title: 'share on facebook',
                    bg: '#3b5998',
                    color: '#ffffff',
                },
                {
                    link: function (post) {
                        let text =  post.title + '\n\n' + post.url;
                        return `https://twitter.com/intent/tweet?text=${encodeURI(text)}`;
                    },
                    icon: 'twitter',
                    title: 'tweet',
                    bg: '#1da1f2',
                    color: '#ffffff',
                },
                {
                    link: function (post, isMobile) {
                        let text = post.title + '\n\n' + post.url;
                        let link = isMobile
                                    ? `https://wa.me/?text=${encodeURI(text)}`
                                    : `https://api.whatsapp.com/?text=${encodeURI(text)}`;

                        return link;
                    },
                    icon: 'whatsapp',
                    title: 'share on whatsapp',
                    bg: '#25d366',
                    color: '#ffffff',
                },
                {
                    link: function (post) {
                        let text = post.title + '\n\n' + post.url;
                        return `https://www.linkedin.com/shareArticle?mini=true&url=${post.url}&title=${encodeURI(post.tile)}&summary=${encodeURI(post.summary)}`;
                    },
                    icon: 'linkedin',
                    title: 'share on linkedin',
                    bg: '#0077b5',
                    color: '#ffffff',
                },
            ],
        }
    }
}
</script>
