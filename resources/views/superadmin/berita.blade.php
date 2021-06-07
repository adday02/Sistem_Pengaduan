@extends('superadmin.template.layout')
@section('title','Admin/Berita' )
@section('content')
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Berita</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Feature</a></li>
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
                                <h4 class="card-title">Data Export</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="15%">Nama Admin </th>
                                                <th width="10%">Judul</th>
                                                <th width="10%">Foto</th>
                                                <th width="7%">Tanggal</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="15%">Nama Admin </th>
                                                <th width="10%">Judul</th>
                                                <th width="10%">Foto</th>
                                                <th width="7%">Tanggal</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($beritas as $berita)
                                            <tr>
                                                <th>{{++$i}}</th>
                                                <td>{{{$berita->AdminModel->nama}}}</td>
                                                <td>{{{$berita->judul}}} </td>
                                                <td><img width="100px" src="{{URL::to('/')}}/foto/{{$berita->foto}}" href="URL::to('/')}}/foto/{{$berita->foto}}" > </td>
                                                <td>{{date('d-m-Y', strtotime($berita->created_at))}}</td>
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
@foreach ($beritas as $berita)
<!-- Modal Ubah Data  -->
<div id="edit{{$berita->id_berita}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('berita.update', $berita->id_berita)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Lengkap</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{$berita->AdminModel->nama}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Lokasi</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{$berita->lokasi}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-8">        
                    <select class="input100" type="text" name="jk" required>
                            <option disabled="" selected="" value="">--Pilih Jenis Status--</option>
                            <option value="laki-laki">Diterima</option>
                            <option value="perempuan">Ditolak</option>
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