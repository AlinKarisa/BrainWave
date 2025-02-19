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

<style>
</style>


@endsection







@section('contentheader')



<h1 class="m-0">Soal [Kategori]</h1>



@endsection







@section('contentheadermenu')



<ol class="breadcrumb float-sm-right">



  <li class="breadcrumb-item"><a class="_kembali" href="{{url('paketsoalmst')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a></li>



</ol>



@endsection







@section('content')



<!-- Main content -->

@php
  if (Auth::user()->role_id !== null){
    $role_menu = App\Models\RoleMenu::where('role_id', Auth::user()->role_id)->pluck('menu')->toArray();
  }else{
    $role_menu = ['Kecermatan'];
  }
@endphp

<section class="content">



  <div class="container-fluid">



    <div class="row">



      <div class="col-12">



        <div class="card">







          <div class="card-header">



            <div class="row">



              <div class="col-sm-3">Paket</div>



              <div class="col-sm-9">: {{$datamst->judul}}</div>



            </div>



            <div class="row">



              <div class="col-sm-3">Waktu</div>



              <div class="col-sm-9">: {{$datamst->waktu}} Menit</div>



            </div>



            <div class="row">



              <div class="col-sm-3">Total Soal</div>



              <div class="col-sm-9">: {{$datamst->total_soal}} Butir</div>



            </div>



            <!-- <div class="row">



                    <div class="col-sm-3">KKM</div>



                    <div class="col-sm-9">: {{$datamst->kkm}}</div>



                </div> -->



          </div>



          <!-- <div class="card-header">



                <h3 class="card-title">Foto Beranda</h3>



              </div> -->



          <!-- /.card-header -->



          <div class="card-body">



            <span data-toggle="tooltip" data-placement="left" title="Tambah Data">



              <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-sm btn-primary btn-add-absolute">



                <i class="fa fa-plus" aria-hidden="true"></i>



              </button>



            </span>



            <!-- <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-md btn-primary btn-absolute">Tambah</button> -->

            <div id="warning-message" style="display: none; color: red; font-weight: bold;" class="_align_center">
              Masih ada butir soal yang berjumlah 0, pilih soal terlebih dahulu.
            </div>


            <table id="tabledata" class="table  table-striped">



              <thead>



                <tr>



                  <th>No</th>



                  <th>Kategori</th>
                  
                  <th>Jenis</th>

                  <!--<th>Bobot</th>-->

                  <th>Jumlah Soal</th>


                  <!-- <th>KKM Perkategori</th> -->


                  <th>Aksi</th>


                </tr>



              </thead>



              <tbody>



                @foreach($data as $key)



                <tr>



                  <td width="1%">{{$loop->iteration}}</td>


                  @if($key->fk_paket_soal_kecermatan_mst)
                    <td>{{$key->kategori_soal_kecermatan_r->judul}}</td>
                    <td width="1%" class="_align_center text-nowrap">Kecermatan</td>
                  @else
                    <td>{{$key->kategori_soal_r->judul}}</td>
                    <td width="1%" class="_align_center text-nowrap" style=>Pilihan Ganda</td>
                  @endif


                  <!--<td width="1%" class="_align_center">{{$key->bobot}} %</td>-->

                  <td width="1%" class="_align_center jumlah-soal">{{$key->jumlah_soal}} Butir</td>



                  <!-- <td width="1%" class="_align_center">{{$key->kkm}}</td> -->



                  <td width="1%" class="_align_center">



                    <div class="btn-group">



                      <span data-toggle="tooltip" data-placement="left" title="Soal">


                      @if($key->fk_paket_soal_kecermatan_mst)
                      <a href="{{url('paketsoalkecermatandtl')}}/{{$key->fk_paket_soal_kecermatan_mst}}/{{$key->fk_kategori_soal}}" class="btn btn-sm btn-outline-info"><i class="fas fa-th-list"></i></a>
                      @else
                      <a href="{{url('paketsoaldtl')}}/{{$key->id}}" class="btn btn-sm btn-outline-info"><i class="fas fa-th-list"></i></a>
                      @endif

                      </span>



                      <span data-toggle="tooltip" data-placement="left" title="Ubah Data">



                        <button data-toggle="modal" data-target="#modal-edit-{{$key->id}}" type="button" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>



                      </span>



                      <span data-toggle="tooltip" data-placement="left" title="Hapus Data">



                        <button data-toggle="modal" data-target="#modal-hapus-{{$key->id}}" type="button" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></button>



                      </span>



                    </div>



                  </td>



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



