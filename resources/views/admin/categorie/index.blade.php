@extends('layouts.master')
@section('title','Categories')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h6 class="m-0 font-weight-bold text-primary">Categories Data</h6>
    <a href="{{ url('admin/addCategorie') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50  mr-2"></i>Add New Categorie</a>
</div>
{{-- deleteCategorie modal --}}
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="deleteCategorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <form action="{{ url('admin/deleteCategorie') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Categorie With Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="categorie_delete_id" id="categorie_id_input">
                    Are You Sure You Want To Delete This Categorie With Post
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cancel</button>  
                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                </div>
            </form>
        </div>


    </div>
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
                        <th>Categorie Name</th>
                        <th>Image</th>
                        <th>Navbar Status</th>
                        <th>Status</th>
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
                    @foreach ($categories as $key => $categorie )
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $categorie->name }}</td>
                        <td>
                            <img class="img-responsive img-fluid " style="width:50px;height:50px"
                                src="{{ asset('uploads/categorie/'.$categorie->image) }}" alt="categorie img">
                        </td>
                        <td>{{ $categorie->navbar_status == 1 ? 'Shown' : 'Hidden' }}</td>
                        <td>{{ $categorie->status == 1 ? 'Shown' : 'Hidden' }}</td>
                        <td>
                            <span class="mr-1"><a href="{{ url('admin/editCategorie/'.$categorie->id) }}"><i
                                        class="fa-regular fa-pen-to-square"></i></a></span>
                            {{-- <span class="mr-1"><a href="{{ url('admin/deleteCategorie/'.$categorie->id) }}"><i
                                class="fa-regular fa-trash-can"></i></a></span> --}}
                            <button class="btn text-danger deleteCategorie" value="{{ $categorie->id }}"><i
                                    class="fa-regular fa-trash-can"></i></button>

                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('.deleteCategorie').click(function (e) {
            e.preventDefault();

            let caregorie_id = $(this).val()
            $('#categorie_id_input').val(caregorie_id)

            $('#deleteCategorie').modal('show')
        })








    })

</script>
@endsection
