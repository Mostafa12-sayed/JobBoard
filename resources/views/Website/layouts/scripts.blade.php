<script src="{{asset('assets/website/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<script src="{{asset('assets/website/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('assets/website/js/popper.min.js')}}"></script>
<script src="{{asset('assets/website/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/website/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/website/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/website/js/ajax-form.js')}}"></script>
<script src="{{asset('assets/website/js/waypoints.min.js')}}"></script>
<script src="{{asset('assets/website/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/website/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/website/js/scrollIt.js')}}"></script>
<script src="{{asset('assets/website/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('assets/website/js/wow.min.js')}}"></script>
<script src="{{asset('assets/website/js/nice-select.min.js')}}"></script>
<script src="{{asset('assets/website/js/jquery.slicknav.min.js')}}"></script>
<script src="{{asset('assets/website/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/website/js/plugins.js')}}"></script>
<script src="{{asset('assets/website/js/gijgo.min.js')}}"></script>
<script src="{{ asset('assets/dashboard/js/sweetalert2.js') }}"></script>



<!--contact js-->
<script src="{{asset('assets/website/js/contact.js')}}"></script>
<script src="{{asset('assets/website/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('assets/website/js/jquery.form.js')}}"></script>
<script src="{{asset('assets/website/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/website/js/mail-script.js')}}"></script>


<script src="{{asset('assets/website/js/main.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>



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

</script>

@yield('js')

