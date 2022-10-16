@extends('layouts.master')
@section('title','Posts View')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h6 class="m-0 font-weight-bold text-primary">Categories Data</h6>
    <a href="{{ url('admin/addPost') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50  mr-2"></i>Add Post</a>
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
                                <th>Categorie</th>
                                <th>Post Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        {{-- <tfoot class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Categorie</th>
                                <th>Post Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            @foreach ($posts as $key => $post )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $post->categorie->name }}</td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->status == 1 ? 'Shown' : 'Hidden' }}</td>
                                <td > 
                                    <span class="mr-1"><a href="{{ url('admin/editPost/'.$post->id) }}"><i class="fa-regular fa-pen-to-square"></i></a></span>
                                    <span class="mr-1"><a href="{{ url('admin/deletePost/'.$post->id) }}"><i class="fa-regular fa-trash-can"></i></a></span>

                                </td>
                            </tr> 
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
