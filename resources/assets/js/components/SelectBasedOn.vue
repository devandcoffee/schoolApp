<template>
    <div>
        <div class="form-group">
            <label :for="config.field1.name" class="col-sm-2 control-label">{{config.field1.label}}</label>
            <div class="col-sm-6">
                <select v-model="field1" :name="config.field1.name" class="form-control">
                    <option v-for="option in config.field1.options" :value="option.id">
                        {{option.name}}
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group" v-bind:class="{ 'hide-select': !isActive }">
            <label for="config.field2.name" class="col-sm-2 control-label">{{config.field2.label}}</label>
            <div class="col-sm-6">
                <select v-model="field2" :name="config.field2.name" class="form-control">
                    <option v-for="option in options" :value="option.id">
                        {{option.name}}
                    </option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getData(this.field1)
            this.field2 = this.config.field2.value
        },
        data() {
            return {
                field1: this.config.field1.value,
                field2: '',
                options: [],
                isActive: true,
            }
        },
        watch: {
            field1: function(newValue) {
                this.getData(newValue)
            }
        },
        methods: {
            getData(field1) {
                axios.get(`/api/v1/${this.config.field2.name}`, { params: { field1 } })
                    .then((response) => {
                        this.options = response.data
                        if (this.options.length > 0) {
                            this.isActive = true
                        } else {
                            this.isActive = false
                        }
                    })
            }
        },
        props: [
            'config'
        ],
    }
</script>


<style>
    .hide-select {
        display: none;
    }
</style>
