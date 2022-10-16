@extends('layouts.master')
@section('title','Categories')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h6 class="m-0 font-weight-bold text-primary">Categories Data</h6>

</div>

        {{-- ====================== --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="message">
                    @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        {{-- <tfoot class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Categorie Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            @foreach ($users as $key => $user )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->role_as==1)
                                        {{ 'Admin' }};
                                    @endif 
                                    @if ($user->role_as==2)
                                        {{ 'Editor' }};
                                    @endif 
                                    @if ($user->role_as==0)
                                        {{ 'Bloger' }};
                                    @endif 
                                    
                                 </td>
                                <td>{{ $user->created_at}}</td>
                                <td > 
                                    <span class="mr-1"><a href="{{ url('admin/editUser/'.$user->id) }}"><i class="fa-regular fa-pen-to-square"></i></a></span>

                                </td>
                            </tr> 
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
