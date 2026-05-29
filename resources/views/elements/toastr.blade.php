@if(session('success'))

<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999">

    <div id="appToast"
         class="toast border-0"
         role="alert"
         aria-live="assertive"
         aria-atomic="true">

        <div class="toast-header bg-success text-white">
            <strong class="me-auto">
                Success
            </strong>

            <small>Now</small>

            <button
                type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="toast"
                aria-label="Close">
            </button>
        </div>

        <div class="toast-body">
          Hello, world! This is a toast message.
        </div>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const toastElement =
        document.getElementById('appToast');

    const toast = new bootstrap.Toast(
        toastElement,
        {
            autohide: true,
            delay: 4000
        }
    );

    toast.show();

});
</script>

@endif