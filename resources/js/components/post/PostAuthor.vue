<template>
    <div class="flex flex-wrap items-center">
        <a :href="post.creator.url" class="text-sm font-semibold mr-2 text-gray-800">{{ post.creator.name }}</a>

        <span class="text-gray-600 text-sm">
            {{ post.created_at_for_humans }}
        </span>
    </div>
</template>

<script>
export default {
    props: {
        post: {
            required: true,
            type: Object,
        }
    }
}
</script>
