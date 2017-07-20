<template>
    <div>
        <form>
            <div class="form-group">
                <label>Search by all fields</label>
                <input class="form-control search-input" placeholder="Search..." v-model="filterInput">
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th v-for="key in columns">
                        {{ key | capitalize }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="elem in filteredData">
                    <td v-for="key in columns">
                        {{elem[key]}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getData()
        },
        props: [
            'dataType',
            'columns'
        ],
        data(){
            return {
                filteredData: [],
                loading: true,
                filterInput: ''
            }
        },
        methods: {
            getData() {
                let filter = this.filterInput.toLowerCase()
                axios.get(`/api/v1/${this.dataType}`, { params: { filter } })
                    .then((response) => {
                        this.filteredData = response.data
                        this.loading = false
                    })
            },
            filterData: _.debounce(
                function() {
                    this.getData()
                },
                500
            )
        },
        filters: {
            capitalize(str) {
              return str.charAt(0).toUpperCase() + str.slice(1)
            }
        },
        watch: {
            filterInput: function() {
                this.filterData()
            }
        }
    }
</script>

<style>
    .search-input {
        width: 50%;
    }
</style>