@foreach($data as $key)



<!-- Modal Edit -->



<div class="modal fade" id="modal-edit-{{$key->id}}">



  <div class="modal-dialog modal-lg">



    <div class="modal-content">



      <div class="modal-header">



        <h4 class="modal-title">Ubah Data</h4>



        <button type="button" class="close" data-dismiss="modal" aria-label="Close">



          <span aria-hidden="true">&times;</span>



        </button>



      </div>



      <form method="post" id="formData_{{$key->id}}" class="form-horizontal">



        @csrf



        <div class="modal-body">



          <!-- <div class="card-body"> -->



          <div class="form-group">



            <label for="fk_kategori_soal_{{$key->id}}">Kategori Soal<span class="bintang">*</span></label>


            @if($key->fk_paket_soal_kecermatan_mst)
            <input readonly type="text" class="form-control" id="fk_kategori_soal_{{$key->id}}" name="fk_kategori_soal[]" placeholder="Kategori Soal" value="{{$key->kategori_soal_kecermatan_r->judul}}">
            @else
            <input readonly type="text" class="form-control" id="fk_kategori_soal_{{$key->id}}" name="fk_kategori_soal[]" placeholder="Kategori Soal" value="{{$key->kategori_soal_r->judul}}">
            @endif



          </div>

          <!--<div class="form-group">-->
          <!--  <label for="bobot_{{$key->id}}">Bobot Nilai ( percent )</label>-->
          <!--  <input type="number" min="0" max="100" class="form-control int" id="bobot_{{$key->id}}" name="bobot[]" placeholder="Bobot nilai dalam persen" value="{{$key->bobot}}">-->
          <!--</div>-->

          <div class="form-group {{$datamst->jenis_waktu==1 ? 'd-none' : ''}}">
            <label for="waktu_{{$key->id}}">Waktu Pengerjaan (Menit)<span class="bintang">*</span></label>
            <input type="text" class="form-control int" id="waktu_{{$key->id}}" name="waktu[]" placeholder="Waktu Pengerjaan" value="{{$key->waktu}}">
          </div>

          <div class="form-group {{$datamst->is_kkm==0 ? 'd-none' : ''}}">



            <label for="kkm_{{$key->id}}">Passing Grade Perkategori<span class="bintang">*</span></label>



            <input type="text" class="form-control int" id="kkm_{{$key->id}}" name="kkm[]" placeholder="Passing Grade Perkategori" value="{{$key->kkm}}">



          </div>



          <!-- /.form-group -->



          <!-- </div> -->



        </div>



        <div class="modal-footer justify-content-between">



          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>



          <label class="ket-bintang">Bertanda <span class="bintang">*</span> Wajib diisi</label>



          <button type="submit" class="btn btn-danger btn-submit-data" idform="{{$key->id}}">Simpan</button>



        </div>



      </form>



    </div>



    <!-- /.modal-content -->



  </div>



  <!-- /.modal-dialog -->



</div>



<!-- /.modal edit -->







<!-- Modal Hapus -->



<div class="modal fade" id="modal-hapus-{{$key->id}}">



  <div class="modal-dialog modal-lg">



    <div class="modal-content">



      <div class="modal-header">



        <h4 class="modal-title">Konfirmasi</h4>



        <button type="button" class="close" data-dismiss="modal" aria-label="Close">



          <span aria-hidden="true">&times;</span>



        </button>



      </div>



      <form method="post" id="formHapus_{{$key->id}}" class="form-horizontal">



        @csrf



        <div class="modal-body">


          @if($key->fk_paket_soal_kecermatan_mst)
          <h6> Apakah anda ingin menghapus soal kategori {{$key->kategori_soal_kecermatan_r->judul}}?</h6>
          @else
          <h6> Apakah anda ingin menghapus soal kategori {{$key->kategori_soal_r->judul}}?</h6>
          @endif



        </div>



        <div class="modal-footer justify-content-between">



          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>



          <button type="button" class="btn btn-danger btn-hapus" idform="{{$key->id}}">Hapus</button>



        </div>



      </form>



    </div>



    <!-- /.modal-content -->



  </div>



  <!-- /.modal-dialog -->



</div>



<!-- /.Modal Hapus -->



@endforeach







<!-- Modal Tambah -->



