<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editing <em>{{ title }}</em></div>

                    <div class="panel-body">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label for="title" class="control-label">Title</label>
                                <input type="text" id="title" class="form-control" v-model="title">
                            </div>

                            <draggable :list="parts" :options="{'handle': '.panel-heading'}" @start="drag=true" @end="drag=false" @change="update">
                                <div class="panel panel-default" v-for="part, index in parts">
                                    <div class="panel-heading">Part {{ index + 1 }} ({{ part.sort_order }})</div>

                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label>Part title</label>
                                            <input type="text" class="form-control" v-model="parts[index].title">
                                        </div>
                                    </div>
                                </div>
                            </draggable>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        components: {draggable},
        data() {
            return {
                title: this.data.title,
                parts: this.data.parts
            }
        },
        methods: {
            submit() {
                console.log('submit')
            },
            update() {
                this.parts.map((part, index) => part.sort_order = index + 1)
            }
        },
        props: {
            data: {
                type: Object,
                default: {}
            }
        }
    }
</script>
