/** form values used in this form
 * #abdul_encrypt_buton
 * #abdul_decrypt_button
 * #abdul_form
 * #abdul_type
 * #abdul_text
 * #abdul_key
 * #abdul_container
 */
$('#abdul_encrypt_buton').click(function () {
    $('#abdul_type').val('E');
});
$('#abdul_decrypt_button').click(function () {
    $('#abdul_type').val('D');
});
$(document).ready(function () {
    $('#abdul_form').validate({
        rules: {
        },
        messages: {
        },
        submitHandler: function (form) {
            $("#abdul_encrypt_buton").text("...Loading");
            $('#abdul_decrypt_button').text("...Loading");
            var formData = {
                message: $("#abdul_text").val(),
                key: $("#abdul_key").val(),
                abdul_type: $("#abdul_type").val()
            };

            $.ajax({
                type: "POST",
                url: "forms/Abdul.php",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(function (data) {
                $("#abdul_encrypt_buton").text("Encrypt");
                $("#abdul_decrypt_button").text("Decrypt");
                if (data.status == 'true') {
                    $("#abdul_container").html(
                        '<div id="form-result-abdul" class="text-center alert alert-success w-100" role="alert">' +
                        data.data +
                        '</div>'
                    );
                } else {
                    $("#abdul_container").html(
                        '<div id="form-result" class="text-center alert alert-danger w-100" role="alert">' +
                        data.message +
                        '</div>'
                    );
                }
            });
            event.preventDefault();
        }
    });
});
