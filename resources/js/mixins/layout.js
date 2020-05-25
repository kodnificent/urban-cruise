export const layout = {
    props: {
        res: {
            required: false,
            type: Object,
        }
    },

    data(){
        return {
            meta: this.res.meta,
            data: this.res.data,
            endpoints: this.res.endpoints,
            fetching: false
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
            this.fetching = true;

            axios.get(this.res.endpoints.base, {
                'Accept': 'application/json'
            }).then(res=>{
                this.meta = res.data.meta;

                this.data = res.data.data;

                this.endpoints = res.data.endpoints;
            }).catch(err =>{
                //
            }).then(() => this.fetching = false);
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
        meta()
        {
            this.assignMeta();
        }
    },

    beforeMount(){
        //console.log(this.meta);
        if (this.res.is_skeleton) {
            this.fetchBase();
        }
    }
}
