<template>
    <header :data-is-mobile="this.isMobile ? 'true' : 'false'">
        <slot></slot>
    </header>
</template>

<script>
import { ViewPort } from "../utils/ViewPort";
export default {
    data(){
        return {
            viewport: new ViewPort()
        }
    },
    computed: {
        isMobile()
        {
            return this.viewport.isMobile();
        }
    }
}
</script>
