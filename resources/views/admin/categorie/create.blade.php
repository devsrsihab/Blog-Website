@extends('layouts.master')
@section('title','Categories')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Categories</h1>
    <a href="{{ url('admin/categorie') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-eye fa-sm text-white-50 mr-2"></i>View Categories</a>
</div>

{{-- card --}}
<div class="card mt-4">
    <div class="card-header">
        <h5 class=" mb-0 text-gray-800">Add Categories</h5>
    </div>
    <div class="card-body">

      {{-- display errors --}}
      @if ($errors->any())
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          <div>{{$error}}</div>
        @endforeach
      </div>
        
      @endif

        <form action="{{ url('admin/addCategories') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name"  class="form-control" id="name" >
                </div>
              </div>
            <div class="form-group row">
                <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                <div class="col-sm-10">
                  <input type="text" name="slug"  class="form-control" id="slug" >
                </div>
              </div>
            <div class="form-group row">
                <label for="my_summernote" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="description" id="my_summernote" rows="3"></textarea>
                </div>
              </div>
            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                  <input type="file" name="image"  class="form-control-file" id="image" >
                </div>
              </div>
              <hr>
              <h6 class="text-bold text-success ">SEO Tags</h6>
            <div class="form-group row">
                <label for="meta_title" class="col-sm-2 col-form-label">Meta Title</label>
                <div class="col-sm-10">
                  <input type="text" name="meta_title"  class="form-control" id="meta_title" >
                </div>
              </div>
            <div class="form-group row">
                <label for="my_summernote2" class="col-sm-2 col-form-label">Meta Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="meta_description" id="meta_description" rows="3"></textarea>

                </div>
              </div>
            <div class="form-group row">
                <label for="meta_keyword" class="col-sm-2 col-form-label">Meta Keyword</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="meta_keyword" id="meta_keyword" rows="3"></textarea>

                </div>
              </div>
              <hr>
              <h6 class="text-bold text-success">Status Mode</h6>
              <div class="form-group row align-items-center">
                <label for="navbar_status" class="col-sm-2 col-form-label">Navbar Status</label>
                <div class="col-sm-10">
                  <input id="navbar_status" type="checkbox" name="navbar_status">

                </div>
              </div>
              <div class="form-group row align-items-center">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <input id="status" type="checkbox" name="status">

                </div>
              </div>
              <div class="form-group row align-items-center">
                <a href="{{ url('admin/categorie') }}"  class="btn btn-danger px-5 mx-4 py-2 mt-3">Cancel</a>
               <button type="submit" class="btn btn-primary px-5 py-2 mt-3">Submit</button>
              </div>
        </form>
    </div>
</div>
{{-- end card --}}


@endsection
