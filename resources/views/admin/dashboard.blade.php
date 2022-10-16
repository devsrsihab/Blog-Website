@extends('layouts.master')
@section('title','Dashboard')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Categories Card  -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-decoration-none" href="{{ url('admin/categorie') }}">        
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Categories (Total)</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $categories }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- Posts Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-decoration-none" href="{{ url('admin/posts') }}">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Posts (Total)</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $posts }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-regular fa-clipboard fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>        
        </a>
    </div>

    @if (Auth::check() && Auth::user()->role_as == '1')

    <!-- Blogger Card  -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-decoration-none" href="{{ url('admin/users') }}">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Blogger (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $normal_users }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>        
        </a>

    </div>
    <!-- Admin Card  -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-decoration-none" href="{{ url('admin/users') }}">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Admin (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admin_users }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>        
        </a>
    </div>
    <!-- Editors  Card  -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-decoration-none" href="{{ url('admin/users') }}">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Editors (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $editor_users }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-brands fa-hive fa-2x text-gray-300"></i>
    
                        </div>
                    </div>
                </div>
            </div>        
        </a>
    </div>
    @endif


</div>
@endsection
