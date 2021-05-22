@extends('umum.template')

@section('title','About Us | Profil Company')

@section('content')

<div class="page-heading about-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Kecamatan</h4>
              <h2>Mangga Kulon</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Tentang Kami</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/pict-4.jpg" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Siapa Kami &amp; Apa yang Kami lakukan?</h4>
              <p>Kami memfasilitasi terkhusus untuk warga kecamatan Mangga kulon agar dapat melakukan pengaduan terkait dengan fakta yang real dan akurat <br>
              Sehingga dengan adanya sistem pengaduan ini diharapkan masyarakat lebih mudah untuk menyalurkan aspirasinya kepada kami (Pegawai Kecamatan Mangga Kulon)</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="team-members">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Pegawai Kecamatan Mangga Kulon</h2>
            </div>
          </div>
          @foreach($admins as $admin)
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="{{URL::to('/')}}/foto/{{$admin->foto}}" alt="">
              </div>
              <div class="down-content">
                <h4>{{$admin->nama}}</h4>
                <span>{{$admin->alamat}}</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div>
          @endforeach
      </div>
    </div>
@stop