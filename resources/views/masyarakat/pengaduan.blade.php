@extends('masyarakat.template.layout')
@section('title','Masyarakat/Pengaduan' )
@section('content')
<div class="page-wrapper">
<!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Pengaduan</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Masyarakat</a></li>
                <li class="breadcrumb-item active">Pengaduan</li>
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
                        <h4 class="card-title">Pengaduan Masyarakat</h4>
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
                        <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >+ Tambah Pengaduan</button></div>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tangal</th>
                                        <th>Lokasi </th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Status</th>
                                        <th width="12%">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>No</th>
                                        <th>Tangal</th>
                                        <th>Lokasi </th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($pengaduan as $p)
                                    <tr>
                                       <td> {{++$i}}</td>
                                       <td> {{date('d-m-Y', strtotime($p->created_at))}}</td>
                                       <td> {{$p->lokasi}}</td>
                                        <td> {{$p->deskripsi}}</td>  
                                        <td> <img width="100px" src="{{URL::to('/')}}/foto/{{$p->foto}}" href="URL::to('/')}}/foto/{{$p->foto}}" > </td></td>
                                        <td> {{$p->status}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$p->id_pengaduan}}" >Edit</button>
                                                <div style="float:right;">
                                                    <form form action="{{route('pengaduan-ms.destroy', $p->id_pengaduan)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</i></a>
                                                    </form>
                                                </div>
                                                </td>
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
    </div>
</div>
 <div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
              <form action="{{route('pengaduan-ms.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="nik" value="{{auth()->user()->nik}}">

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Tanggal </label>
                    <div class="col-sm-8">        
                        <input type="date" name="tgl" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">lokasi</label>
                    <div class="col-sm-8">        
                        <input type="text" name="lokasi" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi</label>
                    <div class="col-sm-8">        
                        <input type="text" name="deskripsi" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" class="form-control" id="inputGroupFile01">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Pengaduan</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
@foreach ($pengaduan as $p)
<!-- Modal Ubah Data  -->
<div id="edit{{$p->id_pengaduan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('pengaduan-ms.update', $p->id_pengaduan)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Lokasi </label>
                    <div class="col-sm-8">
                        <input type="text" name="lokasi" class="form-control" value="{{ $p->lokasi }}" required>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi </label>
                    <div class="col-sm-8">
                        <input type="text" name="deskripsi" class="form-control" value="{{ $p->
                        deskripsi }}" required>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" select="{{$p->foto}}">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>             
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach
@endsection