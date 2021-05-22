@extends('umum.template')

@section('title','Kontak Kami')

@section('content')
<div class="page-heading contact-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
            <h4>KONTAK KAMI</h4>
              <h2>HUBUNGI KAMI SEKARANG</h2>
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
              <h2>LOKASI MAPS</h2>
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
              <h4>Alamat Kantor</h4>
              <p>Jl. Jeruk No. 27 Kelurahan Mangga Kec. Mangga Kulon Kab. Indramayu<br></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  @stop