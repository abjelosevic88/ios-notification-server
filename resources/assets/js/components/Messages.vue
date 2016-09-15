<template>
    <div :items="items" :appid="appid">
        <div>
            <a type="button"
               class="btn btn-default pull-right add-application-button"
               aria-label="Left Align"
               href="/messages/create?application_id={{ appid }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    Add Message
            </a>
        </div>
        <table class="table">
            <caption>Messages</caption>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>Title</strong></th>
                <th><strong>Publish date</strong></th>
                <th></th>
            </tr>
            <tr v-for="message in items">
                <td>{{ message.id }}</td>
                <td>{{ message.title }}</td>
                <td>{{ message.publish_date }}</td>
                <td>
                    <div class="pull-right message-icons">
                        <a href="/messages/{{ message.id }}"
                           type="button"
                           class="btn btn-default"
                           data-toggle="tooltip"
                           data-placement="top"
                           title="Show Message">
                            <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                        </a>

                        <a href="/messages/{{ message.id }}/edit?application_id={{ appid }}"
                           type="button"
                           class="btn btn-default"
                           data-toggle="tooltip"
                           data-placement="top"
                           title="Edit Message">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>

                        <button type="submit"
                                class="btn btn-default"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Delete Message"
                                @click="deleteClicked(message)">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                    </div>
                </td>
            </tr>
        </table>

        <modal :show.sync="showModalSuccess">
            <div slot="header"></div>
            <div slot="body">
                Message successfully deleted!
            </div>
        </modal>

        <modal :show.sync="showModalFail">
            <div slot="header"></div>
            <div slot="body">
                Error Deleting Message!
            </div>
        </modal>

        <modal :show.sync="showDialog" :eventname="'delete-messages'" :type="'dialog'">
            <div slot="header"></div>
            <div slot="body">
                Delete "{{ currentMessage.title }}" Message?
            </div>
        </modal>
    </div>
</template>

<script>
    import Modal from './ModalWindow.vue';

    export default {
        components: { Modal },
        props: ['items', 'appid'],
        data() {
            return {
                showModalSuccess: false,
                showModalFail: false,
                showDialog: false,
                currentMessage: 0,
            };
        },
        methods: {
            deleteClicked(message) {
                this.showDialog = true;
                this.currentMessage = message;
            },
            addMessage() {
                this.$http.get('/messages/' + this.currentMessage.id).then((response) => {
                    this.items.$remove(this.currentMessage);
                    this.showModalSuccess = true;
                }, (response) => {
                    this.showModalFail = true;
                });
                alert(this.appid);
            }
        },
        events: {
            'dialog-ok-pressed-delete-messages': function() {
                this.$http.delete('/messages/' + this.currentMessage.id).then((response) => {
                    this.items.$remove(this.currentMessage);
                    this.showModalSuccess = true;
                }, (response) => {
                    this.showModalFail = true;
                });
            }
        }
    };
</script>

<style lang="stylus" rel="stylesheet/stylus">
    .add-message-button
        margin-top: 10px;
        margin-right: 20px;
    .message-icons
        margin-right: 10px;
</style>
