(function ($) {
    window.openAjaxModal = function ({ title, url }) {
        $("#ajaxModalTitle").text(title);

        $("#ajaxModalBody").html(
            '<div class="text-center py-5">Loading...</div>',
        );

        let modal = new bootstrap.Modal(document.getElementById("ajaxModal"));

        modal.show();

        $.get(url, function (response) {
            $("#ajaxModalBody").html(response.html);
        });
    };
})(jQuery);
