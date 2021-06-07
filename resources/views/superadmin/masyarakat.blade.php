@extends('superadmin.template.layout')
@section('title','masyarakat' )
@section('content')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Masyarakat</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item active">Masayrakat</li>
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
                        <h4 class="card-title">Data Export</h4>
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
                        <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >+ Tambah Masyarakat</button></div> 
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width = "5%">No</th>
                                        <th width="25%">Nama</th>
                                        <th width="10%">JK</th>
                                        <th width="10%">No HP</th>
                                        <th width="15%">Alamat</th>
                                        <th width="10">Foto</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>JK</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @foreach($masyarakats as $masyarakat)
                                    <tr>
                                    <td >{{++$i}}</td>
                                    <td >{{$masyarakat->nama}}</td>
                                    <td >{{$masyarakat->jk}}</td>
                                    <td >{{$masyarakat->no_hp}}</td>
                                    <td >{{$masyarakat->alamat}}</td>
                                    <td  ><img width="100px" src="{{URL::to('/')}}/foto/{{$masyarakat->foto}}" href="URL::to('/')}}/foto/{{$masyarakat->foto}}" ></td>
                                    <td >
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$masyarakat->nik}}" >Edit</button>
                                        <div style="float:right;">
                                            <form form action="{{route('masyarakat.destroy', $masyarakat->nik)}}" method="POST">
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
        <!-- End PAge Content -->
    </div>
</div>

 <div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah Masyarakat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
              <form action="{{route('masyarakat.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row form-group">
                    <label class="col-sm-4 control-label">NIK</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nik" class="form-control" required pattern="[0-9]{16}" title="Masukkan NIK harus 16 Karakter Nomor">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">        
                        <input type="password" name="password" class="form-control" required pattern=".{8,}" title="Masukkan password min 8 karakter">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Lengkap</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" required pattern="[a-zA-Z\s]+" title="Masukkan nama admin hanya dengan Abjad">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Kelamin</label>
                    <div class="col-sm-8">        
                    <select class="input100" type="text" name="jk" required>
                            <option disabled="" selected="" value="">--Pilih Jenis Kelamin--</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">No HP </label>
                    <div class="col-sm-8">
                        <input type="text" name="no_hp" class="form-control" required pattern="[0-9]+" title="Masukkan No HP hanya dengan Angka, Min 11 Max 13">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" class="form-control" id="inputGroupFile01">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Masyarakat</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /Modal tambah -->
@foreach ($masyarakats as $masyarakat)
<!-- Modal Ubah Data  -->
<div id="edit{{$masyarakat->nik}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit masyarakat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('masyarakat.update', $masyarakat->nik)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">NIK</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nik" class="form-control" value="{{$masyarakat->nik}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">        
                        <input type="password" name="password" class="form-control" value="{{$masyarakat->password}}" required pattern=".{8,}" title="Masukkan password min 8 karakter">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Lengkap</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{$masyarakat->nama}}" required pattern="[a-zA-Z\s]+" title="Masukkan nama admin hanya dengan Abjad">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">No HP </label>
                    <div class="col-sm-8">
                        <input type="text" name="no_hp" class="form-control" value="{{$masyarakat->no_hp}}" required>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{$masyarakat->alamat}}" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" class="form-control" id="inputGroupFile01">
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