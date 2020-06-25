<template>
    <div class="mdc-menu-surface--anchor">
        <button
            @click.prevent.stop="toggleMenu"
            v-if="$root.isMobile"
            aria-expanded="false"
            class="p-1 rounded-full focus:shadow-outline focus:outline-none">
            <feather-icon icon="more-vertical" />

            <span class="sr-only">toggle menu</span>
        </button>

        <MDC-menu ref="menu">
            <MDC-menu-item>
                <MDC-menu-link href="/">
                    <MDC-menu-text>
                        Home
                    </MDC-menu-text>
                </MDC-menu-link>
            </MDC-menu-item>

            <MDC-menu-item>
                <MDC-menu-link href="">
                    <MDC-menu-text>
                        Reload
                    </MDC-menu-text>
                </MDC-menu-link>
            </MDC-menu-item>
        </MDC-menu>
    </div>
</template>

<script>
export default {
    methods: {
        toggleMenu(e)
        {
            this.$refs['menu'].toggleMenu(e);
        }
    },
}
</script>
