import debounce from "lodash.debounce";

export const search = {
    data(){
        return {
            query: '',
            result: [],
            no_result_found: false,
            searching: false,
            has_searched: false,
        }
    },

    watch: {
        query(query)
        {
            if( query === '') return;

            this.has_searched = true;

            this.debouncedSearch();
        }
    },

    methods: {
        search()
        {
            this.no_result_found = false;
            this.searching = true;

            return axios.get('/posts/search', {
                params: {
                    q: this.query
                }
            }).then( res=> {
                this.result = res.data;

                if (this.result.length === 0) {
                    this.no_result_found = true;
                }
            }).catch( error => {
                //
            }).then( ()=>{
                this.searching = false;
            });
        }
    },

    created(){
        this.debouncedSearch = debounce(this.search, 500);
    }
}
