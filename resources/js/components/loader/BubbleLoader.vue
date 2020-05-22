<template>
    <div class="bubble-loader" aria-hidden="true">
        <span class="bubble bubble-1"></span>
        <span class="bubble bubble-2"></span>
        <span class="bubble bubble-3"></span>
    </div>
</template>

<style lang="sass">
    .bubble-loader
        @apply flex

        &--dark
            .bubble
                background: #222222

        .bubble
            width: 16px
            height: 16px
            @apply rounded-full
            animation: pulse 1.1s infinite ease-in-out
            animation-fill-mode: both

            &:not(:first-child)
                @apply ml-1

            @keyframes pulse
                0%, 80%, 100%
                    transform: scale(0.6)
                    opacity: 0.2
                40%
                    transform: scale(1.0)
                    opacity:1


        .bubble-1
            animation-delay: 0s
        .bubble-2
            animation-delay: 0.15s
        .bubble-3
            animation-delay: 0.3s
</style>
