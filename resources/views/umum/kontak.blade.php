@extends('umum.template')

@section('title','Kontak Kami')

@section('content')
<div class="page-heading contact-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="find-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Location on Maps</h2>
            </div>
          </div>
          <div class="col-md-8">
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
            <div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.2127257330585!2d108.54148231397042!3d-6.743887995124903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1ddadff18277%3A0x85ed7a7784d1d1bb!2sJl.%20Jend.%20Sudirman%2C%20Kec.%20Kesambi%2C%20Kota%20Cirebon%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1614962127738!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
          <div class="col-md-4">
            <div class="left-content">
              <h4>Tentang Kantor</h4>
              <p>jl.jendral sudirman,kesambi,cirebon jawa barat.<br></p>
              <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    
          <div class="col-md-4">
            <ul class="accordion">
              <li>
                  <a>Apa itu Pengaduan Masyarakat?</a>
                  <div class="content">
                      <p>Pengaduan Masyarakat merupakan situs yang sengaja diciptakan untuk bisa memberikan aspirasi kepada warga agar terciptanya desa yang makmur dan sejahtera .<br></p>
                  </div>
              </li>
              <li>
                  <a>Gimana Cara Kerjanya?</a>
                  <div class="content">
                      <p>1. Masyarakat Harus login terlebih dahulu, kemudian pilih menu formulir pengaduan sesuai dengan formatnya yaaa<br><br>2.Setelah, Terkirim Admin Akan Memproses pengduan tersebut. jika diterima maka akan ditampilkan ke berita di website kami, jika tidak akan ada pemberitahuan</p>
                  </div>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Happy Customers</h2>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-clients owl-carousel">
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="1">
              </div>
              
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="2">
              </div>
              
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="3">
              </div>
              
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="4">
              </div>
              
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="5">
              </div>
              
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="6">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @stop