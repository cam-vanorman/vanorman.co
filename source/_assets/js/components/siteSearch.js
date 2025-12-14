export default function siteSearch() {
    return {
        lunr: null,
        searching: false,
        query: '',

        results() {
            return this.query ? this.lunr.search(this.query) : [];
        },
        showInput() {
            this.searching = true;
            this.$nextTick(() => {
                this.$refs.search.focus();
            });
        },
        reset() {
            this.query = '';
            this.searching = false;
        },
        init() {

        }
    }
};