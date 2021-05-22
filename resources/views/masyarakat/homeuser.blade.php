@extends('masyarakat.template.layout')
@section('title','Homeuser' )
@section('content')
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Selamat Datang {{auth()->user()->nama}}</h3> 
                    </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    
                    
                    
                    
                    <!-- /# column -->
                </div>
            </div>
        </div>
                <!-- /# row -->
          @endsection