<div class="modal fade" id="modal-tambah">



  <div class="modal-dialog modal-lg">



    <div class="modal-content">



      <div class="modal-header">



        <h4 class="modal-title">Tambah Data</h4>



        <button type="button" class="close" data-dismiss="modal" aria-label="Close">



          <span aria-hidden="true">&times;</span>



        </button>



      </div>



      <form method="post" id="_formData" class="form-horizontal">



        @csrf



        <div class="modal-body">



          <!-- <div class="card-body"> -->



          <input type="hidden" class="form-control" id="fk_paket_soal_mst" name="fk_paket_soal_mst" value="{{$idpaketmst}}">







          <div class="form-group">



            <label for="fk_kategori_soal_add">Kategori Soal<span class="bintang">*</span></label>



            <select class="form-control kategorisoal" name="fk_kategori_soal_add" id="fk_kategori_soal_add">



              <option value=""></option>


              <optgroup label="Pilihan ganda">
              @foreach($ktgsoal as $ktg)


              <option value="pg{{$ktg->id}}">{{$ktg->judul}}</option>


              @endforeach
              </optgroup>

              @if(($datamst->jenis_waktu != -1) && in_array('Kecermatan' ,$role_menu))
              <optgroup label="Kecermatan">

              @foreach($cermatsoal as $ktg)


              <option value="kc{{$ktg->id}}">{{$ktg->judul}}</option>


              @endforeach
              </optgroup>
              @endif


            </select>



          </div>

          <!--<div class="form-group">-->
          <!--  <label for="bobot_add">Bobot Nilai ( percent )</label>-->
          <!--  <input type="number" min="0" max="100" class="form-control int" id="bobot_add" name="bobot_add" placeholder="Bobot nilai dalam persen" value="0">-->
          <!--</div>-->

          <div class="form-group {{$datamst->jenis_waktu==1 ? 'd-none' : ''}}">
            <label for="waktu_add">Waktu Pengerjaan (Menit)<span class="bintang">*</span></label>
            <input type="text" class="form-control int" id="waktu_add" name="waktu_add" placeholder="Waktu Pengerjaan" value="0">
          </div>

          <div class="form-group {{$datamst->is_kkm==0 ? 'd-none' : ''}}">



            <label for="kkm_add">Passing Grade Perkategori<span class="bintang">*</span></label>



            <input type="text" class="form-control int" id="kkm_add" name="kkm_add" placeholder="Passing Grade Perkategori" value="0">



          </div>



          <!-- <div class="card-body"> -->



          <!-- /.form-group -->



          <!-- </div> -->



        </div>



        <div class="modal-footer justify-content-between">



          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>



          <label class="ket-bintang">Bertanda <span class="bintang">*</span> Wajib diisi</label>



          <button type="submit" class="btn btn-danger">Simpan</button>



        </div>



      </form>



    </div>



    <!-- /.modal-content -->



  </div>



  <!-- /.modal-dialog -->



</div>



<!-- /.modal edit -->







@endsection







@section('footer')
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Function to check if there are any questions with jumlah_soal = 0 and change the text color
    function checkJumlahSoal() {
      let jumlahSoalElements = document.querySelectorAll('.jumlah-soal');
      let hasZeroSoal = false;

      // Iterate over each "jumlah-soal" element
      jumlahSoalElements.forEach(function(element) {
        // Extract the number from the text content (before "Butir")
        let jumlah = element.textContent.trim().split(' ')[0];  // Split by space and take the first part (the number)

        // Check if jumlah is 0
        if (parseInt(jumlah) === 0) {
          hasZeroSoal = true;

          // Change the color of the text to red if jumlah is 0
          element.style.color = 'red';
          element.style.fontWeight = 'bold';
        } else {
          // Reset color if the jumlah is not 0
          element.style.color = '';
          element.style.fontWeight = '';
        }
      });

      // Get the warning message div
      let warningMessage = document.getElementById('warning-message');

      // If any element has 0, show the warning message
      if (hasZeroSoal) {
        warningMessage.style.display = 'block';
      } else {
        warningMessage.style.display = 'none';
      }
    }

    // Call the function when the page loads or before any important action
    checkJumlahSoal();
  });
