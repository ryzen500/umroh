@extends('front.app')

@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Pengalaman Umroh<br>bersama Ahmad Umroh Tour</h1>
      <h2>Selamat datang di Biro Travel Ahmad Umroh Tour, penyelenggara perjalanan umroh yang berkomitmen memberikan pelayanan terbaik bagi para jamaahnya. Pendaftaran umroh bersama kami adalah langkah awal menuju perjalanan ibadah yang penuh makna dan kenyamanan</h2>
      <a href="{{ route('home.pendaftran') }}" class="btn-get-started">Daftar Sekarang</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{ asset('assets/front/img/about.jpeg') }}" class="img-fluid img-thumbnail" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content ">
            <h2>Tentang Kami</h2>
            <h3>
                Sekilas mengenai Ahmad Umroh Tour
            </h3>
            <p class="text-justify">            
              Pusat informasi Ahmad Umroh Tour, berlokasi di Rempoah, Kabupaten Banyumas, Jawa Tengah,menyediakan perjalanan umroh yang mengutamakan kenyamanan, keamanan, dan keselamatan jamaah dalam setiap perjalanan ibadah. Sejak berdiri, kami telah berkomitmen untuk memberikan layanan terbaik bagi para pelanggan kami, menciptakan pengalaman umroh yang berkesan dan tak terlupakan. kami memiliki visi dan misi Menjadi biro travel terkemuka yang memberikan pelayanan terbaik dalam perjalanan umroh, memberikan dampak positif bagi masyarakat, dan menjadi pilihan utama bagi para calon jamaah.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    <!--- fasilitas -->
    <section id="fasilitas">
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-12">
            <h2 class="font-weight-bold fc-grey">Fasilitas Kami</h2>
          </div>
        </div>
        <div class="row text-center my-5">
          <div class="col-lg-3 col-md-3 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/air-freight.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Tiket Pesawat</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/hotel.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Hotel Dekat Masjid</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/dish.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Makan 3x Sehari</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/visa.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Visa Umroh</span>
              </div>
            </div>
          </div>
          <!-- </div> -->
          <!-- <div class="row text-center my-5"> -->
          <div class="col-lg-3 col-md-3 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/bus.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Bus AC</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/islamic-friday-prayer.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Bimbingan Manasik</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/hunter.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Guide Handal</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/water.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Air Zam-Zam</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row text-center justify-content-center my-5">
  
          <div class="col-lg-3 col-md-4 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/tax.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Airport Tax</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/itinerary.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>City Tour</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/luggage.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Bagasi 20Kg</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- End #main -->
@endsection