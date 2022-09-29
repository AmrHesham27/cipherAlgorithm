/** form values used in this form
 * #ad_encrypt_buton
 * #ad_decrypt_button
 * #ad_form
 * #ad_type
 * #ad_text
 * #ad_container
 */

 $('#ad_encrypt_buton').click(function () {
    $('#ad_type').val('E');
});
$('#ad_decrypt_button').click(function () {
    $('#ad_type').val('D');
});
$(document).ready(function () {
    $('#ad_form').validate({
        rules: {
        },
        messages: {
        },
        submitHandler: function (form) {
            $("#ad_encrypt_buton").text("...Loading");
            $('#ad_decrypt_button').text("...Loading");
            var formData = {
                message: $("#ad_text").val(),
                ad_type: $("#ad_type").val()
            };

            $.ajax({
                type: "POST",
                url: "forms/AD.php",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(function (data) {
                $("#ad_encrypt_buton").text("Encrypt");
                $('#ad_decrypt_button').text("Decrypt");
                if (data.status == 'true') {
                    $("#ad_container_success").html(
                        "<div id='ad_container_success' class='text-center alert alert-success w-100' role='alert'>" +
                        data.data + 
                        "</div>"
                    );
                    $("#ad_container_error").html('');
                    $("#ad_text").val(data.data);
                } else {
                    $("#ad_container_error").html(
                        "<div id='ad_container_error' class='text-center alert alert-danger w-100' role='alert'>" +
                        data.message + 
                        "</div>"
                    );
                    $("#ad_container_success").html('');
                }
            });
            event.preventDefault();
        }
    });
});