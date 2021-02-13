$(document).ready(function () {


    $('form').submit(function (e) {

        e.preventDefault();
        $('#resultForm').empty();
        var form = $(this).serialize();
        

        $.ajax({
            method: 'POST',
            url: '/dataform',
            data: form,
            cache: false,
            processData: false,

            success: function (result) {

                clearForm();
                $('#resultForm').append(result);

            }
        });
    })

    function clearForm() {
        document.getElementById("form").reset();
    }

   

});
