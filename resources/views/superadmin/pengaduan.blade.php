@extends('admin.template.layout')
@section('title','Admin/Pengaduan' )
@section('content')
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Masyarakat</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                        <li class="breadcrumb-item active">Masyarakat</li>
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
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tangal</th>
                                                <th>Lokasi </th>
                                                <th>Deskripsi</th>
                                                <th>Foto</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>No</th>
                                                <th>Nama</th>
                                                <th>Tangal</th>
                                                <th>Lokasi </th>
                                                <th>Deskripsi</th>
                                                <th>Foto</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <th>1</th>
                                                <td>Adday Agung Alfayni</td>
                                                <td>18 April 2021</td>
                                                <td>Jl. Lohbener lama </td>
                                                <td>Banyak sekali jalan berlubang </td>
                                                <td> </td>
                                                <td> Sedang dalam proses </td>
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