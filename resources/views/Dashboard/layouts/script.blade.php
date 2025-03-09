<script>
   $(document).on('click', '.btn-modal', function (e) {
        console.log($(this).data('href'));
        e.preventDefault();
        var container = $(this).data('container');
        $.ajax({
            url: $(this).data('href'),
            dataType: 'html',
            success: function (result) {
                $(container)
                    .html(result)
                    .modal('show');
            },
        });
    });

    @if(count($errors) > 0)
        var list = {!! $errors !!};
        var values = '';
        jQuery.each(list, function (key, value) {
            values += value + '\n';
        });
        $(document).ready(function () {
            swal.fire({
                // title: 'Error!',
                text: values,
                icon: 'error'
            });
        });


    @endif
    // $(document).ready(function() {
    //     if (sessionStorage.getItem('successMessage')) {
    //         textmessage=sessionStorage.getItem('successMessage')
    //         Toastify({
    //         text: textmessage,
    //         duration: 5000,
    //         newWindow: true,
    //         close: true,
    //         gravity: "top",
    //         position: "center",
    //         stopOnFocus: true, 
    //         onClick: function(){} 
    //         }).showToast();
    //         sessionStorage.removeItem('successMessage');
    //     }
    //     });


$(document).ready(function() {
$('.toggle-checkbox').change(function() {
    
    var id = $(this).data('id');
    var url = $(this).data('url');
    $.ajax({
    type: "POST",
    dataType: "json",
    url: url,
    data: {
        '_token': '{{ csrf_token() }}',
        'id': id,
        
    },
    success: function(data) {
        console.log(data.message);
    }
    });
});
});

$('.delete-item').on('click', function(e) {
          e.preventDefault();
          var url = $(this).data('url');
          var id = $(this).data('id');
          Swal.fire({
            title: "Info",
            text: "Are you sure you want to delete this item?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!"
            }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url; 
            }
        });
  });
</script>
