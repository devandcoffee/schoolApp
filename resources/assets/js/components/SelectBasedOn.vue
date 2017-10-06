<template>
    <div>
        <div class="form-group">
            <label :for="config.field1.value" class="col-sm-2 control-label">{{config.field1.label}}</label>
            <div class="col-sm-6">
                <select name="config.field1.value" class="form-control">
                    <option v-for="option in config.field1.options" :value="option.id">
                        {{option.name}}
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="config.field2.value" class="col-sm-2 control-label">{{config.field2.label}}</label>
            <div class="col-sm-6">
                <select name="config.field2.value" class="form-control">
                    <option value="arg">Argentina</option>
                    <option value="bol">Bolivia</option>
                    <option value="per">Peru</option>
                    <option value="col">Colombia</option>
                    <option value="ven">Venezuela</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log(this.config)
        },
        props: [
            'config'
        ],
    }
</script>
