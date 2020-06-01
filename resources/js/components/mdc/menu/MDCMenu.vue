<template>
    <div class="mdc-menu mdc-menu-surface px-2 py-3">
        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
            <slot></slot>
        </ul>
    </div>
</template>

<script>
import { MDCMenu } from '@material/menu';
export default {

    data: function(){
        return {
            menu: null
        }
    },

    methods: {

        /**
         * toggle open and close
         *
         * @return void
         */
        toggleMenu(e)
        {
            if(this.menu.open)
            {
                e.srcElement.setAttribute('aria-expanded', false);
                this.menu.open = false;
            } else {
                e.srcElement.setAttribute('aria-expanded', true);
                this.menu.open = true;
            }
        }
    },

    mounted: function(){
        this.menu = new MDCMenu(this.$el);
    }
}
</script>
