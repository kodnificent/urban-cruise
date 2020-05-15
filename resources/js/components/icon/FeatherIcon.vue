<template>

    <span
        aria-hidden="true"
        v-html="iconSvg">

    </span>

</template>

<script>

import * as feather from "feather-icons";

export default {

    props: {

        /**
         * The name of the icon to create
         */
        icon: {
            required: true,
            type: String
        },

        /**
         * Size of the icon
         */
        size: {
            default: '',
            type: String
        },

        /**
         * A string containing classes for styling the icon
         */
        iconClass: {
            default: '',
            type: String
        },

        xmlns: {
            default: null,
            type: String,
        },
        width: {
            default: null,
            type: String,
        },
        height: {
            default: null,
            type: String,
        },
        viewBox: {
            default: null,
            type: String,
        },
        fill: {
            default: null,
            type: String,
        },
        stroke: {
            default: null,
            type: String,
        },
        'stroke-width': {
            default: null,
            type: String,
        },
        'stroke-linecap': {
            default: null,
            type: String,
        },
        'stroke-linejoin': {
            default: null,
            type: String,
        },
    },

    data(){
        return {
            iconSvg: null,
        }
    },

    watch: {
        icon(){
            this.replace();
        }
    },

    methods: {

        /**
         * Replace the element with data-feather attribute with the icon svg
         */
        replace(){

            // we will replace all html elements with data-feather attribute with the svg html
            // and also add back the data-feather attribute to the svg so we can easily
            // replace the icon again when the icon name or attribute is changed

            let attrs = {};
            attrs.class = `${this.iconClass} inline ${this.size}`;
            this.width ? attrs.width = this.width : '';
            this.height ? attrs.height = this.height : '';
            this.viewBox ? attrs.viewBox = this.viewBox : '';
            this.fill ? attrs.fill = this.fill : '';
            this.strokeWidth ? attrs.strokeWidth = this.strokeWidth : '';
            this.strokeLinecap ? attrs.strokeLinecap = this.strokeLinecap : '';
            this.strokeLinejoin ? attrs.strokeLinejoin = this.strokeLinejoin : '';

            this.iconSvg = feather.icons[this.icon].toSvg(attrs);
        }
    },

    mounted: function(){
        try {
            this.replace();
        } catch (error) {
            console.error(error);
        }
    }
}
</script>

<style lang="sass">
    .feather
        &.xs
            height: 12px
            width: 12px

        &.sm
            height: 16px
            width: 16px

        &.md
            height: 20px
            width: 20px

        height: 24px
        width: 24px

        &.lg
            height: 32px
            width: 32px

        &.xl
            height: 40px
            width: 40px

        &.xxl
            height: 48px
            width: 48px

</style>
