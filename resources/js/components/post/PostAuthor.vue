<template>
    <div>
        <span class="text-sm text-gray-700">
            {{ author }}
        </span>
    </div>
</template>

<script>
export default {
    props: {
        author: {
            required: true,
            type: String
        }
    }
}
</script>
