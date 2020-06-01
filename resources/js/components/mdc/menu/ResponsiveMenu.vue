<template>
    <div class="mdc-menu-surface--anchor">
        <slot name="visible_items" :items="visible_items"></slot>

        <button
            v-if="hidden_items.length > 0"
            type="button"
            @click.prevent.stop="toggleMenu"
            :aria-expanded="expanded ? 'true' : 'false'"
            class="p-1 hover:text-primary text-gray-600 hover:bg-primary-lighter rounded-full inline-block">
            <feather-icon icon="more-vertical" />
            <span class="sr-only">show / hide menu</span>
        </button>

        <div ref="menu" class="mdc-menu mdc-menu-surface">
            <ul class="mdc-list px-2 py-3" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">

                <slot name="hidden_items" v-bind:items="hidden_items"></slot>
            </ul>
        </div>
    </div>
</template>

<script>
import { MDCMenu } from '@material/menu';
export default {

    props: {
        items: {
            required: true,
            type: Array,
        },

        max_mobile: {
            required: false,
            default: 0,
            type: Number
        },

        max_tablet: {
            required: false,
            default: null,
            type: Number
        },

        max_desktop: {
            required: false,
            default: null,
            type: Number
        }
    },

    data: function(){
        return {
            menu: null,
            expanded: false,
            hidden_items: this.getHiddenItems(),
            visible_items: this.getVisibileItems(),
        }
    },

    methods: {

        /**
         * toggle open and close
         *
         * @return void
         */
        toggleMenu()
        {
            if(this.menu.open)
            {
                this.expanded = false;
                this.menu.open = false;
            } else {
                this.expanded = true;
                this.menu.open = true;
            }
        },

        getItemVisiblity(item, index)
        {
            // an item will only be visible on a certain device
            // if its position does not exceed the max number of items
            // to show on a device.
            // If it does exist, it will be hidden in the menu
            let itemPos = index + 1;
            let max_on_mobile = this.max_mobile;
            let max_on_tablet = this.max_tablet !== null ? this.max_tablet : this.max_mobile;
            let max_on_desktop = this.max_desktop !== null ? this.max_desktop : max_on_tablet;

            if(this.$root.isMobile)
            {
                return itemPos <= max_on_mobile;
            }

            if(this.$root.isTabletOnly)
            {
                return itemPos <= max_on_tablet;
            }

            if(this.$root.isDesktop)
            {
                return itemPos <= max_on_desktop;
            }

            return false;
        },

        getVisibileItems()
        {
            return this.items.filter(item=>{
                return item.is_visible === true;
            });
        },

        getHiddenItems()
        {
            return this.items.filter(item=>{
                return item.is_visible === false;
            });
        }
    },

    computed: {
        //
    },

    created()
    {
        this.items.forEach((item, index)=>{

            let visibility = this.getItemVisiblity(item, index);

            Vue.set(item, 'is_visible', visibility);

            this.$root.$watch('device_width', ()=>{
                let visibility = this.getItemVisiblity(item, index);

                item.is_visible = visibility;

                this.visible_items = this.getVisibileItems();
                this.hidden_items = this.getHiddenItems();
            });
        });

        this.visible_items = this.getVisibileItems();
        this.hidden_items = this.getHiddenItems();
    },

    mounted: function(){
        this.menu = new MDCMenu(this.$refs['menu']);
    }
}
</script>
