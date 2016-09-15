<template>
    <div :items="items">
        <div>
            <a type="button"
               class="btn btn-default pull-right add-application-button"
               aria-label="Left Align"
               href="/applications/create">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    Add Application
            </a>
        </div>
        <table class="table">
            <caption>Applications</caption>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>Name</strong></th>
                <th><strong>Key</strong></th>
                <th></th>
            </tr>
            <tr v-for="app in items">
                <td>{{ app.id }}</td>
                <td>{{ app.name }}</td>
                <td>{{ app.key }}</td>
                <td>
                    <a href="/applications/{{ app.id }}"
                       type="button"
                       class="btn btn-default"
                       data-toggle="tooltip"
                       data-placement="top"
                       title="Show Application">
                        <span class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></span>
                    </a>

                    <a href="/applications/{{ app.id }}/edit"
                       type="button"
                       class="btn btn-default"
                       data-toggle="tooltip"
                       data-placement="top"
                       title="Edit Application">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>

                    <button type="submit"
                            class="btn btn-default"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Delete Application"
                            @click="deleteClicked(app)">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </td>
            </tr>
        </table>

        <modal :show.sync="showModalSuccess">
            <div slot="header"></div>
            <div slot="body">
                Application successfully deleted!
            </div>
        </modal>

        <modal :show.sync="showModalFail">
            <div slot="header"></div>
            <div slot="body">
                Error Deleting Application!
            </div>
        </modal>

        <modal :show.sync="showDialog" :eventname="'delete-application'" :type="'dialog'">
            <div slot="header"></div>
            <div slot="body">
                Delete "{{ currentApp.name }}" Application?
            </div>
        </modal>
    </div>
</template>

<script>
    import Modal from './ModalWindow.vue';

    export default {
        components: { Modal },
        props: ['items'],
        data() {
            return {
                showModalSuccess: false,
                showModalFail: false,
                showDialog: false,
                currentApp: 0
            };
        },
        methods: {
            deleteClicked(app) {
                this.showDialog = true;
                this.currentApp = app;
            }
        },
        events: {
            'dialog-ok-pressed-delete-application': function() {
                this.$http.delete('/applications/' + this.currentApp.id).then((response) => {
                    this.items.$remove(this.currentApp);
                    this.showModalSuccess = true;
                }, (response) => {
                    this.showModalFail = true;
                });
            }
        }
    };
</script>

<style lang="stylus" rel="stylesheet/stylus">
    .add-application-button
        margin-top: 10px;
        margin-right: 20px;
</style>
