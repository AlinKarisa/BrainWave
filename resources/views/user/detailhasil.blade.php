@extends($extend)

<!-- partial -->

@section('content')

<style>
    .form-check .form-check-label input[type="radio"]+.input-helper:before {

        cursor: unset;

    }

    iframe{
        width: 100% !important;
    }

    .btn-tab {

        border: 1px solid transparent !important;

        color: #686868;

    }



    /* .btn-tab.active{

                                                                                                                                                                                                                                                                                                                                                                                                                                            border: 1px solid transparent !important;

                                                                                                                                                                                                                                                                                                                                                                                                                                            color: #7C3AED !important;

                                                                                                                                                                                                                                                                                                                                                                                                                                            background-color:transparent !important;

                                                                                                                                                                                                                                                                                                                                                                                                                                          }

                                                                                                                                                                                                                                                                                                                                                                                                                                          .btn-tab:hover{

                                                                                                                                                                                                                                                                                                                                                                                                                                            border: 1px solid transparent !important;

                                                                                                                                                                                                                                                                                                                                                                                                                                            color: #7C3AED !important;

                                                                                                                                                                                                                                                                                                                                                                                                                                            background-color:transparent !important;

                                                                                                                                                                                                                                                                                                                                                                                                                                          } */

    .btn-tab:focus {

        box-shadow: unset !important;

    }
    
    
    ._netral{
        background-color: #aaf!important;
        color: #ccc;
    }

</style>

@php

if (app('request')->input('tab')) {

$tab = app('request')->input('tab');

} else {

$tab = 'statistik';

}

if($upaketsoalmst->is_kkm){

    $lulus = true;
    foreach($upaketsoalmst->u_paket_soal_ktg_r as $key){
        if($key->nilai < $key->kkm)$lulus = false;
    }

}else{

    $lulus = $upaketsoalmst->nilai >= $upaketsoalmst->kkm;

}


function check_decimal($number){
    $number = number_format($number, 2, ',', ' ');
    if(substr($number,-1)=='0')$number = substr($number, 0, -1);
    if(substr($number,-2)==',0')$number = substr($number, 0, -2);
    return $number;
}


@endphp

