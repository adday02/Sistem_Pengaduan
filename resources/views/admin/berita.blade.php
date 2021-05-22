@extends('admin.template.layout')
@section('title','Berita - Admin' )
@section('content')
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Berita</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Features</a></li>
                        <li class="breadcrumb-item active">Berita</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Berita</h4>
                                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                  <button type="button" class="close" data-dismiss="alert"aria-label="close">
                    <span aria-hidden= "true"></span>
                  </button>
                  <div>
                    @foreach ($errors->all() as $error)
                        {{$error}} <br>
                        @endforeach
                  </div>
                </div>
                @endif
                                <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Berita</button></div> 
                                <div class="clearfix"></div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Berita</th>
                                                <th>Deskripsi Berita</th>
                                                <th>Foto</th>
                                                <th>Posted On</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($berita as $b)
                                            <tr>
                                            <td>{{++$i}}</td>
                         
                                            
                                            <td>{{$b->judul}}</td>
                                            <td>{{$b->deskripsi}}</td>
                                            <td><img width="50 px" src="{{URL::to('/')}}/foto/{{$b->foto}}" class="fa-image" width="100px" href="URL::to('/')}}/foto/{{$b->foto}}" ></td></td>
                                            <td>{{date('d-m-Y', strtotime($b->created_at))}}</td>
                                                <td>
                                                <div style="float:left;">
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{$b->id_berita}}" >Edit</button>
                                                </div>
                                                
                                                <div style="float:right;">
                                                <form action="{{route('berita.destroy', $b->id_berita)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</i></a>
                                                </form>
                                                </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
        </div>
            <!-- End Container fluid  -->

        <!-- Modal tambah -->
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            
              <form action="{{route('berita.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf

                

                <input class="form-control" name="judul"type="text" placeholder="Judul Berita" required pattern=".{,20}" title="Judul Max 20 Karakter" ></br>
                <textarea class="form-control"name="deskripsi" type="text" placeholder="Deskripsi Berita" required pattern=".{,255}" title="Deskripsi Max 255 Karakter"></textarea></br>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" class="form-control" id="inputGroupFile01" required="" >
                        @if ($errors->has('foto'))
                                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                                @endif
                    </div>
                </div>
               
                
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Berita</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /Modal tambah -->

@foreach ($berita as $b)
<!-- Modal Ubah Data  -->
<div id="edit{{$b->id_berita}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            
            <div class="modal-header">
            
                <h5 class="modal-title" id="mediumModalLabel">Edit Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('berita.update', $b->id_berita)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                
                


                <div class="row form-group">
                    <label class="col-sm-4 control-label">Judul Berita</label>
                    <div class="col-sm-8">        
                        <input type="text" name="judul" class="form-control" value="{{ $b->judul}}" required>
                    </div>
                    @error('judul')
            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi Berita</label>
                    <div class="col-sm-8">
                    <input class="form-control"name="deskripsi" type="text" value="{{$b->deskripsi}}"></input></br>
                    </div>
                    @error('deskripsi')
            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
               
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" select="{{$b->foto}}">
                        @error('foto')
            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>

               

                

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>             
            </form>
            </div>        
        </div>
    </div>
</div>


<!-- Modal Edit -->

foreach ($berita as $b)
             <!--modal Detail-->
    <div class="modal fade" id="detail-data{{$b->id_berita}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <img  align:center; src="{{URL::to('/')}}/foto/{{$b->foto}}" class="fa-image" width="100px" href="URL::to('/')}}/foto/{{$b->foto}}" >
            </div>
            <h5 class="modal-title" id="exampleModalLabel">Detail Berita</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="card">
          <div class="row form-group">
                    <label class="col-sm-4 control-label">ID Berita</label>
                    <div class="col-sm-8">        
                        <input type="text" name="id_berita" class="form-control" value="{{ $b->id_berita}}" readonly>
                    </div>
                </div>

                 <div class="row form-group">
                    <label class="col-sm-4 control-label">Author</label>
                    <div class="col-sm-8">        
                        <input type="text" name="id_admin" class="form-control" value="{{ $b->id_admin}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Judul Berita</label>
                    <div class="col-sm-8">        
                        <input type="text" name="judul" class="form-control" value="{{ $b->judul}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi Berita</label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="deskripsi" readonly>{{$b->deskripsi}}</textarea>
                    </div>
                </div>

               

                
              
               
            <br>
              
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
@endforeach
@endsection

