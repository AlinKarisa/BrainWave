<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @php
  $template = App\Models\Template::where('id','<>','~')->first();
    @endphp
    <title>{{$template->nama}}</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{asset($template->logo_kecil)}}" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.css"
      integrity="sha512-uHuCigcmv3ByTqBQQEwngXWk7E/NaPYP+CFglpkXPnRQbSubJmEENgh+itRDYbWV0fUZmUz7fD/+JDdeQFD5+A=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
  <div
    class="w-full max-w-4xl flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden min-h-[80vh] mt-6 mb-6">
    <div class="hidden md:flex md:w-1/2 bg-slate-800 text-white p-10 flex-col justify-center">
      <div class="flex items-center space-x-2">
        <img src="{{asset($template->logo_kecil)}}" alt="BrainWave Logo" class="w-10 h-10">
        <h1 class="text-2xl font-bold">BrainWave</h1>
      </div>
      <h2 class="text-3xl font-semibold mt-6 leading-snug">Bergabung dengan BrainWave dan Jelajahi Masa Depan
        Pendidikan!</h2>
    </div>
    <div class="w-full md:w-1/2 p-8">
      <div class="flex flex-col items-center md:flex-row md:justify-start mb-4">
        <img src="{{asset($template->logo_besar)}}" alt="BrainWave Logo" class="w-20 h-20 md:hidden mb-2">
        <h2 class="text-2xl font-bold text-gray-800">Register</h2>
      </div>
      @if($errors->any())
      <p class="text-red-500 text-sm mt-1">{{$errors->first()}}</p>
      @endif
      <form class="pt-3" method="post" id="formRegister">
        @csrf
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group mb-3">
              <label class="fw-600 mb-0">NIK (opsional)</label>
              <input type="number" min="0" class="form-control form-control-sm rounded-2" name="nik"
                placeholder="Masukkan NIK (opsional)">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="form-group mb-3">
              <label class="fw-600 mb-0">Nama</label>
              <input type="text" class="form-control form-control-sm rounded-2" name="name" placeholder="Masukkan Nama">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3">
              <label class="fw-600 mb-0">No. Whatsapp</label>
              <input type="text" class="form-control form-control-sm angka rounded-2" id="no_wa" name="no_wa"
                placeholder="08123xxxxxx">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="form-group mb-3">
              <label class="fw-600 mb-0">Email</label>
              <input type="email" class="form-control form-control-sm rounded-2" id="email" name="email"
                placeholder="Masukkan Email">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3">
              <label class="fw-600 mb-0">Ulangi Email</label>
              <input type="email" class="form-control form-control-sm rounded-2" id="ulangi_email" name="ulangi_email"
                placeholder="Ulangi Email">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="form-group mb-3">
              <label class="fw-600 mb-0">Masukkan Password</label>
              <div class="input-group">
                <input type="password" class="form-control form-control-sm rounded-2" id="password" name="password"
                  placeholder="Masukkan Password" autocomplete="off">
                  <span class="input-group-text bg-white border rounded-2" onclick="togglePassword()">
                    <i id="eyeIcon" class="bi bi-eye text-purple"></i>
                  </span>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3">
              <label class="fw-600 mb-0">Ulangi Password</label>
              <div class="input-group">
                <input type="password" class="form-control form-control-sm rounded-2" id="ulangi_password"
                  name="ulangi_password" placeholder="Ulangi Password" autocomplete="off">
                  <span class="input-group-text bg-white border rounded-2" onclick="togglePassword()">
                    <i id="eyeIcon" class="bi bi-eye text-purple"></i>
                  </span>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="form-group mb-3">
              <label class="fw-600 mb-0">Provinsi</label>
              <select class="form-control form-control-sm _select2 rounded-2" id="provinsi" name="provinsi">
                <option value="" disabled selected>Pilih Provinsi</option>
                @foreach($provinsi as $data)
                <option value="{{$data->id_prov}}">{{$data->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3">
              <label class="fw-600 mb-0">Kota/Kabupaten</label>
              <select class="form-control form-control-sm _select2 rounded-2" id="kabupaten" name="kabupaten">
                <option value="" disabled selected>Pilih Kota/Kabupaten</option>
              </select>
            </div>
          </div>
        </div>
        <button type="submit" class="w-full bg-purple-600 text-white py-2 rounded hover:bg-purple-700 transition">
          Daftar Sekarang
        </button>
      </form>


      <p class="text-sm text-center my-4">Sudah punya akun? <a href="{{url('login')}}"
          class="text-purple-600 font-semibold">Login</a></p>
      <p class="text-xs text-gray-500 text-center mt-4">
        Dengan mendaftar, Anda menyetujui <a href="#" class="text-purple-600">Syarat dan Ketentuan</a> serta <a href="#"
          class="text-purple-600">Kebijakan Privasi</a> BrainWave.
      </p>
    </div>
  </div>
</body>

<!-- plugins:js -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
  integrity="sha512-NqYds8su6jivy1/WLoW8x1tZMRD7/1ZfhWG/jcRQLOzV1k1rIODCpMgoBnar5QXshKJGV7vi0LXLNXPoFsM5Zg=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.js"
  integrity="sha512-GkPcugMfi6qlxrYTRUH4EwK4aFTB35tnKLhUXGLBc3x4jcch2bcS7NHb9IxyM0HYykF6rJpGaIJh8yifTe1Ctw=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/themes@5.0.11/minimal/minimal.css"> -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Global -->
<script src="{{ asset('js/global.js') }}"></script>
<!-- Custom Input File -->
<script src="{{ asset('layout/adminlte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

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
  $(document).ready(function() {
    $('#referrer').select2({
      placeholder: "Pilih Referrer"
    });

    getSemuaKota('provinsi', 'kabupaten', '{{ url("/getKabupaten") }}', '{{asset("/image/global/loading.gif")}}');

    $(".angka").on('input paste', function() {
      hanyaAngka(this);
    });

    $('#formRegister').validate({
      rules: {
        name: {
          required: true
        },
        no_wa: {
          required: true,
          minlength: 10,
          maxlength: 15
        },
        email: {
          required: true,
          email: true
        },
        ulangi_email: {
          email: true,
          required: true,
          equalTo: "#email"
        },
        password: {
          required: true,
          minlength: 4
        },
        ulangi_password: {
          required: true,
          equalTo: "#password"
        },
        provinsi: {
          required: true
        },
        kabupaten: {
          required: true
        },
        referrer: {
          required: true
        }
      },
      messages: {
        name: {
          required: "Nama tidak boleh kosong"
        },
        no_wa: {
          required: "Nomor telepon/whatsapp tidak boleh kosong",
          minlength: "Masukkan nomor yang benar",
          maxlength: "Masukkan nomor yang benar"
        },
        email: {
          required: "Email tidak boleh kosong",
          email: "Masukkan email yang benar"
        },
        ulangi_email: {
          equalTo: "Ulangi email harus sama",
          required: "Ulangi email tidak boleh kosong",
          email: "Masukkan email yang benar"
        },
        password: {
          required: "Password tidak boleh kosong",
          minlength: "Masukkan minimal 4 karakter"
        },
        ulangi_password: {
          required: "Ulangi password tidak boleh kosong",
          equalTo: "Ulangi password harus sama"
        },
        provinsi: {
          required: "Provinsi tidak boleh kosong"
        },
        kabupaten: {
          required: "Kota/Kabupaten tidak boleh kosong"
        },
        referrer: {
          required: "Referrer tidak boleh kosong"
        },
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        if (element.hasClass('select')) {
          element.parent().addClass('select2-error');
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        } else if (element.hasClass('input-foto')) {
          element.parent().addClass('input-foto-error');
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        } else {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        }
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
        if (element.tagName.toLowerCase() == 'select') {
          var x = element.getAttribute('id');
          $('#' + x).parent().addClass('select2-error');
        } else if (element.tagName.toLowerCase() == 'input') {
          var x = element.getAttribute('class');
          var z = element.getAttribute('id');
          if (x == "input-foto is-invalid") {
            $('#' + z).parent().addClass('input-foto-error');
          }
        }
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        if (element.tagName.toLowerCase() == 'select') {
          var x = element.getAttribute('id');
          $('#' + x).parent().removeClass('select2-error');
        } else if (element.tagName.toLowerCase() == 'input') {
          var x = element.getAttribute('class');
          var z = element.getAttribute('id');
          if (x == "input-foto") {
            $('#' + z).parent().removeClass('input-foto-error');
          }
        }
      },

      submitHandler: function() {
        var formData = new FormData($('#formRegister')[0]);

        var url = "{{ url('/storeregister') }}";
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
          beforeSend: function() {
            $.LoadingOverlay("show", {
              image: "{{asset('/image/global/loading.gif')}}"
            });
          },
          success: function(response) {
            if (response.status === true) {
              Swal.fire({
                title: response.message,
                icon: 'success',
                showConfirmButton: false
              });
              reload_url(3000, "{{url('/login')}}");
            } else {
              Swal.fire({
                title: response.message,
                icon: 'error',
                confirmButtonText: 'Ok',
                showCloseButton: true,
              });
            }
          },
          error: function(xhr, status) {
            alert('Error! Please Try Again');
          },
          complete: function() {
            $.LoadingOverlay("hide");
          }
        });
      }
    });
  });
</script>


</html>