<div class="content-wrapper">

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card card-border">

                <div class="card-body">

                    <nav aria-label="breadcrumb">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fas fa-home"></i></a></li>

                            <li class="breadcrumb-item active" aria-current="page">Paket Saya</li>

                            <li class="breadcrumb-item active" aria-current="page">Hasil & Pembahasan</li>

                        </ol>

                    </nav>

                    <p class="card-description">

                    <h3 class="font-weight-bold"><b>Detail Hasil Latihan</b></h3>

                    <div class="row">

                        <div class="col-12 col-md-3 col-lg-3">

                            <table class="table table-borderless">

                                <thead>

                                    <tr>

                                        <th class="pb-0" style="padding-left:0px">Latihan</th>

                                        <th class="pb-0">{{ $upaketsoalmst->judul }}</th>

                                    </tr>

                                    <tr>

                                        <th style="padding-left:0px">Nama</th>

                                        <th>{{ Auth::user()->name }}</th>

                                    </tr>

                                </thead>

                            </table>

                        </div>

                        <div class="col-12">

                            <ul class="pb-3 nav nav-pills btn-menu-paket" role="tablist">

                                <li class="nav-item">

                                    <a style="" class="btn btn-sm btn-primary nav-link btn-tab-hasil btn-tab {{ $tab == 'statistik' ? 'active' : '' }}" data-toggle="pill" href="#statistik"><i class="fas fa-chart-pie"></i> Hasil</a>

                                </li>

                                <li class="nav-item">

                                    <a style="" class="btn btn-sm btn-primary nav-link btn-tab-hasil btn-tab {{ $tab == 'pembahasan' ? 'active' : '' }}" data-toggle="pill" href="#pembahasan"><i class="fa fa-list-alt"></i>

                                        Pembahasan</a>

                                </li>

                            </ul>

                            <div class="tab-content tab-hasil-ujian">

                                <div id="statistik" class="tab-pane {{ $tab == 'statistik' ? 'active' : '' }}"><br>

                                    <div class="" style="overflow: hidden">
                                        <h4>Skor hasil perolehan <span class="badge badge-info">{{$upaketsoalmst->judul}}</span></h4>

                                                @if (!$lulus)

                                                <div class="badge badge-danger rounded-3 w-100 py-3 mt-2">

                                                    <h5 class="mb-0 p-0">Maaf Anda Tidak Lulus</h5>

                                                </div>

                                                @else

                                                <div class="badge badge-success rounded-3 w-100 py-3 mt-2">

                                                    <h5 class="mb-0 p-0">Selamat Anda Lulus</h5>

                                                </div>

                                                @endif


                                            <div class="row mt-3" style="justify-content: center">

                                                <div class="col-12 col-md-3" style="background: #ccf1d0e3 !important;margin-left:0.5%;margin-right:0.5%;border-radius:10px">

                                                    <div class="px-3 py-5 card-border" style="text-align:center;border-radius:10px;display:flex;flex-direction:column;justify-content:center">

                                                        @php

                                                        $getpoint = App\Models\UPaketSoalDtl::select('max_point')

                                                        ->where('fk_u_paket_soal_mst', $upaketsoalmst->id)

                                                        ->sum('max_point');

                                                        @endphp



                                                        <div style="display:flex;justify-content:center">



                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 50px;width:50px;color:green;background-color:white;border-radius:100%;padding:10px;margin-bottom:10px">

                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />

                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />

                                                            </svg>

                                                        </div>



                                                        <h6 class="fw-bold mt-3">Total Skor</h6>

                                                        <div class="">
                                                            
                                                        <span style="font-size: 36pt;color: #7C3AED;font-weight: bold;display: block;">
                                                        {{ $upaketsoalmst->point <= 0 ? 0 : check_decimal($upaketsoalmst->point) }}
                                                        </span>

                                                        @if($upaketsoalmst->use_bobot)

                                                        <h6 class="fw-bold mt-3 text-center">Nilai {{ $upaketsoalmst->nilai }} </h6>
                                                        
                                                        @endif

                                                        @if(!$upaketsoalmst->is_kkm)
                                                        <h6 class="fw-bold mt-3 text-center">KKM {{ $upaketsoalmst->kkm }} </h6>
                                                        @endif


                                                        </div>



                                                    </div>

                                                </div>

                                                @foreach($upaketsoalmst->u_paket_soal_ktg_r as $key)
                                                <div class="col-12 col-sm-3 mt-3" style="background: #D6CAEC !important;margin-left:0.5%;margin-right:0.5%;border-radius:10px">

                                                    <div class="px-3 py-5 card-border" style="text-align:center;border-radius:10px;display:flex;flex-direction:column;justify-content:center">



                                                        <div style="display:flex;justify-content:center">

                                                            <svg style="height: 50px;width:50px;color:blue;background-color:white;border-radius:100%;padding:10px;margin-bottom:10px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">

                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />

                                                            </svg>

                                                        </div>



                                                        <h6 class="fw-bold mt-3">{{ $key->judul }}</h6>

                                                        <div class=""><span style="font-size: 26pt;color: #7C3AED;font-weight: bold;display: block;">
                                                        @if($key->bobot)
                                                            {{ $key->point <= 0 ? 0 : check_decimal($key->point) }}
                                                        @elseif($key->fk_u_paket_soal_kecermatan_mst)
                                                            {{ $key->point <= 0 ? 0 : check_decimal($key->point) }}
                                                        @else
                                                            {{ $key->point <= 0 ? 0 : check_decimal($key->point) }}
                                                        @endif
                                                        </span>

                                                        </div>


                                                            @if($upaketsoalmst->is_kkm==1)
                                                            <h6 class="fw-bold mt-3">Passing Grade {{ $key->kkm }}
                                                            </h6>
                                                            <h6>
                                                                @if($key->point >= $key->kkm)
                                                                <span class="badge badge-info">Lulus</span>
                                                                @else
                                                                <span class="badge badge-danger">Tidak Lulus</span>
                                                                @endif

                                                            </h6>
                                                            @elseif($key->bobot)
                                                            <h6 class="fw-bold mt-3">Nilai Sesi {{ check_decimal((float)($key->nilai * (float)( $key->bobot / 100.0))) }}</h6>
                                                            <h6 class="fw-bold mt-3">Bobot {{ $key->bobot }} %</h6>
                                                            @endif

                                                        
                                                    </div>

                                                </div>
                                                @endforeach


                                            </div>

                                    </div>

                                </div>

                                <div id="pembahasan" class="tab-pane {{ $tab == 'pembahasan' ? 'active' : '' }}"><br>

                                    <div class="row">

                                        <div class="col-xl-9 col-md-9 col-sm-9 col-xs-9">
                                        @if($upaketsoalmst->bagi_jawaban==0 || $upaketsoalmst->jenis_pembahasan==1)
                                            <div class="_soal_content tab-content" id="pills-tabContent">

                                                @foreach ($upaketsoalmst->u_paket_soal_dtl_r as $key)

                                                <div class="tab-pane-soal tab-pane fade {{ $key->no_soal == 1 ? 'show active' : '' }}" id="pills-{{ $key->id }}" role="tabpanel">

                                                    <!-- <h4 class="ktg-soal">Kategori {{ $key->u_paket_soal_ktg_r->judul }}</h4> -->

                                                    <!-- <h6><b>[{{ $key->nama_tingkat }}]</b></h6> -->

                                                    <div class="mb-3 p-3 card-border" style="border-radius: 10px;">

                                                        <div class="row">

                                                            <div class="col-6">

                                                                <h4 class="mb-0 mt-0 d-flex align-items-center">

                                                                    <b>Soal No.{{ $key->no_soal }}</b>

                                                                    @if ($upaketsoalmst->bagi_jawaban == 1)

                                                                    @if ($key->jawaban_user)

                                                                    @if ($key->jawaban_user == $key->jawaban)

                                                                    <span class="badge badge-outline-success ms-2">Benar</span>

                                                                    @else

                                                                    <span class="badge badge-outline-danger ms-2">Salah</span>

                                                                    @endif

                                                                    @else

                                                                    <span class="badge badge-outline-secondary ms-2">Kosong</span>

                                                                    @endif

                                                                    @endif

                                                                </h4>

                                                            </div>

                                                            <div class="col-6">

                                                            </div>

                                                        </div>

                                                        <hr>

                                                        <div class="_soal">{!! $key->soal !!}</div>



                                                        <div class="form-group">

                                                            @if ($upaketsoalmst->jenis_penilaian == 1)

                                                            <div class="form-check {{ $key->jawaban == 'a' && $upaketsoalmst->bagi_jawaban == 1 ? '_form-check-success' : '_form-check-danger' }} {{ $key->jawaban_user == 'a' ? '_form-check-user' : '' }}">

                                                                <label class="form-check-label">

                                                                    <input type="radio" class="form-check-input _radio" disabled idpaketdtl="{{ $key->id }}" name="radio_{{ $key->id }}" value="a">

                                                                    <i class="input-helper"></i></label>

                                                                <div class="_pilihan">

                                                                    <span><b>a.</b> </span>

                                                                    <div class="_pilihan_isi">

                                                                        {!! $key->a !!}

                                                                        <i>( point {{$key->point_a}} )</i>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="form-check {{ $key->jawaban == 'b' && $upaketsoalmst->bagi_jawaban == 1 ? '_form-check-success' : '_form-check-danger' }} {{ $key->jawaban_user == 'b' ? '_form-check-user' : '' }}">

                                                                <label class="form-check-label">

                                                                    <input type="radio" class="form-check-input _radio" disabled idpaketdtl="{{ $key->id }}" name="radio_{{ $key->id }}" value="b">

                                                                    <i class="input-helper"></i></label>

                                                                <div class="_pilihan">

                                                                    <span><b>b.</b> </span>

                                                                    <div class="_pilihan_isi">

                                                                        {!! $key->b !!}

                                                                        <i>( point {{$key->point_b}} )</i>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            @if ($key->c)

                                                            <div class="form-check {{ $key->jawaban == 'c' && $upaketsoalmst->bagi_jawaban == 1 ? '_form-check-success' : '_form-check-danger' }} {{ $key->jawaban_user == 'c' ? '_form-check-user' : '' }}">

                                                                <label class="form-check-label">

                                                                    <input type="radio" class="form-check-input _radio" disabled idpaketdtl="{{ $key->id }}" name="radio_{{ $key->id }}" value="c">

                                                                    <i class="input-helper"></i></label>

                                                                <div class="_pilihan">

                                                                    <span><b>c.</b> </span>

                                                                    <div class="_pilihan_isi">

                                                                        {!! $key->c !!}

                                                                        <i>( point {{$key->point_c}} )</i>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                            @endif



                                                            @if ($key->d)

                                                            <div class="form-check {{ $key->jawaban == 'd' && $upaketsoalmst->bagi_jawaban == 1 ? '_form-check-success' : '_form-check-danger' }} {{ $key->jawaban_user == 'd' ? '_form-check-user' : '' }}">

                                                                <label class="form-check-label">

                                                                    <input type="radio" class="form-check-input _radio" disabled idpaketdtl="{{ $key->id }}" name="radio_{{ $key->id }}" value="d">

                                                                    <i class="input-helper"></i></label>

                                                                <div class="_pilihan">

                                                                    <span><b>d.</b> </span>

                                                                    <div class="_pilihan_isi">

                                                                        {!! $key->d !!}

                                                                        <i>( point {{$key->point_d}} )</i>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                            @endif



                                                            @if ($key->e)

                                                            <div class="form-check {{ $key->jawaban == 'e' && $upaketsoalmst->bagi_jawaban == 1 ? '_form-check-success' : '_form-check-danger' }} {{ $key->jawaban_user == 'e' ? '_form-check-user' : '' }}">

                                                                <label class="form-check-label">

                                                                    <input type="radio" class="form-check-input _radio" disabled idpaketdtl="{{ $key->id }}" name="radio_{{ $key->id }}" value="e">

                                                                    <i class="input-helper"></i></label>

                                                                <div class="_pilihan">

                                                                    <span><b>e.</b> </span>

                                                                    <div class="_pilihan_isi">

                                                                        {!! $key->e !!}

                                                                        <i>( point {{$key->point_e}} )</i>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                            @endif

                                                            @if ($key->f)