</script>




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
  $(document).ready(function() {







    $(".int").on('input paste', function() {



      hanyaInteger(this);



    });



    // bsCustomFileInput.init();



    datatablekatesoal("tabledata");







    //Initialize Select2 Elements



    $('.kategorisoal').select2({



      placeholder: "Kategori Soal"



    })







    // $(document).on('change', '.input-photo', function (e) {



    //     var idphoto = $(this).attr('id');



    //     onlyPhoto(idphoto);



    // });







    //Fungsi Hapus Data



    $(document).on('click', '.btn-hapus', function(e) {



      idform = $(this).attr('idform');



      var formData = new FormData($('#formHapus_' + idform)[0]);







      var url = "{{ url('/hapuspaketsoalktg') }}/" + idform;



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



          $.LoadingOverlay("show");



        },



        success: function(response) {



          if (response.status == true) {



            Swal.fire({



              html: response.message,



              icon: 'success',



              showConfirmButton: false



            });



            reload(1000);



          } else {



            Swal.fire({



              html: response.message,



              icon: 'error',



              confirmButtonText: 'Ok'



            });



          }



        },



        error: function(xhr, status) {



          alert('Error!!!');



        },



        complete: function() {



          $.LoadingOverlay("hide");



        }



      });



    });











    // Fungsi Ubah Data



    $(document).on('click', '.btn-submit-data', function(e) {



      idform = $(this).attr('idform');



      $('#formData_' + idform).validate({



        rules: {



          'fk_kategori_soal[]': {



            required: true



          },

          'waktu[]': {



            required: true,
            min: 1




          },



          'kkm[]': {



            required: true,



            min: 1



          }



        },



        messages: {



          'fk_kategori_soal[]': {



            required: "Kategori soal tidak boleh kosong"



          },

          'waktu[]': {



            required: "Waktu tidak boleh kosong",
            min: "Waktu tidak boleh kosong",




          },



          'kkm[]': {



            required: "Passing Grade tidak boleh kosong",



            min: "Passing Grade tidak boleh kosong",



            max: "Maximal 100"



          }



        },



        errorElement: 'span',



        errorPlacement: function(error, element) {



          error.addClass('invalid-feedback');



          element.closest('.form-group').append(error);



        },



        highlight: function(element, errorClass, validClass) {



          $(element).addClass('is-invalid');



        },



        unhighlight: function(element, errorClass, validClass) {



          $(element).removeClass('is-invalid');



        },







        submitHandler: function() {







          var formData = new FormData($('#formData_' + idform)[0]);







          var url = "{{ url('/updatepaketsoalktg') }}/" + idform;



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



              $.LoadingOverlay("show");



            },



            success: function(response) {



              if (response.status == true) {



                Swal.fire({



                  html: response.message,



                  icon: 'success',



                  showConfirmButton: false



                });



                reload(1000);



              } else {



                Swal.fire({



                  html: response.message,



                  icon: 'error',



                  confirmButtonText: 'Ok'



                });



              }



            },



            error: function(xhr, status) {



              alert('Error!!!');



            },



            complete: function() {



              $.LoadingOverlay("hide");



            }



          });



        }



      });



    });







    // Fungsi Add Data



    $('#_formData').validate({



      rules: {



        fk_kategori_soal_add: {



          required: true



        },

        waktu_add: {



          required: true,



          min: 1



        },

        kkm_add: {



          required: true,



          min: 1



        }



      },



      messages: {



        fk_kategori_soal_add: {



          required: "Kategori soal tidak boleh kosong"



        },

        waktu_add: {



          required: "Waktu tidak boleh kosong",



          min: "Waktu tidak boleh kosong"



        },

        kkm_add: {



          required: "Passing Grade tidak boleh kosong",



          min: "Passing Grade tidak boleh kosong",



          max: "Maximal 100"



        }



      },



      errorElement: 'span',



      errorPlacement: function(error, element) {



        if (element.hasClass('_select2')) {



          element.parent().addClass('select2-error');



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



          y = $('#' + x).parent().addClass('select2-error');



        }



      },



      unhighlight: function(element, errorClass, validClass) {



        $(element).removeClass('is-invalid');



        if (element.tagName.toLowerCase() == 'select') {



          var x = element.getAttribute('id');



          y = $('#' + x).parent().removeClass('select2-error');



        }



      },







      submitHandler: function() {







        var formData = new FormData($('#_formData')[0]);







        var url = "{{ url('storepaketsoalktg') }}";



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



            $.LoadingOverlay("show");



          },



          success: function(response) {



            if (response.status == true) {



              Swal.fire({



                html: response.message,



                icon: 'success',



                showConfirmButton: false



              });



              reload(1000);



            } else {



              Swal.fire({



                html: response.message,



                icon: 'error',



                confirmButtonText: 'Ok'



              });



            }



          },



          error: function(xhr, status) {



            alert('Error!!!');



          },



          complete: function() {



            $.LoadingOverlay("hide");



          }



        });



      }



    });







  });
</script>







@endsection