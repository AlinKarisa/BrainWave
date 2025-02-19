<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  @php
  $template = App\Models\Template::where('id','<>','~')->first();
    @endphp
    <title>{{$template->nama}}</title>
    <link href="{{asset($template->logo_kecil)}}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.css"
      integrity="sha512-uHuCigcmv3ByTqBQQEwngXWk7E/NaPYP+CFglpkXPnRQbSubJmEENgh+itRDYbWV0fUZmUz7fD/+JDdeQFD5+A=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class="h-screen flex items-center justify-center bg-gray-100 px-4">
  <div class="w-full max-w-4xl flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden">
    <div class="hidden md:flex md:w-1/2 bg-slate-800 text-white p-10 flex-col justify-center">
      <div class="flex items-center space-x-2">
        <img src="{{asset($template->logo_kecil)}}" alt="BrainWave Logo" class="w-10 h-10">
        <h1 class="text-2xl font-bold">BrainWave</h1>
      </div>
      <h2 class="text-3xl font-semibold mt-6 leading-snug">Jelajahi Masa Depan Pendidikan dengan BrainWave!</h2>
    </div>
    <div class="w-full md:w-1/2 p-8">
      <div class="flex flex-col items-center md:flex-row md:justify-start mb-4">
        <img src="{{asset($template->logo_besar)}}" alt="BrainWave Logo" class="w-20 h-20 md:hidden mb-2">
        <h2 class="text-2xl font-bold text-gray-800">Login</h2>
      </div>
      @if($errors->any())
      <p class="text-red-500 text-sm mt-1">{{$errors->first()}}</p>
      @endif
      <form class="pt-3" method="post" id="formLogin">
        @csrf
        <div class="form-group mb-3">
          <label class="fw-600 mb-1">Email</label>
          <input type="email" class="form-control form-control-sm rounded-2" id="username" name="username"
            placeholder="Masukkan Email">
        </div>
        <div class="form-group mb-3 position-relative">
          <label class="fw-600 mb-1">Password</label>
          <div class="input-group">
            <input type="password" class="form-control form-control-sm rounded-2" id="password" name="password"
              placeholder="Masukkan Password">
            <span class="input-group-text bg-white border rounded-2" onclick="togglePassword()">
              <i id="eyeIcon" class="bi bi-eye text-purple"></i>
            </span>
          </div>
        </div>
        <div class="flex justify-between items-center mb-3">
          <label class="inline-flex items-center text-xs">
            <input type="checkbox" class="form-checkbox text-blue-600" name="remember">
            <span class="ml-2 text-gray-600">Remember Me</span>
          </label>
          <a href="#" class="text-purple-600 text-xs">Forgot Password?</a>
        </div>
        <button type="submit"
          class="w-full bg-purple-600 text-white py-2 rounded hover:bg-purple-700 transition">Login</button>
      </form>
      <p class="text-sm text-center my-4">Belum punya akun? <a href="{{url('buatakun')}}"
          class="text-purple-600 font-semibold">Register</a></p>
      <p class="text-xs text-gray-500 text-center mt-4">
        Dengan mendaftar, Anda menyetujui <a href="#" class="text-purple-600">Syarat dan Ketentuan</a> serta <a href="#"
          class="text-purple-600">Kebijakan Privasi</a> BrainWave.
      </p>
    </div>
  </div>
  <script src="{{ asset('layout/skydash/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('layout/skydash/js/off-canvas.js') }}"></script>
  <script src="{{ asset('layout/skydash/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('layout/skydash/js/template.js') }}"></script>
  <script src="{{ asset('layout/skydash/js/settings.js') }}"></script>
  <script src="{{ asset('layout/skydash/js/todolist.js') }}"></script>
  <!-- endinject -->

  <!-- jQuery -->
  <script src="{{ asset('layout/adminlte3/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('layout/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- jquery-validation -->
  <script src="{{ asset('layout/adminlte3/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('layout/adminlte3/plugins/jquery-validation/additional-methods.min.js') }}"></script>
  <!-- AdminLTE App -->
  <!-- <script src="{{ asset('layout/adminlte3/dist/js/adminlte.min.js') }}"></script> -->

  <!-- Loading Overlay -->
  <script src='https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js'>
  </script>
  <!-- SweetAlert2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/themes@5.0.11/minimal/minimal.css"> -->
  <!-- Global -->
  <script src="{{ asset('js/global.js') }}"></script>

  <script>
    function togglePassword() {
      const passwordField = document.getElementById("password");
      const eyeIcon = document.getElementById("eyeIcon");
      
      if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.classList.remove("bi-eye");
        eyeIcon.classList.add("bi-eye-slash");
      } else {
        passwordField.type = "password";
        eyeIcon.classList.remove("bi-eye-slash");
        eyeIcon.classList.add("bi-eye");
      }
    }
  </script>
  

  <script>
    $(document).ready(function(){
      $('#formLogin').validate({
          rules: {
          username: {
              required: true,
              email: true
          },
          password: {
              required: true
          },
          },
          messages: {
          username: {
              required: "Email tidak boleh kosong",
              email: "Masukkan email yang benar!"
          },
          password: {
              required: "Password tidak boleh kosong"
          },
      
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
          },

          submitHandler: function () {
            var formData = new FormData($('#formLogin')[0]);

            var url = "{{ url('userauth') }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    // $.LoadingOverlay("show");
                    $.LoadingOverlay("show", {
                        image       : "{{asset('/image/global/loading.gif')}}"
                    });
                },
                success: function (response) {
                    if (response.status === true) {
                    Swal.fire({
                        title: response.message,
                        icon: 'success',
                        showConfirmButton: false
                        });
                            reload_url(1000,"{{url('/home')}}");
                    }else{
                    Swal.fire({
                        title: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok',
                        showCloseButton: true,
                    });
                    }
                },
                error: function (xhr, status) {
                    alert('Error! Please Try Again');
                },
                complete: function () {
                    $.LoadingOverlay("hide");
                }
            });   
          }
      });
  });
  </script>
</body>

</html>