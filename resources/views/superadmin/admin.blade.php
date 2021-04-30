@extends('superadmin.template.layout')
@section('title','Admin' )
@section('content')
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Admin</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                        <li class="breadcrumb-item active">Admin</li>
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
                                <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >+ Tambah Admin</button></div> 
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width = "5%">No</th>
                                                <th width="35%">Nama</th>
                                                <th width="30%">Alamat</th>
                                                <th width="15">Foto</th>
                                                <th width="15%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th >Foto</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($admins as $admin)
                                            <tr>
                                            <td >{{++$i}}</td>
                                            <td >{{$admin->nama}}</td>
                                            <td >{{$admin->alamat}}</td>
                                            <td  ><img width="100px" src="{{URL::to('/')}}/foto/{{$admin->foto}}" href="URL::to('/')}}/foto/{{$admin->foto}}" ></td>
                                            <td >
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$admin->id_admin}}" >Edit</button>
                                                <div style="float:right;">
                                                    <form form action="{{route('admin.destroy', $admin->id_admin)}}" method="POST">
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
            <!-- End Container fluid  -->

<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
              <form action="{{route('admin.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row form-group">
                    <label class="col-sm-4 control-label">ID admin</label>
                    <div class="col-sm-8">        
                        <input type="text" name="id_admin" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">        
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama admin</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" required>
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
                  <button type="submit" class="btn btn-primary">Tambah admin</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /Modal tambah -->

@foreach ($admins as $admin)
<!-- Modal Ubah Data  -->
<div id="edit{{$admin->id_admin}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('admin.update', $admin->id_admin)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama admin</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{ $admin->nama}}" required>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Password </label>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control" value="{{ $admin->password }}" required>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $admin->alamat }}" required>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" select="{{$admin->logo}}">
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

@foreach ($admins as $admin)
<!-- Modal Ubah Data  -->
<div id="detail{{$admin->id_admin}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              <img  align:center; src="{{URL::to('/')}}/logo/{{$admin->logo}}" class="fa-image" width="100px" href="URL::to('/')}}/logo/{{$admin->logo}}" >
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('admin.update', $admin->id_admin)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">ID admin</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{ $admin->id_admin}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama admin</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{ $admin->nama}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" value="{{ $admin->email }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Link Website</label>
                    <div class="col-sm-8">
                        <input type="text" name="website" class="form-control" value="{{ $admin->website }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $admin->alamat }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi </label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="deskripsi" readonly>{{$admin->deskripsi}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>             
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach