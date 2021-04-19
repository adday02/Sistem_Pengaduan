@extends('admin.template.layout')
@section('title','Berita' )
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
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Berita</th>
                                                <th>Deskripsi Berita</th>
                                                <th>Lokasi</th>
                                                <th>Foto</th>
                                                <th>Author</th>
                                                <th>Posted On</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>1</th>
                                                <td>Kilang Minyak Terbakar</td>
                                                <td>Kilang minyak terbakar, diduga tersambar petir. sampai saat ini api masih menyala, tidak memakan korban jiwa. hanya saja ada pelancong yang sengaja lewat, kemudian terkena api tersebut</td>
                                                <td>Indramayu, Balongan Jawa Barat</td>
                                                <td></td>
                                                <td>Adday Agung Alfayni</td>
                                                <td> 3-10-2021</td>
                                                <td>
                                                <div style="float:left;">
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#" >Edit</button>
                                                </div>
                                                    <form action="#" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</i></a>
                                                    </form>
                                                </td>
                                            </tr>
                                            
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
            @endsection