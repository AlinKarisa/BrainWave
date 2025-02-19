@extends('layouts.Adminlte3')



@section('header')

  <!-- Google Font: Source Sans Pro -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="{{ asset('layout/adminlte3/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- DataTables -->

  <link rel="stylesheet" href="{{ asset('layout/adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('layout/adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('layout/adminlte3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <!-- Theme style -->

  <link rel="stylesheet" href="{{ asset('layout/adminlte3/dist/css/adminlte.min.css') }}">

  

@endsection



@section('contentheader')

<h1 class="m-0">Pengguna Voucher {{$kodepotongan->kode}}</h1>

@endsection



@section('contentheadermenu')

<ol class="breadcrumb float-sm-right">

    <li class="breadcrumb-item">List Pengguna</li>

</ol>

@endsection



@section('content')

    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <div class="row">

          <div class="col-12">

            <div class="card">

              <!-- <div class="card-header">

                <h3 class="card-title">Foto Beranda</h3>

              </div> -->

              <!-- /.card-header -->

              <div class="card-body">

         

              <!-- <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-md btn-primary btn-absolute">Tambah</button> -->

                <table id="tabledata" class="table  table-striped">

                  <thead>

                  <tr>

                    <th>No</th>

                    <th>No.Transaksi</th>

                    <th>User</th>

                    <th>Paket</th>

                    <th>Tanggal Transaksi</th>

                  </tr>

                  </thead>

                  <tbody>

                  @foreach($pengguna as $key)

                  <tr>

                  <td width="1%">{{$loop->iteration}}</td>

                  <td width="25%">{{$key->merchant_order_id}}</td>

                  <td>{{$key->user_r ? $key->user_r->name : "[Deleted User]"}}</td>

                  <td width="25%">{{$key->paket_mst_r ? $key->paket_mst_r->judul : "[Deleted Paket]"}}</td>


                  <td width="20%" class="_align_center">{{Carbon\Carbon::parse($key->created_at)->translatedFormat('l, d F Y , H:i:s')}}</td>

                  </tr>

                  @endforeach

                  </tbody>

                  <!-- <tfoot>

                  <tr>

                    <th>Rendering engine</th>

                    <th>Browser</th>

                    <th>Platform(s)</th>

                    <th>Engine version</th>

                    <th>CSS grade</th>

                  </tr>

                  </tfoot> -->

                </table>

              </div>

              <!-- /.card-body -->

            </div>

            <!-- /.card -->

          </div>

          <!-- /.col -->

        </div>

        <!-- /.row -->

      </div>

      <!-- /.container-fluid -->

    </section>

    <!-- /.content -->





@endsection



@section('footer')

<!-- Custom Input File -->

<script src="{{ asset('layout/adminlte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<!-- jQuery -->

<script src="{{ asset('layout/adminlte3/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->

<script src="{{ asset('layout/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- jquery-validation -->

<script src="{{ asset('layout/adminlte3/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

<script src="{{ asset('layout/adminlte3/plugins/jquery-validation/additional-methods.min.js') }}"></script>

<!-- DataTables  & Plugins -->

<script src="{{ asset('layout/adminlte3/plugins/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('layout/adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('layout/adminlte3/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>

<script src="{{ asset('layout/adminlte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('layout/adminlte3/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>

<script src="{{ asset('layout/adminlte3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

<script src="{{ asset('layout/adminlte3/plugins/jszip/jszip.min.js') }}"></script>

<script src="{{ asset('layout/adminlte3/plugins/pdfmake/pdfmake.min.js') }}"></script>

<script src="{{ asset('layout/adminlte3/plugins/pdfmake/vfs_fonts.js') }}"></script>

<script src="{{ asset('layout/adminlte3/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>

<script src="{{ asset('layout/adminlte3/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>

<script src="{{ asset('layout/adminlte3/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- AdminLTE App -->

<script src="{{ asset('layout/adminlte3/dist/js/adminlte.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->

