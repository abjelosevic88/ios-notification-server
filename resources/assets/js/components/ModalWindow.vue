<template>
    <div class="modal-mask" v-show="show" transition="modal">
        <div class="modal-wrapper">
            <div class="modal-container">

                <div class="modal-header">
                    <slot name="header"></slot>
                </div>

                <div class="modal-body">
                    <slot name="body"></slot>
                </div>

                <div class="modal-footer">
                    <slot name="footer">
                        <div class="footer-buttons">
                            <button class="btn btn-default" @click="okPressed()">
                                OK
                            </button>
                            <button v-show="type == 'dialog'"
                                    class="btn btn-default footer-cancel-btn"
                                    @click="cancelPressed()">
                                Cancel
                            </button>
                        </div>
                    </slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            show: {
                type: Boolean,
                required: true,
                twoWay: true
            },
            eventname: {
                type: String,
            },
            type: { // modal, dialog
                type: String,
                default: 'modal'
            }
        },
        data() {
            return {
            };
        },
        methods: {
            okPressed() {
                this.show = false
                if (this.eventname !== undefined) {
                    this.$dispatch('dialog-ok-pressed-' + this.eventname);
                }
            },
            cancelPressed() {
                this.show = false
                if (this.eventname !== undefined) {
                    this.$dispatch('dialog-cancel-pressed-' + this.eventname);
                }
            }
        }
    };
</script>

<style>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 300px;
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }

    .modal-body {
        margin: 20px 0;
    }

    .footer-buttons {
        float: right;
    }

    .footer-cancel-btn {
        margin-left: 15px;
    }

    .modal-enter, .modal-leave {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>