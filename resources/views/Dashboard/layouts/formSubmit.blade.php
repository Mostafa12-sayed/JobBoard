<script>
   $(document).ready(function() {
    $('.form').on('submit', function(e) {
        e.preventDefault();
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').remove();
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr('action'),
            type: this.method,
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
<<<<<<< HEAD
              sessionStorage.setItem('successMessage',response.message);
=======
            //   sessionStorage.setItem('successMessage',response.message);
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b
              location.reload();
              
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value) {
                    var inputField = $('[name="' + key + '"]');
                    inputField.addClass('is-invalid');

                    inputField.after('<div class="invalid-feedback">' + value[0] + '</div>');
                });
            }
        });
    });
});


</script>