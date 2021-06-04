@extends('superadmin.template.layout')
@section('title','Admin/Pengaduan' )
@section('content')
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Pengaduan</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Feature</a></li>
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
                                <h4 class="card-title">Data Export</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th width="10%">Nama</th>
                                                <th width="15%">Lokasi </th>
                                                <th width="10%">Foto</th>
                                                <th width="10%">Status</th>
                                                <th width="7%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Lokasi </th>
                                                <th>Foto</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($pengaduans as $pengaduan)
                                            <tr>
                                                <th>{{++$i}}</th>
                                                <td>{{{$pengaduan->MasyarakatModel->nama}}}</td>
                                                <td>{{{$pengaduan->lokasi}}} </td>
                                                <td><img width="100px" src="{{URL::to('/')}}/foto/{{$pengaduan->foto}}" href="URL::to('/')}}/foto/{{$pengaduan->foto}}" > </td>
                                                <td>{{{$pengaduan->status}}}</td>
                                                <td>
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$pengaduan->id_pengaduan}}" >Edit</button>
                                                <div style="float:right;">
                                                    <form form action="{{route('pengaduan.destroy', $pengaduan->id_pengaduan)}}" method="POST">
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
@foreach ($pengaduans as $pengaduan)
<!-- Modal Ubah Data  -->
<div id="edit{{$pengaduan->id_pengaduan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('pengaduan.update', $pengaduan->id_pengaduan)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Lengkap</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{$pengaduan->MasyarakatModel->nama}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Lokasi</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{$pengaduan->lokasi}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-8">        
                    <select class="input100" type="text" name="status">
                            <option disabled="" selected="" value="">--Pilih Jenis Status--</option>
                            <option value="Diterima">Diterima</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
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