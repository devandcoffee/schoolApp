<template>
    <div>
        <div class="form-group">
            <label :for="config.field1.value" class="col-sm-2 control-label">{{config.field1.label}}</label>
            <div class="col-sm-6">
                <select v-model="field1" :name="config.field1.value" class="form-control">
                    <option v-for="option in config.field1.options" :value="option.id">
                        {{option.name}}
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="config.field2.value" class="col-sm-2 control-label">{{config.field2.label}}</label>
            <div class="col-sm-6">
                <select :name="config.field2.value" class="form-control">
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
        },
        data() {
            return {
                field1: 56, // Set default Argentina
                options: []
            }
        },
        watch: {
            field1: function(newValue) {
                this.getData(newValue)
            }
        },
        methods: {
            getData(field1) {
                axios.get(`/api/v1/${this.config.field2.value}`, { params: { field1 } })
                    .then((response) => {
                        this.options = response.data
                    })
            }
        },
        props: [
            'config'
        ],
    }
</script>
