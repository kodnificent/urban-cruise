<template>
    <div>
        <header-component>
            <nav-bar />
            <header-logo />
            <header-search />
        </header-component>
    </div>
</template>
<script>
import { layout } from "../../mixins/layout";
export default {
    mixins: [layout],

    data(){
        return {
            //
        }
    },

    mounted()
    {
        //
    }
}
</script>
