<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/framwork.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/master.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/sweetalert2.min.css')}}" />

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    {{-- @include('sweetalert::alert') --}}

    <div class="login">
      <div class="login-box bg-white d-flex align-center p-20 gap-20">
        <div class="txt-c">
          <form action="{{route('dashboard.login.store')}}" method="POST">
            @csrf
          <h3 class="mt-0 mb-0 fw-bold">Sign In to Your Account</h3>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1213 73" fill="#FFB76B"><path d="M1212.41 5.51c3.05 12.87-22.36 11.93-30.26 15.68-94.32 20.51-269.09 32.42-365.48 37.51-77.91 3.82-155.66 9.93-233.67 11.67-57.49 2.56-115.05-.19-172.57 1.58-121.28.91-243.17 1.88-363.69-13.33-12.51-2.64-25.8-2.92-37.77-7.45-30.66-21.42 26.02-21.53 38.52-19.26 359.95 29.05 364.68 27.36 638.24 17.85 121-3.78 241.22-19.21 426.76-41.46 4.72-.65 9.18 3.56 8.45 8.36a941.74 941.74 0 0 0 54.29-9.21c9.33-2.33 18.7-4.56 27.95-7.19a7.59 7.59 0 0 1 9.23 5.24Z"></path></svg>        </div>
        <div class="input-group w-full p-relative">
          <label for="email" class="mb-10 d-block">Email / Username</label>
          <i class="fa-regular fa-envelope"></i>
            <input
              type="text"
              placeholder="Enter your email address or username"
              id="username"
              name="username"
              value="{{old('username')}}"
              
            />
          </div>

          <div class="input-group w-full p-relative">
            <i class="fa-solid fa-lock"></i>
            <label for="password" class="mb-10 d-block">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" />
          </div>
        
          <div class="input-group w-full d-flex ">
            <div class="d-flex">
            <input type="checkbox" name="remmber" id="remmber">
            <label for="remmber" class="c-black fs-13">Remmber me</label>
            
            </div>
            <a href="#">Forgot your password?</a>
          </div>
          <button type="submit" class="btn-shape">Login</button>
          <div class="input-group between-flex txt-c">
          <a href="#">Don't have account ? </a>
          </div>

          
          </div>
        </form>
      </div>
    </div>

  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset('assets/dashboard/js/sweetalert2.js') }}"></script>

  <script>
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
  </script>
</html>
