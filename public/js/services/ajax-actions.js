(function ($) {
    window.ajaxRequest = function ({
        url,
        method = "GET",
        data = {},
        confirmTitle = null,
        confirmMessage = null,
        confirmIcon = null,
        successCallback = null,
        errorCallback = null,
    }) {
        const executeRequest = () => {
            $.ajax({
                url: url,
                type: method,
                data: data,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content",
                    ),
                },

                success: function (response) {
                    if (successCallback) {
                        successCallback(response);
                    }
                },

                error: function (xhr) {
                    if (errorCallback) {
                        errorCallback(xhr);
                    }
                },
            });
        };

        if (confirmMessage) {
            Swal.fire({
                title: confirmTitle || "Are you sure?",
                icon: confirmIcon || "warning",
                text: confirmMessage,
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "Cancel",
            }).then((result) => {
                if (result.isConfirmed) {
                    executeRequest();
                }
            });

            return;
        }

        executeRequest();
    };

    window.openAjaxModal = function ({ title, html }) {
        $("#ajaxModalTitle").text(title);

        $("#ajaxModalBody").html(html);
        const modalElement = document.getElementById("ajaxModal");
        let modal = bootstrap.Modal.getOrCreateInstance(modalElement);
        // let modal = new bootstrap.Modal(document.getElementById("ajaxModal"));

        modal.show();
    };

    $(document).on("click", ".js-ajax-action", function (e) {
        e.preventDefault();
        let button = $(this);
        button.addClass("disabled");

        ajaxRequest({
            url: button.data("url"),
            method: button.data("method"),
            confirmTitle: button.data("confirm-title"),
            confirmMessage: button.data("confirm-message"),
            confirmIcon: button.data("confirm-icon"),

            successCallback: function (response) {
                // Modal content
                if (button.data("modal")) {
                    openAjaxModal({
                        title: button.data("modal-title") || "Details",
                        html: response.html,
                    });
                    button.removeClass("disabled");
                    return;
                }
                // Standard toast actions
                if (response.message) {
                    showToast("success", response.message, "Success");
                }

                if (button.data("reload")) {
                    location.reload();
                }

                button.removeClass("disabled");
            },

            errorCallback: function (xhr) {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    timer: 2000,
                    showConfirmButton: false,
                    text: xhr.responseJSON?.message ?? "Something went wrong.",
                });
                button.removeClass("disabled");
            },
        });
    });
})(jQuery);
