<template>
    <div style="position:relative" v-bind:class="{ 'open': open }">
        <label>Buscar Alumno</label>
        <input class="form-control" type="text" placeholder="Buscar alumno" v-model="filterInput"
            @keydown.enter.prevent="enter"
            @keydown.down="down"
            @keydown.up="up"
        >
        <input type="hidden" name="student_id" v-model="value">
        <ul class="dropdown-menu" style="width:100%">
            <li v-for="(suggestion, index) in suggestions"
                v-bind:class="{'active': isActive(index)}"
                @click="suggestionClick(index)"
            >
              <a href="#">{{ suggestion.firstname }} <small>{{ suggestion.lastname }}</small>
              </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: [
            'entity',
        ],
        data(){
            return {
                loading: true,
                open: false,
                current: 0,
                suggestions: [],
                filterInput: '',
                value: '',
            }
        },
        methods: {
            getData() {
                let filter = this.filterInput.toLowerCase()

                axios.get(`/api/v1/${this.entity}`, { params: { filter } })
                    .then((response) => {
                        this.loading = false
                        this.suggestions = response.data
                        if (this.suggestions.length > 0) {
                            this.open = true
                        } else {
                            this.open = false
                        }
                    })
            },
            filterData: _.debounce(
                function() {
                    if (this.filterInput.length > 1) {
                        this.getData()
                    }
                },
                500
            ),
            enter () {
                let elem = this.suggestions[this.current]
                this.filterInput = `${elem.firstname} ${elem.lastname}`
                this.value = elem.id
                this.open = false
            },
            up () {
                if (this.current > 0) {
                  this.current--
                }
            },
            down () {
                if (this.current < this.suggestions.length - 1) {
                  this.current++
                }
            },
            isActive (index) {
            return index === this.current
            },
            suggestionClick (index) {
                let elem = this.suggestions[index]
                this.filterInput = `${elem.firstname} ${elem.lastname}`
                this.value = elem.id
                this.open = false
            },
        },
        watch: {
            filterInput: function() {
                this.filterData()
            }
        }
    }
</script>
