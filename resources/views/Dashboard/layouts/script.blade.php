<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
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

function changeImage(element, id) {
        if (element.files && element.files[0]) {
            var reader = new FileReader();
            console.log(id);
            reader.onload = function (e) {
                $('.image-preview-' + id).attr('src', e.target.result);
            }

            reader.readAsDataURL(element.files[0]);
        }
    }

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

  document.querySelectorAll('.dropdown-toggle').forEach(item => {
  item.addEventListener('click', event => {
 
    if(event.target.classList.contains('dropdown-toggle') ){
      event.target.classList.toggle('toggle-change');
    }
    else if(event.target.parentElement.classList.contains('dropdown-toggle')){
      event.target.parentElement.classList.toggle('toggle-change');
    }
  })
});




// function MarkAsRead(id) {
//     $.ajax({
//         type: "GET",
//         url: "/signature/make-as-read/" + id,
//         success: function (data) {
//             console.log(data);
//             $(".notif-count").text(data.count);
//         },
//     });
// }

var pusher = new Pusher(PUSHER_APP_KEY, {
    cluster: PUSHER_APP_CLUSTER,
});
// console.log(PUSHER_APP_KEY);

// // var notificationsCountElem = $(".notif-count");
// // var notificationsCount = parseInt(notificationsCountElem.text());
Pusher.logToConsole = true;

// // Subscribe to send-sign-event
var channel = pusher.subscribe("contact-form");
console.log(channel);
channel.bind("contact-submitted", function (data) {
    // if (data.userId == CURRENT_USER_ID) {
    //     playNotificationSound();
    //     Swal.fire(
    //         "New File Add To a signature",
    //         "You have a new file need to sign from " + data.userName
    //     );

    //     var newNotificationHtml = `
    //         <a onclick="MarkAsRead('${data.notifyId}')"
    //             href="/signature/showFileToSign/${data.file_id}"
    //             class="text-dark nav-link">
    //             <div class="text-end position-relative d-flex gap-10 align-center">
    //                 <i class="fa-regular fa-envelope"></i>
    //                 <span class="mb-0" style="font-size:11px;line-height: normal">
    //                     File need Sign From ${data.userName}
    //                 </span>
    //                 <small class="text-muted float-start">${data.notifyCreatedAt}</small>
    //             </div>
    //         </a>`;

    //     $(".dropdown-content").prepend(newNotificationHtml);
    //     updateNotificationCount();
    // }

    console.log(data);
    // ("New File Add To a signature", "You have a new file need to sign from " + data.name)
});

// // // Subscribe to send-file-signed-event
// // var newchannel = pusher.subscribe("send-file-signed-event");
// // newchannel.bind("send-file-signed-event-admin", function (data) {
// //     console.log(data);
// //     if (data.admin_id == CURRENT_USER_ID) {
// //         playNotificationSound();
// //         Swal.fire("User File is Signed", data.message);

// //         var newNotificationHtml = `
// //             <a onclick="MarkAsRead('${data.notifyId}')"
// //                 href="/signature/file-view/${data.file_id}"
// //                 class="text-dark nav-link">
// //                 <div class="text-end position-relative d-flex gap-10 align-center">
// //                     <i class="fa-regular fa-envelope"></i>
// //                     <span class="mb-0" style="font-size:11px;line-height: normal">
// //                         ${data.message}
// //                     </span>
// //                     <small class="text-muted float-start">${data.notifyCreatedAt}</small>
// //                 </div>
// //             </a>`;

// //         $(".dropdown-content").prepend(newNotificationHtml);
// //         updateNotificationCount();
// //     }
// // });

// // // Function to play notification sound
// // function playNotificationSound() {
// //     var notificationSound = document.getElementById("notification-sound");
// //     if (notificationSound) {
// //         notificationSound.play();
// //     }
// // }

// // Function to update the notification count
// function updateNotificationCount() {
//     notificationsCount++;
//     notificationsCountElem.text(notificationsCount);
// }


</script>

{{-- 
@if(auth()->guard('admin')->user()->id)
    <script type="module">
        
            window.Echo.channel('contact-form')
                .listen('.contact-submitted', (data) => {
                    console.log('Order status updated: ', data);
                    alter(data);
                    // var d1 = document.getElementById('notification');
                    // d1.insertAdjacentHTML('beforeend', '<div class="alert alert-success alert-dismissible fade show"><span><i class="fa fa-circle-check"></i>  '+data.message+'</span></div>');
                });
    </script>
@endif --}}