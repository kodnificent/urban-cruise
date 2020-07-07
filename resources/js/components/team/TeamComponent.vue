<template>
    <ul class="team">
        <li class="team__wrapper" v-for="user in team" :key="user.id">
            <a class="block" :href="user.url">
                <img
                    v-if="user.profile.photo_thumbnail"
                    class="rounded-full h-24 w-24 block team__image"
                    :src="user.profile.photo_thumbnail"
                    :alt="user.name" />
            </a>

            <p class="font-semibold text-center mb-0 mt-2">
                <a class="text-gray-800" :href="user.url">{{ user.name }}</a>
            </p>

            <p class="text-center text-primary text-sm">
                <a :href="user.url">
                    <span v-if="user.profile.job_title">{{ user.profile.job_title }}</span>
                    <span v-if="user.profile.job_title && user.profile.company">, {{ user.profile.company }}</span>
                </a>
            </p>
        </li>
    </ul>
</template>

<script>
export default {
    props: {
        team: {
            required: true,
            type: Array
        }
    }
}
</script>

<style lang="sass">
    .team
        @apply flex flex-wrap
        &__wrapper
            @apply flex items-center flex-col w-1/2 mb-6
            @screen md
                @apply w-1/3
        &__image
            filter: grayscale(100%)
            transition: all ease-in 0.25s
            &:hover, &:focus, &:active
                filter: grayscale(0)
</style>
