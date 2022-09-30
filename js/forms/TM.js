/** form values used in this form
 * #tm_encrypt_buton
 * #tm_decrypt_button
 * #tm_form
 * #tm_type
 * #tm_text
 * #tm_key
 * #tm_container
 */

$('#tm_encrypt_buton').click(function () {
    $('#tm_type').val('E');
});
$('#tm_decrypt_button').click(function () {
    $('#tm_type').val('D');
});
$(document).ready(function () {
    $('#tm_form').validate({
        rules: {
        },
        messages: {
        },
        submitHandler: function (form) {
            $("#tm_encrypt_buton").text("...Loading");
            $('#tm_decrypt_button').text("...Loading");
            var formData = {
                message: $("#tm_text").val(),
                abdul_key: $("#abdul_key").val(),
                aes_key: $("#aes_key").val(),
                tm_type: $("#tm_type").val()
            };
            $.ajax({
                type: "POST",
                url: "forms/TM.php",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(function (data) {
                $("#tm_encrypt_buton").text("Encrypt");
                $('#tm_decrypt_button').text("Decrypt");
                if (data.status == 'true') {
                    $("#tm_container").html(
                        '<div id="form-result" class="text-center alert alert-success w-100" role="alert">' +
                        data.data +
                        '</div>'
                    );
                } else {
                    $("#tm_container").html(
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