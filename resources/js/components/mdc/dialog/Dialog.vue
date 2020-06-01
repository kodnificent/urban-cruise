<template>
    <div class="mdc-dialog"
        role="alertdialog"
        aria-modal="true"
        aria-labelledby="dialog-title"
        aria-describedby="dialog-content">

        <div class="mdc-dialog__container">
            <div class="mdc-dialog__surface">
                <slot></slot>
            </div>
        </div>
        <div class="mdc-dialog__scrim"></div>
    </div>
</template>

<script>
import { MDCDialog } from "@material/dialog";
export default {

    data: function(){
        return {
            dialog: null
        }
    },
    mounted: function(){
        this.dialog = new MDCDialog(this.$el);
    }
}
</script>

<style lang="sass" scoped>
    .mdc-dialog
        z-index: 1050

</style>