<div class="form-check {{ $key->jawaban == 'f' && $upaketsoalmst->bagi_jawaban == 1 ? '_form-check-success' : '_form-check-danger' }} {{ $key->jawaban_user == 'f' ? '_form-check-user' : '' }}">

    <label class="form-check-label">

        <input type="radio" class="form-check-input _radio" disabled idpaketdtl="{{ $key->id }}" name="radio_{{ $key->id }}" value="f">

        <i class="input-helper"></i></label>

    <div class="_pilihan">

        <span><b>f.</b> </span>

        <div class="_pilihan_isi">

            {!! $key->f !!}

        </div>

    </div>

</div>

@endif

@if ($key->g)

<div class="form-check {{ $key->jawaban == 'g' && $upaketsoalmst->bagi_jawaban == 1 ? '_form-check-success' : '_form-check-danger' }} {{ $key->jawaban_user == 'g' ? '_form-check-user' : '' }}">

    <label class="form-check-label">

        <input type="radio" class="form-check-input _radio" disabled idpaketdtl="{{ $key->id }}" name="radio_{{ $key->id }}" value="g">

        <i class="input-helper"></i></label>

    <div class="_pilihan">

        <span><b>g.</b> </span>

        <div class="_pilihan_isi">

            {!! $key->g !!}

        </div>

    </div>

