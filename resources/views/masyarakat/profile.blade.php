@extends('masyarakat.template.layout')
@section('title','Masyarakat/Profile' )
@section('content')
<div class="page-wrapper">
<!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Mohamad Riko</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Masyarakat</a></li>
                <li class="breadcrumb-item active">Profile</li>
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
                        <div class="table-responsive m-t-40">
                            <form action="" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                            <div class="col-auto">
                                    <label class="col-form-label">NIK</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" value ="1234567890123456" readonly>
                                </div>
                                
                                <div class="col-auto">
                                    <label class="col-form-label">Password</label>
                                </div>
                                <div class="col-auto">
                                    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" value ="12345678">
                                </div>

                                <div class="col-auto">
                                    <label class="col-form-label">Nama Lengkap</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" value ="Mohamad Riko">
                                </div>

                                <div class="col-auto">
                                    <label class="col-form-label">Jenis Kelamin</label>
                                </div>
                                <div class="col-sm-8">        
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Laki-laki
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Perempuan
                                    </label>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <label class="col-form-label">No HP</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" value ="123456789012">
                                </div>

                                <div class="col-auto">
                                    <label class="col-form-label">Alamat</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" value ="Bangir, Indramayu">
                                </div>

                                <div class="col-auto">
                                    <label class="col-form-label">Foto</label>
                                </div>
                                <div class="col-sm-8">        
                                    <input type="file" name="foto">
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
        </div>
    </div>
</div>
@endsection