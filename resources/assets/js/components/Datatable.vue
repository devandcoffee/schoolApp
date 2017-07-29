<template>
    <div class="datatable">
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
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="elem in filteredData">
                    <td v-for="key in columns">
                        {{elem[key]}}
                    </td>
                    <td>
                        <a :href="`/${dataType}/${elem['id']}/edit`"><span class="fa-pencil"></span></a>
                    </td>
                    <td>
                        <a v-on:click.prevent="deleteRecord(elem['id'])"><span class="fa-trash-o"></span></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li v-bind:class="{disabled: currentPage === 1}">
                    <a v-on:click.prevent="changePage('previous')" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li v-for="n in lastPage" v-bind:class="{active: n === currentPage}"><a v-on:click.prevent="goPage(n)">{{n}}</a></li>
                <li v-bind:class="{disabled: currentPage === lastPage}">
                    <a v-on:click.prevent="changePage('next')" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
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
                filterInput: '',
                perPage: 10,
                currentPage: 1,
                lastPage: null
            }
        },
        methods: {
            getData() {
                let filter = this.filterInput.toLowerCase()
                let page = this.currentPage
                axios.get(`/api/v1/${this.dataType}`, { params: { filter, page } })
                    .then((response) => {
                        this.filteredData = response.data.data
                        this.lastPage = response.data.last_page
                        this.loading = false
                    })
            },
            filterData: _.debounce(
                function() {
                    this.currentPage = 1
                    this.getData()
                },
                500
            ),
            goPage(page) {
                this.currentPage = page
                this.getData()
            },
            changePage(option) {
                if (option === 'next' && this.currentPage < this.lastPage) {
                    this.currentPage++
                }
                if (option === 'previous' && this.currentPage > 1) {
                    this.currentPage--
                }
                this.goPage(this.currentPage)
            },
            deleteRecord(id) {
                swal({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then(() => {
                    let filter = this.filterInput.toLowerCase()
                    let page = this.currentPage
                    axios.delete(`/${this.dataType}/${id}`, { params: { filter, page } })
                        .then((response) => {
                            this.filteredData = response.data.data
                            this.lastPage = response.data.last_page
                        })
                })
            }
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

    .datatable a {
        cursor: pointer;
    }
</style>