</div>

@endif

@if ($key->h)

<div class="form-check {{ $key->jawaban == 'h' && $upaketsoalmst->bagi_jawaban == 1 ? '_form-check-success' : '_form-check-danger' }} {{ $key->jawaban_user == 'h' ? '_form-check-user' : '' }}">

    <label class="form-check-label">

        <input type="radio" class="form-check-input _radio" disabled idpaketdtl="{{ $key->id }}" name="radio_{{ $key->id }}" value="h">

        <i class="input-helper"></i></label>

    <div class="_pilihan">

        <span><b>h.</b> </span>

        <div class="_pilihan_isi">

            {!! $key->h !!}

        </div>

    </div>

</div>

@endif

                                                            @elseif($upaketsoalmst->jenis_penilaian == 2)

                                                            <div class="form-check {{ $key->jawaban == 'a' ? '_form-check-success' : '_form-check-danger' }} {{ $key->jawaban_user == 'a' ? '_form-check-user' : '' }}">

                                                                <label class="form-check-label">

                                                                    <input type="radio" class="form-check-input _radio" disabled idpaketdtl="{{ $key->id }}" name="radio_{{ $key->id }}" value="a">

                                                                    <i class="input-helper"></i></label>

                                                                <div class="_pilihan">

                                                                    <span><b>a.</b> </span>

                                                                    <div class="_pilihan_isi">

                                                                        {!! $key->a !!}

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="form-check {{ $key->jawaban == 'b' ? '_form-check-success' : '_form-check-danger' }} {{ $key->jawaban_user == 'b' ? '_form-check-user' : '' }}">

                                                                <label class="form-check-label">

                                                                    <input type="radio" class="form-check-input _radio" disabled idpaketdtl="{{ $key->id }}" name="radio_{{ $key->id }}" value="b">

                                                                    <i class="input-helper"></i></label>

                                                                <div class="_pilihan">

                                                                    <span><b>b.</b> </span>

                                                                    <div class="_pilihan_isi">

                                                                        {!! $key->b !!}

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="form-check {{ $key->jawaban == 'c' ? '_form-check-success' : '_form-check-danger' }} {{ $key->jawaban_user == 'c' ? '_form-check-user' : '' }}">

                                                                <label class="form-check-label">

                                                                    <input type="radio" class="form-check-input _radio" disabled idpaketdtl="{{ $key->id }}" name="radio_{{ $key->id }}" value="c">

                                                                    <i class="input-helper"></i></label>

                                                                <div class="_pilihan">

                                                                    <span><b>c.</b> </span>

                                                                    <div class="_pilihan_isi">

                                                                        {!! $key->c !!}

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="form-check {{ $key->jawaban == 'd' ? '_form-check-success' : '_form-check-danger' }} {{ $key->jawaban_user == 'd' ? '_form-check-user' : '' }}">

                                                                <label class="form-check-label">

                                                                    <input type="radio" class="form-check-input _radio" disabled idpaketdtl="{{ $key->id }}" name="radio_{{ $key->id }}" value="d">

                                                                    <i class="input-helper"></i></label>

                                                                <div class="_pilihan">

                                                                    <span><b>d.</b> </span>

                                                                    <div class="_pilihan_isi">

                                                                        {!! $key->d !!}

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="form-check {{ $key->jawaban == 'e' ? '_form-check-success' : '_form-check-danger' }} {{ $key->jawaban_user == 'e' ? '_form-check-user' : '' }}">

                                                                <label class="form-check-label">

                                                                    <input type="radio" class="form-check-input _radio" disabled idpaketdtl="{{ $key->id }}" name="radio_{{ $key->id }}" value="e">

                                                                    <i class="input-helper"></i></label>

                                                                <div class="_pilihan">

                                                                    <span><b>e.</b> </span>

                                                                    <div class="_pilihan_isi">

                                                                        {!! $key->e !!}

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            @endif

                                                        </div>

                                                        <hr>

                                                        <h5><b>Jawaban</b> :

                                                            {{ $key->jawaban_user ? strtoupper($key->jawaban_user) : '-' }}

                                                        </h5>

                                                        <hr>

                                                        @if ($upaketsoalmst->bagi_jawaban == 1)

                                                        <h5><b>Kunci Jawaban</b> :

                                                            {{ strtoupper($key->jawaban) }}
                                                        </h5>

                                                        <h5><b>Pembahasan</b> : <br>{!! $key->pembahasan !!}

                                                        </h5>

                                                        @endif

                                                    </div>



                                                    <div class="row mb-3">

                                                        <div class="col-6" style="text-align:right">

                                                            <span>

                                                                @if (!$loop->first)

                                                                <button idsoal="{{ $key->id - 1 }}" type="button" class="btn-next-back btn btn-sm btn-primary btn-rounded btn-fw">

                                                                    <i class="fa fa-long-arrow-left"></i>

                                                                    Sebelumnya

                                                                </button>

                                                                @endif

                                                            </span>

                                                        </div>

                                                        <div class="col-6">

                                                            <span>

                                                                @if (!$loop->last)

                                                                <button idsoal="{{ $key->id + 1 }}" type="button" class="btn-next-back btn btn-sm btn-primary btn-rounded btn-fw">

                                                                    Selanjutnya

                                                                    <i class="fa fa-long-arrow-right"></i>

                                                                </button>

                                                                @endif

                                                            </span>

                                                        </div>

                                                    </div>



                                                </div>

                                                <!-- <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">2</div> -->

                                                @endforeach


      @foreach($soalmst as $key)
      <div class="tab-pane fade" id="pills-{{$key->id}}" role="tabpanel">
        <div class="soal_master">
            <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table table-bordered" style="margin-bottom:0">
                        <tbody>
                          <tr>
                            @foreach(json_decode($key->karakter) as $loopdatamaster)
                            <td><h2><b>{{$loopdatamaster}}</b></h2></td>
                            @endforeach
                          </tr>
                          <tr>
                            @foreach(json_decode($key->kiasan) as $loopdatamaster)
                            <td><h5><b>{{$loopdatamaster}}</b></h5></td>
                            @endforeach
                          </tr>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
            <br>
            <h3 style="padding-bottom:15px">Pembahasan :</h3>
            @foreach($key->u_paket_soal_kecermatan_soal_dtl_r as $key2)
            <div class="row">
              <div class="col-12">
                <div class="_soal_content_kecermatan tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active">
                    <div class="parent">
                      @foreach(json_decode($key2->soal) as $loopdatadtl)
                        <div class="child"><h2>{{$loopdatadtl}}</h2></div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="soal_dtl_bawah">
                  <div class="parent">
                    @foreach(json_decode($key->kiasan) as $loopdatamaster)
                      <div class="child">
                        <h5>{{$loopdatamaster}}</h5>
                          <div class='form-check {{$key2->jawaban==$loopdatamaster? "_form-check-success" : "_form-check-danger"}} {{$key2->jawaban_user==$loopdatamaster ? "_form-check-user-kec" : "" }}'>
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" value="{{$loopdatamaster}}" disabled>
                              <i class="input-helper"></i></label>
                          </div>  
                      </div>
                    @endforeach
                  </div>
                </div>
                <div>
                  <h6>Kunci Jawaban : <b>{{$key2->jawaban}}</b></h6>
                  <h6 class="mb-3">Jawaban : <b>{{$key2->jawaban_user ? $key2->jawaban_user : "-"}} 
                      @if($key2->jawaban_user==$key2->jawaban)
                        <span class='text-success'>(Benar)</span>
                      @else
                        <span class='text-danger'>(Salah)</span>
                      @endif
                    </b></h6>
                </div>
              </div>
            </div>
            <br>
            @endforeach

        </div>
      </div>
      <!-- <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">2</div> -->
      @endforeach


                                            </div>
                                            @elseif($upaketsoalmst->jenis_pembahasan==2)
                                                {!!$upaketsoalmst->pembahasan!!}
                                            @endif
                                        </div>



                                        <div class="col-xl-3 col-md-3 col-sm-3 col-xs-3">

                                            <div class="card-border p-3 br-10">

                                                <center class="mb-3 fw-bold">Nomor Soal</center>

                                                @if ($upaketsoalmst->bagi_jawaban == 1)

                                                <div class="row mb-2">

                                                    <div class="col-sm-4 col-md-4 col-lg-4" style="padding-right:2.5px;"><i style="font-size:18px;color:#a3a4a5" class="fa fa-square"></i> <span style="font-size:12px;">Kosong</span></div>

                                                    <div class="col-sm-4 col-md-4 col-lg-4" style="padding-right:2.5px;"><i style="font-size:18px;color:#63bb64" class="fa fa-square"></i> <span style="font-size:12px;">Benar</span></div>

                                                    <div class="col-sm-4 col-md-4 col-lg-4" style="padding-right:2.5px;"><i style="font-size:18px;color:#FF4747" class="fa fa-square"></i> <span style="font-size:12px;">Salah</span></div>

                                                </div>

                                                @endif

                                                <ul class="_soal nav nav-pills mb-0" id="pills-tab" role="tablist">

                                                    @foreach ($upaketsoalmst->u_paket_soal_dtl_r as $key)

                                                    <!-- <li class="nav-item" role="presentation">

                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">1</button>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                  </li> -->

                                                    <li class="nav-item" role="presentation">

                                                        <button id="btn_no_soal_{{ $key->id }}" class="

                            @if ($key->jawaban_user && $upaketsoalmst->bagi_jawaban == 1) @if ($key->jawaban == $key->jawaban_user)

                                    _benar

                                @else

                                    _salah @endif

