$(document).on("submit", ".js-ajax-form", function (e) {
    e.preventDefault();

    const form = $(this);

    $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        data: form.serialize(),

        success: function (response) {
            Swal.fire({
                icon: "success",
                title: response.message,
                timer: 1500,
                showConfirmButton: false,
            });

            $(".modal").modal("hide");

            if (window.LaravelDataTable) {
                LaravelDataTable.ajax.reload(null, false);
            }
        },

        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;

                form.find(".is-invalid").removeClass("is-invalid");

                form.find(".invalid-feedback").text("");

                $.each(errors, function (field, messages) {
                    const input = form.find('[name="' + field + '"]');

                    input.addClass("is-invalid");

                    input
                        .closest(".form-floating")
                        .find(".invalid-feedback")
                        .text(messages[0]);
                });
            }
            Swal.fire({
                icon: "error",
                title: "Error",
                timer: 2000,
                showConfirmButton: false,
                text: xhr.responseJSON?.message ?? "Something went wrong.",
            });
        },
    });
});
