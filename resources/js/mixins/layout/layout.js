export const layout = {
    props: {
        server_res: {
            required: true,
            type: Object,
        }
    },

    data(){
        return {
            res: this.server_res,
            base_fetched: false,
            base_fetching: false,
            base_fetch_error: false
        }
    },

    methods: {

        /**
         * Fetch basic data for the layout
         *
         * @return {void}
         */
        fetchBase()
        {
            this.base_fetching = true;

            axios.get(this.res.endpoints.base).then(res=>{
                this.base_fetched = true;
                this.res = res.data;
            }).catch( err =>{
                this.base_fetch_error = true;
            }).then( () => {
                this.base_fetching = false;
            });
        },

        /**
         * Update the dom with meta information
         *
         * @return {void}
         */
        assignMeta()
        {
            //
        }
    },

    watch: {
        'res.meta'()
        {
            this.assignMeta();
        }
    },

    beforeMount(){
        // we need to assign global variables to the root
        this.$root.is_shell = this.res.is_shell;
        this.$root.primary_menu = this.res.primary_menu;
        this.$root.social_links = this.res.social_links;
        this.$root.categories = this.res.categories;
        this.$root.endpoints = this.res.endpoints;

        if (this.res.is_shell) {
            this.fetchBase();
        } else {
            this.base_fetched = true;
        }
    }
}