@else

_kosong

                            @endif

                            nav-link nav-link-soal {{ $key->no_soal == 1 ? 'active' : '' }}" data-bs-toggle="pill" data-bs-target="#pills-{{ $key->id }}" type="button" role="tab" aria-selected="true">{{ $key->no_soal }}</button>

                                                    </li>

                                                    @endforeach
                                                    
                                                    

                                                </ul>
                                                    
                                                <br>
                                                @if(count($soalmst))
                                                <center class="mb-3">Kecermatan</center>
                                                @endif

      <ul class="_soal nav nav-pills mb-3" id="pills-tab" role="tablist">
      @foreach($soalmst as $key)

      <!-- <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">1</button>
      </li> -->
      <li class="nav-item" role="presentation">
        <button id="btn_no_soal_{{$key->id}}" class="
        @if($key->is_mengerjakan>0)
                _netral
        @else
                _kosong
        @endif
        nav-link" data-bs-toggle="pill" data-bs-target="#pills-{{$key->id}}" type="button" role="tab" aria-selected="true">{{$loop->iteration}}</button>
      </li>
      @endforeach
    </ul>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection



@section('footer')

<!-- jQuery -->

<!-- SweetAlert2 -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {



        $(document).bind("contextmenu", function(e) {

            return false;

        });



        $('body').on("cut copy paste", function(e) {

            e.preventDefault();

        });



        $(document).on('click', '.btn-next-back', function(e) {

            idsoal = $(this).attr('idsoal');

            $('.tab-pane-soal').removeClass('show active');

            $('.nav-link-soal').removeClass('active');



            $('#pills-' + idsoal).addClass('show active');

            $('#btn_no_soal_' + idsoal).addClass('active');

        });

    });
</script>

<!-- Loading Overlay -->

@endsection