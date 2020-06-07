<template>
    <div>
        <h2 class="text-sm uppercase mb-6 text-primary font-bold">Articles</h2>

        <ul aria-live="polite">
            <li class="mb-6" v-for="post in result" :key="post.id">
                <div>
                    <post-header>
                        <post-header-link :href="post.url">{{ post.title }}</post-header-link>
                    </post-header>

                    <div class="mt-4" v-html="post.truncated_summary"></div>

                    <read-more class="block" :href="post.url" />
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        result: {
            required: true,
            type: Array,
        }
    }
}
</script>