<script src="{{ asset('layout/adminlte3/dist/js/demo.js') }}"></script>

<!-- Page specific script -->

<!-- DatePicker -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">

<!--  Flatpickr  -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>

<script>

  $(document).ready(function(){


    // bsCustomFileInput.init();

    tablekodepotongan("tabledata");



    //Initialize Select2 Elements



    // $('.mapel').select2({

    //   placeholder: "Pilih Mapel"

    // });



    $('.jenis').select2({

      placeholder: "Pilih Jenis"

    });

    $('.user').select2({

      placeholder: "Pilih User"

    })



    // $('#jenis_soal_add').on('select2:select', function (e) {

    //     var val = $(this).val();

    //     $.ajaxSetup({

    //         headers: {

    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    //         }

    //     });

    //     $.ajax({

    //         url: '{{url("getPaketSoal")}}',

    //         type: 'POST',

    //         dataType: "JSON",

    //         data: {

    //             "val":val

    //         },

    //         beforeSend: function () {

    //             $.LoadingOverlay("show", {

    //                 image       : "{{asset('/image/global/loading.gif')}}"

    //             });

    //         },

    //         success: function (response) {

    //             if (response.status == true) {



    //                 $("#fk_paket_soal_mst_add").html("");

    //                 var newOption = new Option('', '', false, false);

    //                 $("#fk_paket_soal_mst_add").append(newOption).trigger('change');

    //                 $("#fk_paket_soal_mst_add").attr("data-placeholder","Paket Soal");



    //                 $("#fk_paket_soal_mst_add").select2({

    //                     data: response.datapaket

    //                 });

    //             }else{

    //                 Swal.fire({

    //                     title: "Error!!!",

    //                     icon: 'error',

    //                     confirmButtonText: 'Ok'

    //                 });

    //             }

    //         },

    //         error: function (xhr, status) {

    //             alert('Error!!!');

    //         },

    //         complete: function () {

    //             $.LoadingOverlay("hide");

    //         }

    //     });

    // });



    // $(document).on('change', '.input-photo', function (e) {

    //     var idphoto = $(this).attr('id');

    //     onlyPhoto(idphoto);

    // });



    //Fungsi Hapus Data

    $(document).on('click', '.btn-hapus', function (e) {

        idform = $(this).attr('idform');

        var formData = new FormData($('#formHapus_' + idform)[0]);



        var url = "{{ url('/hapuskodepotongan') }}";

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

                $.LoadingOverlay("show");

            },

            success: function (response) {

                    if (response.status == true) {

                      Swal.fire({

                          html: response.message,

                          icon: 'success',

                          showConfirmButton: false

                        });

                        reload(1000);

                    }else{

                      Swal.fire({

                          html: response.message,

                          icon: 'error',

                          confirmButtonText: 'Ok'

                      });

                    }

            },

            error: function (xhr, status) {

                alert('Error!!!');

            },

            complete: function () {

                $.LoadingOverlay("hide");

            }

        });

    });

    



    // Fungsi Ubah Data

    $(document).on('click', '.btn-submit-data', function (e) {

        idform = $(this).attr('idform');

        $('#formData_'+idform).validate({

          rules: {

            'jenis[]': {

              required: true

            },

            'fk_user[]': {

              required: true

            },

            'kode[]': {

              required: true

            },

            'tipe[]': {

              required: true

            },

            'harga[]': {

              min:1,

              required: true

            },

            'persen[]': {

              min:1,

              max:99,

              required: true

            },
            'batas[]': {

              min:1,

              required: true

            }

          },

          messages: {

            'jenis[]': {

              required: "Jenis tidak boleh kosong"

            },

            'fk_user[]': {

              required: "User tidak boleh kosong"

            },

            'kode[]': {

              required: "Kode tidak boleh kosong"

            },

            'tipe[]': {

              required: "Tipe tidak boleh kosong"

            },

            'harga[]': {

              min: "Harga potongan tidak boleh kosong",

              required: "Harga potongan tidak boleh kosong"

            },

            'persen[]': {

              min: "Persen potongan tidak boleh kosong",

              max: "Max 99",

              required: "Persen potongan tidak boleh kosong"

            },
            'batas[]': {

              min: "Batas tidak boleh kosong",

              required: "Batas tidak boleh kosong"

              }

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

          

            var formData = new FormData($('#formData_'+idform)[0]);



            var url = "{{ url('/updatekodepotongan') }}";

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

                    $.LoadingOverlay("show");

                },

                success: function (response) {

                    if (response.status == true) {

                      Swal.fire({

                          html: response.message,

                          icon: 'success',

                          showConfirmButton: false

                        });

                        reload(1000);

                    }else{

                      Swal.fire({

                          html: response.message,

                          icon: 'error',

                          confirmButtonText: 'Ok'

                      });

                    }

                },

                error: function (xhr, status) {

                    alert('Error!!!');

                },

                complete: function () {

                    $.LoadingOverlay("hide");

                }

            });   

          }

        });

    });



    // Fungsi Add Data

    $('#_formData').validate({

          rules: {

            jenis_add: {

              required: true

            },

            fk_user_add: {

              required: true

            },

            kode_add: {

              required: true

            },

            tipe_add: {

              required: true

            },

            gambar_add: {

              required: true

            },

            harga_add: {

              min:1,

              required: true

            },

            persen_add: {

              min:1,

              max:99,

              required: true

            },

            batas_add: {

              min:1,

              required: true

              }

          },

          messages: {

            jenis_add: {

              required: "Jenis tidak boleh kosong"

            },

            fk_user_add: {

              required: "User tidak boleh kosong"

            },

            gambar_add: {

              required: "Gambar tidak boleh kosong"

            },

            kode_add: {

              required: "Kode tidak boleh kosong"

            },

            tipe_add: {

              required: "Tipe tidak boleh kosong"

            },

            harga_add: {

              min: "Harga potongan tidak boleh kosong",

              required: "Harga potongan tidak boleh kosong"

            },

            persen_add: {

              min: "Persen potongan tidak boleh kosong",

              max: "Max 99",

              required: "Persen potongan tidak boleh kosong"

            },
            batas_add: {

              min: "Batas tidak boleh kosong",

              required: "Batas tidak boleh kosong"

              }

          },

          errorElement: 'span',

          errorPlacement: function (error, element) {

            if (element.hasClass('_select2')) {     

                element.parent().addClass('select2-error');

                error.addClass('invalid-feedback');

                element.closest('.form-group').append(error);

            } else {                                      

                error.addClass('invalid-feedback');

                element.closest('.form-group').append(error);

            }

          },

          highlight: function (element, errorClass, validClass) {

            $(element).addClass('is-invalid');

            if(element.tagName.toLowerCase()=='select'){

              var x = element.getAttribute('id');

              y = $('#'+x).parent().addClass('select2-error');

            }

          },

          unhighlight: function (element, errorClass, validClass) {

            $(element).removeClass('is-invalid');

            if(element.tagName.toLowerCase()=='select'){

              var x = element.getAttribute('id');

              y = $('#'+x).parent().removeClass('select2-error');

            }

          },



          submitHandler: function () {

          

            var formData = new FormData($('#_formData')[0]);



            var url = "{{ url('storekodepotongan') }}";

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

                    $.LoadingOverlay("show");

                },

                success: function (response) {

                    if (response.status == true) {

                        Swal.fire({

                          html: response.message,

                          icon: 'success',

                          showConfirmButton: false

                        });

                        reload(1000);

                    }else{

                      Swal.fire({

                          html: response.message,

                          icon: 'error',

                          confirmButtonText: 'Ok'

                      });

                    }

                },

                error: function (xhr, status) {

                    alert('Error!!!');

                },

                complete: function () {

                    $.LoadingOverlay("hide");

                }

            });   

          }

      });



  });

</script>



@endsection