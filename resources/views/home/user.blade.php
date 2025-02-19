@extends('layouts.Skydash')

@php
$now = Carbon\Carbon::now()->toDateTimeString();
@endphp

@section('content')
<style>
  .img-banner {
    width: 100%;
    height: 20vw;
    object-fit: cover;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
  }

  .p-relative {
    position: relative;
  }

  .p-absolute {
    position: absolute;
  }

  .txt-white {
    color: white;
  }

  a {
    text-decoration: none;
    color: #7c7c7c;
  }

  a:hover {
    text-decoration: none;
    color: #7c7c7c;
  }

  a .card-body:hover img {
    filter: drop-shadow(2px 4px 6px black);
  }

  @media (max-width: 768px) {
    .img-banner {
      height: 60vw;
    }

    .mt-5-m {
      margin-top: 15vw;
    }
  }
</style>

<div class="content-wrapper">
  <div class="row mb-0">
    <div class="col-md-12">
      <div class="slide-home">
        {{-- ubah via admin --}}
          @php
            $template = App\Models\Template::where('id','<>','~')->first();
          @endphp
        <div class="slide-data"><img src="{{$template->Banner1}}"
            class="w-100 rounded-3"></div>
        <div class="slide-data"><img src="{{ asset('image/global/BANNER 2 WEBSITE BIMBEL.png') }}"
            class="w-100 rounded-3"></div>
      </div>
      <!--<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">-->
      <!--  <ol class="carousel-indicators">-->
      <!--    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>-->
      <!--    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>-->

      <!--  </ol>-->
      <!--  <div class="carousel-inner">-->
      <!--    <div class="carousel-item active">-->
      <!--      <img src= "{{ asset('image/global/BANNER-ORANGDALAM1.png') }}" class="d-block w-100" alt="Banner 1">-->
      <!--    </div>-->
      <!--    <div class="carousel-item">-->
      <!--      <img src="{{ asset('image/global/BANNER-ORANGDALAM2.png') }}" class="d-block w-100" alt="Banner 2">-->
      <!--    </div>-->

      <!--  </div>-->
      <!--  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">-->
      <!--    <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
      <!--    <span class="visually-hidden">Previous</span>-->
      <!--  </a>-->
      <!--  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">-->
      <!--    <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
      <!--    <span class="visually-hidden">Next</span>-->
      <!--  </a>-->
      <!--</div>-->

      <div class="row mt-3">
        <div class="col-12 col-lg-3 col-md-3 mb-3 mb-md-0">
          <a href="{{ url('belipaketktg') }}">
            <div class="card">
              <div class="card-body px-3 py-3">
                <div class="row align-items-center">
                  <div class="col-3 pe-0">
                    <div class="icon-card bg-blue rounded-circle"><img src="{{ asset('image/global/Icon1.png') }}"
                        alt="" width="100%"></div>
                  </div>
                  <div class="col-9 ps-3">
                    <div class="fw-600 ml-2">Paket Tersedia</div>
                    <div class="fs-5 fw-bold text-blue mt-2 ml-2">{{ count($paket) }}</div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-12 col-lg-3 col-md-3 mb-3 mb-md-0">
          <a href="{{ url('paketsayaktg') }}">
            <div class="card">
              <div class="card-body px-3 py-3">
                <div class="row align-items-center">
                  <div class="col-3 pe-0">
                    <div class="icon-card bg-blue rounded-circle"><img src="{{ asset('image/global/Icon2.png') }}"
                        alt="" width="100%"></div>
                  </div>
                  <div class="col-9 ps-3">
                    <div class="fw-600 ml-2">Paket Saya</div>
                    <div class="fs-5 fw-bold text-blue mt-2 ml-2">{{ count($transaksi) }}</div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-12 col-lg-3 col-md-3 mb-3 mb-md-0">
          <a href="">
            <div class="card">
              <div class="card-body px-3 py-3">
                <div class="row align-items-center">
                  <div class="col-3 pe-0">
                    <div class="icon-card bg-blue rounded-circle"><i class="ti-file"></i></div>
                  </div>
                  <div class="col-9 ps-3">
                    <div class="fw-600 ml-2">Bank Soal</div>
                    <div class="fs-5 fw-bold text-blue mt-2 ml-2">1500+</div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-12 col-lg-3 col-md-3 mb-3 mb-md-0">
          <a href="">
            <div class="card">
              <div class="card-body px-3 py-3">
                <div class="row align-items-center">
                  <div class="col-3 pe-0">
                    <div class="icon-card bg-blue rounded-circle"><i class="ti-user"></i></div>
                  </div>
                  <div class="col-9 ps-3">
                    <div class="fw-600 ml-2">Total Pengguna</div>
                    <div class="fs-5 fw-bold text-blue mt-2 ml-2">1000+</div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-12 col-lg-3 col-md-3 d-flex mb-3 mb-md-0">
          <div class="card w-100">
            <div class="card-body px-3 py-3">
              <div class="fw-600 fs-6 mb-3">Gabung Grup Belajar</div>
              <a class="btn btn-primary bg-white border-blue text-blue rounded-pill text-white border-2 text-center d-block py-2 mx-4 text-xs px-0 mt-2"
                href="https://api.whatsapp.com/send/?phone=6285158891028&text=Halo+orang+dalam%21+Saya+ingin+bertanya+tentang...&type=phone_number&app_absent=0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 29 28" fill="none">
                  <path
                    d="M22.4013 6.17843C21.361 5.12764 20.1219 4.2945 18.7563 3.72759C17.3906 3.16069 15.9258 2.87138 14.4472 2.87653C8.25188 2.87653 3.20259 7.92583 3.20259 14.1211C3.20259 16.1068 3.72454 18.0358 4.70036 19.7378L3.11182 25.57L9.06885 24.0041C10.7141 24.9005 12.5636 25.3771 14.4472 25.3771C20.6425 25.3771 25.6918 20.3278 25.6918 14.1325C25.6918 11.1256 24.5231 8.30027 22.4013 6.17843ZM14.4472 23.4708C12.7679 23.4708 11.1226 23.017 9.68157 22.166L9.34117 21.9617L5.80099 22.8922L6.74277 19.4428L6.51583 19.091C5.58285 17.6011 5.08744 15.879 5.08615 14.1211C5.08615 8.96972 9.28444 4.77144 14.4358 4.77144C16.9321 4.77144 19.2809 5.74725 21.0396 7.51734C21.9105 8.38419 22.6006 9.41527 23.07 10.5508C23.5394 11.6863 23.7788 12.9038 23.7742 14.1325C23.7969 19.2839 19.5986 23.4708 14.4472 23.4708ZM19.5759 16.4813C19.2922 16.3451 17.9079 15.6643 17.6583 15.5622C17.3973 15.4714 17.2158 15.426 17.0229 15.6983C16.83 15.982 16.2967 16.6174 16.1379 16.799C15.979 16.9919 15.8088 17.0146 15.5251 16.867C15.2415 16.7309 14.3337 16.4245 13.2671 15.4714C12.4275 14.7225 11.8715 13.8034 11.7013 13.5198C11.5424 13.2361 11.6786 13.0886 11.8261 12.9411C11.9509 12.8163 12.1098 12.612 12.2459 12.4532C12.3821 12.2943 12.4388 12.1695 12.5296 11.988C12.6204 11.7951 12.575 11.6362 12.5069 11.5C12.4388 11.3639 11.8715 9.97958 11.6446 9.41225C11.4176 8.8676 11.1793 8.93568 11.0091 8.92434H10.4645C10.2716 8.92434 9.97659 8.99242 9.71561 9.27609C9.46598 9.55975 8.73979 10.2406 8.73979 11.6249C8.73979 13.0092 9.74965 14.3481 9.88581 14.5296C10.022 14.7225 11.8715 17.5592 14.6855 18.7733C15.3549 19.0683 15.8769 19.2385 16.2854 19.3633C16.9548 19.5789 17.5675 19.5449 18.0555 19.4768C18.6001 19.3974 19.7234 18.796 19.9504 18.1379C20.1886 17.4798 20.1886 16.9238 20.1092 16.799C20.0298 16.6742 19.8596 16.6174 19.5759 16.4813Z"
                    fill="#49C1BF"></path>
                </svg>
                <span class="button-title">WhatsApp (Gratis)</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-3 col-md-3 d-flex mb-3 mb-md-0">
          <div class="card w-100">
            <div class="card-body px-2 py-2">
              <div class="fw-600 mb-3 fs-6">Ikuti Kami</div>
              <div class="row">
                <div class="col text-center mb-2">
                  <a href="mailto:brainwave@gmail.com" class="social-link">
                    <img src="{{ asset('image/global/gmail.png') }}" style="height: 30px; margin-bottom: 5px;">
                    <div class="social-text">brainwave@gmail.com</div>
                  </a>
                </div>
                <div class="col text-center mb-2">
                  <a href="https://www.instagram.com/brainwave2025/" class="social-link">
                    <img src="{{ asset('image/global/ig-icon.svg') }}" style="height: 30px; margin-bottom: 5px;">
                    <div class="social-text">@brainwave2025</div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="col-12 col-lg-6 col-md-6 d-flex mb-3 mb-md-0">
          <a href="https://api.whatsapp.com/send/?phone=6285158891028&text&type=phone_number&app_absent=0"
            target="_blank" class="w-100">
            <div class="card bg-blue text-white w-100 banner-home">
              <div class="card-body px-4 py-4 w-50">
              </div>
            </div>
          </a>
        </div> --}}
        <!--<div class="col-12 col-lg-6 col-md-6 d-flex mb-3 mb-md-0">-->
        <!--  <div class="card bg-blue text-white w-100 banner-home">-->
        <!--    <div class="card-body px-4 py-4 w-50">-->
        <!--      <div class="fw-600 mb-2 fs-6">Konsultasi Belajar</div>-->
        <!--      <div class="text-sm mb-3">Belajar dan Berlatih lebih Mudah untuk Raih Cita-Citamu Bersama Dharma Raharja Edu</div>-->
        <!--      <a class="btn btn-primary bg-yellow text-white rounded-pill text-white text-center py-2 border-0 text-xs px-4 mt-2" href="https://api.whatsapp.com/send/?phone=6285158891028&text=Halo+orang+dalam%21+Saya+ingin+bertanya+tentang...&type=phone_number&app_absent=0">-->
        <!--        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 29 28" fill="none">-->
        <!--          <path d="M22.4013 6.17843C21.361 5.12764 20.1219 4.2945 18.7563 3.72759C17.3906 3.16069 15.9258 2.87138 14.4472 2.87653C8.25188 2.87653 3.20259 7.92583 3.20259 14.1211C3.20259 16.1068 3.72454 18.0358 4.70036 19.7378L3.11182 25.57L9.06885 24.0041C10.7141 24.9005 12.5636 25.3771 14.4472 25.3771C20.6425 25.3771 25.6918 20.3278 25.6918 14.1325C25.6918 11.1256 24.5231 8.30027 22.4013 6.17843ZM14.4472 23.4708C12.7679 23.4708 11.1226 23.017 9.68157 22.166L9.34117 21.9617L5.80099 22.8922L6.74277 19.4428L6.51583 19.091C5.58285 17.6011 5.08744 15.879 5.08615 14.1211C5.08615 8.96972 9.28444 4.77144 14.4358 4.77144C16.9321 4.77144 19.2809 5.74725 21.0396 7.51734C21.9105 8.38419 22.6006 9.41527 23.07 10.5508C23.5394 11.6863 23.7788 12.9038 23.7742 14.1325C23.7969 19.2839 19.5986 23.4708 14.4472 23.4708ZM19.5759 16.4813C19.2922 16.3451 17.9079 15.6643 17.6583 15.5622C17.3973 15.4714 17.2158 15.426 17.0229 15.6983C16.83 15.982 16.2967 16.6174 16.1379 16.799C15.979 16.9919 15.8088 17.0146 15.5251 16.867C15.2415 16.7309 14.3337 16.4245 13.2671 15.4714C12.4275 14.7225 11.8715 13.8034 11.7013 13.5198C11.5424 13.2361 11.6786 13.0886 11.8261 12.9411C11.9509 12.8163 12.1098 12.612 12.2459 12.4532C12.3821 12.2943 12.4388 12.1695 12.5296 11.988C12.6204 11.7951 12.575 11.6362 12.5069 11.5C12.4388 11.3639 11.8715 9.97958 11.6446 9.41225C11.4176 8.8676 11.1793 8.93568 11.0091 8.92434H10.4645C10.2716 8.92434 9.97659 8.99242 9.71561 9.27609C9.46598 9.55975 8.73979 10.2406 8.73979 11.6249C8.73979 13.0092 9.74965 14.3481 9.88581 14.5296C10.022 14.7225 11.8715 17.5592 14.6855 18.7733C15.3549 19.0683 15.8769 19.2385 16.2854 19.3633C16.9548 19.5789 17.5675 19.5449 18.0555 19.4768C18.6001 19.3974 19.7234 18.796 19.9504 18.1379C20.1886 17.4798 20.1886 16.9238 20.1092 16.799C20.0298 16.6742 19.8596 16.6174 19.5759 16.4813Z" fill="#fff"></path>-->
        <!--        </svg>-->
        <!--        <span class="button-title">Konsultasi Sekarang</span>-->
        <!--      </a>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
      </div>
      <!--<div class="row mt-4">-->
      <!--  <div class="col-12 col-lg-6 col-md-6 d-flex mb-3 mb-md-0">-->
      <!--    <div class="card w-100">-->
      <!--      <div class="card-body px-3 py-3">-->
      <!--        <div class="fw-600 mb-2 fs-6">Opening Untuk Penggunaan Apps</div>-->
      <!--        <div class="mb-3">Selamat Datang di Bimbel Dharma Raharja Edu. Belajar dan Berlatih lebih Mudah untuk Raih Cita-Cita CPNS & Kedinasan</div>-->
      <!--        <div class="embed-responsive embed-responsive-16by9">-->
      <!--          <iframe src="https://www.youtube.com/embed/y97iA8wb72M" class="embed-responsive-item rounded-4" frameborder="0" allowfullscreen="" allow="accelerometer; clipboard-write; encrypted-media; gyroscope;" data-v-4e57a0d3=""></iframe>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--  </div>-->
      <!-- Bagian Sangat Di Rekomendasikan disembunyikan -->
      <!-- <div class="col-12 col-lg-6 col-md-6 d-flex mb-3 mb-md-0">
          <div class="card w-100">
            <div class="card-body px-3 py-3">
              <div class="fw-600 mb-2 fs-6">Sangat Di Rekomendasikan!</div>
              <div class="mb-3">Dharma Raharja Edu menjadi Bimbel Populer di Indonesia, sudah Ramai direkomendasi oleh Para Lulusan Sekolah CPNS dan Kedinasan</div>
              <div class="embed-responsive embed-responsive-16by9">
                <iframe src="https://www.youtube.com/embed/ja9Eg1-Qhao" class="embed-responsive-item rounded-4" frameborder="0" allowfullscreen="" allow="accelerometer; clipboard-write; encrypted-media; gyroscope;" data-v-4e57a0d3=""></iframe>
              </div>
            </div>
          </div>
        </div> -->
    </div>

    {{-- <div class="row mt-5">
      @if(count($informasi) > 0)
      <div class="col-md-6">
        <h4 class="font-weight-bold mb-3">Informasi</h4>
        <!-- Bootstrap Carousel -->
        <div id="informasiCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
          <div class="carousel-inner">
            @foreach($informasi as $key)
            @php
            $link = $key->link ?? url('informasidtl') . '/' . Crypt::encrypt($key->id);
            @endphp
            <div class="carousel-item @if($loop->first) active @endif">
              <a href="{{ $link }}">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-5">
                        <img class="rounded" src="{{ asset($key->gambar) }}" alt=""
                          style="width: 100%; height: 150px; object-fit: fill">
                      </div>
                      <div class="col-7">
                        <h6>{{ $key->judul }}</h6>
                        <p>{{ $key->ket }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
          <!-- Carousel controls -->
          <button class="carousel-control-prev" type="button" data-bs-target="#informasiCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#informasiCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span the="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      @endif

      @if(count($voucher->where('is_visible', true)) > 0)
      <div class="col-md-6">
        <h4 class="font-weight-bold mb-3">Promo</h4>
        <div class="my-class">
          @foreach($voucher->where('is_visible', true) as $key)
          <a href="{{ url('profileuser') }}#vouchertab">
            <div class="card mb-3">
              <img class="rounded" src="{{ asset($key->gambar) }}" alt=""
                style="width: 100%; height: 187px; object-fit: fill">
            </div>
          </a>
          @endforeach
        </div>
      </div>
      @endif
    </div> --}}
  </div>
</div>
@endsection

@section('footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick-theme.css" />
<script src='https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js'>
</script>

<script>
  // Initialize tooltips
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })

  $(document).ready(function() {
    $('.slide-home').slick({
      infinite: true,
      slidesToShow: 1,
      dots: true,
      speed: 800,
      autoplay: true,
      autoplaySpeed: 2000,
      easing: 'linear',
      arrows: true,
      fade: false,
      pauseOnHover: true,
      swipe: true,
    });
  });

  $(document).ready(function() {
    $('.my-class').slick({
      infinite: true,
      slidesToShow: 1,
      dots: false,
      speed: 800,
      autoplay: true,
      autoplaySpeed: 2000,
      easing: 'linear',
      arrows: false,
      fade: false,
      pauseOnHover: true,
      swipe: true,
    });
  });
</script>
@endsection