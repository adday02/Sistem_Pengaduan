@extends('umum.template')

@section('title','Berita Kami')

@section('content')
<!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>BERITA</h4>
              <h2>ADA BERITA APA SEKARANG?</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters-content">
                <div class="row grid">
                    @foreach($beritas as $berita)
                    <div class="col-lg-4 col-md-4 all des">
                      <div class="product-item">
                        <a href="#"><img src="{{URL::to('/')}}/foto/{{$berita->foto}}" alt=""></a>
                        <div class="down-content">
                          <a href="#"><h4>{{$berita->judul}}</h4></a>
                          <h6>{{$berita->tgl}}</h6>
                          <p>{{$berita->deskripsi}}</p>
                          <span>{{$berita->AdminModel->nama}}</span>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @stop