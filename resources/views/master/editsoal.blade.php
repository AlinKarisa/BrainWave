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
<h1 class="m-0">Ubah Data</h1>
@endsection

@section('contentheadermenu')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a class="_kembali" href="{{url('mastersoal')}}/{{$idkategori}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a></li>
</ol>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
              <form method="post" id="formData" class="form-horizontal">
                @csrf
                      <div class="modal-body">
                        <!-- <div class="form-group">
                        <label>Tingkat Kesulitan<span class="bintang">*</span></label>
                        <br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="tingkat_edit" value="1" {{$data->tingkat==1 ? 'checked' : ''}}>
                          <label class="form-check-label">Easy</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="tingkat_edit" value="2" {{$data->tingkat==2 ? 'checked' : ''}}>
                          <label class="form-check-label">Medium</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="tingkat_edit" value="3" {{$data->tingkat==3 ? 'checked' : ''}}>
                          <label class="form-check-label">Hard</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="tingkat_edit" value="4" {{$data->tingkat==4 ? 'checked' : ''}}>
                          <label class="form-check-label">Very Hard</label>
                        </div>
                        <br>
                      </div> -->
                      <div class="form-group">
                          <label for="soal">Soal<span class="bintang">*</span></label>
                          <textarea id="soal" name="soal[]" placeholder="Soal" rows="10" class="form-control content_">{!! $data->soal !!}</textarea>
                      </div>
                      <div class="form-group">
                          <label for="a">Pilihan A<span class="bintang">*</span></label>
                          <textarea id="a" name="a[]" rows="2" class="form-control content_" placeholder="Pilihan A">{!! $data->a !!}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="point_a">Point Pilihan A<span class="bintang">*</span></label>
                        <input type="number" class="form-control int" id="point_a" name="point_a[]" placeholder="Point Pilihan A" value="{{$data->point_a}}">
                      </div>
                      <div class="form-group">
                          <label for="b">Pilihan B<span class="bintang">*</span></label>
                          <textarea id="b" name="b[]" rows="2" class="form-control content_" placeholder="Pilihan B">{!! $data->b !!}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="point_b">Point Pilihan B<span class="bintang">*</span></label>
                        <input type="number" class="form-control int" id="point_b" name="point_b[]" placeholder="Point Pilihan B" value="{{$data->point_b}}">
                      </div>
                      <div class="form-group">
                          <label for="c">Pilihan C <span class="bintang">(Opsional)</span></label>
                          <textarea id="c" name="c[]" rows="2" class="form-control content_" placeholder="Pilihan C">{!! $data->c !!}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="point_c">Point Pilihan C<span class="bintang">*</span></label>
                        <input type="number" class="form-control int" id="point_c" name="point_c[]" placeholder="Point Pilihan C" value="{{$data->point_c}}">
                      </div>
                      <div class="form-group">
                          <label for="d">Pilihan D <span class="bintang">(Opsional)</span></label>
                          <textarea id="d" name="d[]" rows="2" class="form-control content_" placeholder="Pilihan D">{!! $data->d !!}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="point_d">Point Pilihan D<span class="bintang">*</span></label>
                        <input type="number" class="form-control int" id="point_d" name="point_d[]" placeholder="Point Pilihan D" value="{{$data->point_d}}">
                      </div>
                      <div class="form-group">
                          <label for="e">Pilihan E <span class="bintang">(Opsional)</span></label>
                          <textarea id="e" name="e[]" rows="2" class="form-control content_" placeholder="Pilihan E">{!! $data->e !!}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="point_e">Point Pilihan E<span class="bintang">*</span></label>
                        <input type="number" class="form-control int" id="point_e" name="point_e[]" placeholder="Point Pilihan E" value="{{$data->point_e}}">
                      </div>

                      <div class="form-group">
                          <label for="f">Pilihan F <span class="bintang">(Opsional)</span></label>
                          <textarea id="f" name="f[]" rows="2" class="form-control content_" placeholder="Pilihan F">{!! $data->f !!}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="point_f">Point Pilihan F<span class="bintang">*</span></label>
                        <input type="number" class="form-control int" id="point_f" name="point_f[]" placeholder="Point Pilihan F" value="{{$data->point_f}}">
                      </div>

                      <div class="form-group">
                          <label for="g">Pilihan G <span class="bintang">(Opsional)</span></label>
                          <textarea id="g" name="g[]" rows="2" class="form-control content_" placeholder="Pilihan G">{!! $data->g !!}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="point_g">Point Pilihan G<span class="bintang">*</span></label>
                        <input type="number" class="form-control int" id="point_g" name="point_g[]" placeholder="Point Pilihan G" value="{{$data->point_g}}">
                      </div>

                      <div class="form-group">
                          <label for="h">Pilihan H <span class="bintang">(Opsional)</span></label>
                          <textarea id="h" name="h[]" rows="2" class="form-control content_" placeholder="Pilihan H">{!! $data->h !!}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="point_h">Point Pilihan H<span class="bintang">*</span></label>
                        <input type="number" class="form-control int" id="point_h" name="point_h[]" placeholder="Point Pilihan H" value="{{$data->point_h}}">
                      </div>
                    
                      <div class="form-group">
                          <label for="pembahasan">Pembahasan<span class="bintang"></span></label>
                          <textarea name="pembahasan[]" id="pembahasan" rows="5" class="form-control content_" placeholder="Pembahasan">{!! $data->pembahasan !!}</textarea>  
                      </div>  
                      
                      <div class="form-group">
                          <label for="jawaban">Jawaban<span class="bintang">*</span></label>
                          <select class="form-control" id="jawaban" name="jawaban[]">
                              @foreach(pilihan() as $key)
                              <option value="{{$key[0]}}" {{ $key[0]==$data->jawaban ? 'selected' : '' }}>{{$key[1]}}</option>
                              @endforeach
                          </select>
                      </div>
              
                    </div>
                    <div class="modal-footer justify-content-between">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> -->
                        <button type="submit" class="btn btn-danger btn-submit-data">Simpan</button>
                        <label class="ket-bintang">Bertanda <span class="bintang">*</span> Wajib diisi</label>
                    </div>
                  </form>

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

