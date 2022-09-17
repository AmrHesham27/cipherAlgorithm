/** form values used in this form
 * #aes_encrypt_buton
 * #aes_decrypt_button
 * #aes_form
 * #aes_type
 * #aes_text
 * #aes_key
 * #aes_container
 */
 $('#aes_shift_buton').click(function () {
    $('#aes_text').val( $('#form-result-aes').text() );
});

$('#aes_encrypt_buton').click(function () {
    $('#aes_type').val('E');
});
$('#aes_decrypt_button').click(function () {
    $('#aes_type').val('D');
});
$(document).ready(function () {
    $('#aes_form').validate({
        rules: {
        },
        messages: {
        },
        submitHandler: function (form) {
            $("#aes_encrypt_buton").text("...Loading");
            $('#aes_decrypt_button').text("...Loading");
            var formData = {
                message: $("#aes_text").val(),
                key: $("#aes_key").val(),
                aes_type: $("#aes_type").val()
            };

            $.ajax({
                type: "POST",
                url: "forms/AES.php",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(function (data) {
                $("#aes_encrypt_buton").text("Encrypt");
                $('#aes_decrypt_button').text("Decrypt");
                if (data.status == 'true') {
                    $("#aes_container_success").html(
                        '<div id="form-result-aes" class="text-center alert alert-success w-100" role="alert">' +
                        data.data +
                        '</div>'
                    );
                    $("#aes_container_error").html('');
                } else {
                    $("#aes_container_error").html(
                        '<div id="form-result" class="text-center alert alert-danger w-100" role="alert">' +
                        data.message +
                        '</div>'
                    );
                    $("#aes_container_success").html('');
                }
            });
            event.preventDefault();
        }
    });
});