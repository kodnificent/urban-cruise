<template>
    <div class="mdc-snackbar z-50">
        <div class="mdc-snackbar__surface">
            <div class="mdc-snackbar__label"
                role="status"
                aria-live="polite">

            </div>
            <div class="mdc-snackbar__actions">
                <button type="button" class="mdc-button mdc-snackbar__action"></button>
            </div>
        </div>
    </div>
</template>

<script>
import {MDCSnackbar} from '@material/snackbar';
export default {

    data: function(){
        return {
            snackbar: null
        }
    },
    mounted: function(){
        this.snackbar = new MDCSnackbar(this.$el);

        this.$root.snackbar = this.snackbar;
    }
}
</script>