<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}" referrerpolicy="origin"></script>

<script>
  $(document).ready(function(){

    $('.content_').each(
      function(){
        CKEDITOR.replace($(this).attr('id'));  
      }
    );

    bsCustomFileInput.init();
    $(document).on('change', '.input-file', function (e) {
        var idphoto = $(this).attr('id');
        onlyExcel(idphoto);
    });

    $(".int").on('input paste', function () {
      hanyaAngkaAndMinus(this);
    });

    // Fungsi Ubah Data
    $(document).on('click', '.btn-submit-data', function (e) {
        $('#formData').validate({
          ignore: ".ignore",
          rules: {
            tingkat_edit: {
              required: true
            },
            'soal[]': {
              required: true
            },
            'a[]': {
              required: true
            },
            'b[]': {
              required: true
            },
            // 'c[]': {
            //   required: true
            // },
            // 'd[]': {
            //   required: true
            // },
            // 'e[]': {
            //   required: true
            // },
            'point_a[]': {
              required: true
            },
            'point_b[]': {
              required: true
            },
            'point_c[]': {
              required: true
            },
            'point_d[]': {
              required: true
            },
            'point_e[]': {
              required: true
            },
            'jawaban[]': {
              required: true
            },
         //   'pembahasan[]': {
         //     required: true
           // }
          },
          messages: {
            tingkat_edit: {
              required: "Tingkat kesulitan tidak boleh kosong"
            },
            'soal[]': {
              required: "Soal tidak boleh kosong"
            },
            'a[]': {
              required: "Pilihan A tidak boleh kosong"
            },
            'b[]': {
              required: "Pilihan B tidak boleh kosong"
            },
            'c[]': {
              required: "Pilihan C tidak boleh kosong"
            },
            'd[]': {
              required: "Pilihan D tidak boleh kosong"
            },
            // 'e[]': {
            //   required: "Pilihan E tidak boleh kosong"
            // },
            'point_a[]': {
              required: "Point Pilihan A tidak boleh kosong"
            },
            'point_b[]': {
              required: "Point Pilihan B tidak boleh kosong"
            },
            'point_c[]': {
              required: "Point Pilihan C tidak boleh kosong"
            },
            'point_d[]': {
              required: "Point Pilihan D tidak boleh kosong"
            },
            'point_e[]': {
              required: "Point Pilihan E tidak boleh kosong"
            },
            'jawaban[]': {
              required: "Jawaban tidak boleh kosong"
            },
            'pembahasan[]': {
              required: "Pembahasan tidak boleh kosong"
            }
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
            Swal.fire({
              html: "Harap isi kolom dengan bertanda *",
              icon: 'warning',
              showConfirmButton: true
            });
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          },

          submitHandler: function () {
          
            var formData = new FormData($('#formData')[0]);

            var url = "{{ url('/updatemastersoal') }}/{{$data->id}}";
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
                        reload_url(1000,"{{url('mastersoal')}}/{{$idkategori}}");
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

  });
</script>


@endsection