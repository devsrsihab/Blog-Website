@extends('layouts.master')
@section('title','Post Edit ')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Post</h1>
    <a href="{{ url('admin/posts') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-eye fa-sm text-white-50 mr-2"></i>View Posts</a>
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

        <form action="{{ url('admin/updatePost/'.$posts->id) }}" method="post" >
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="categorie_id" class="col-sm-2 col-form-label">Categorie</label>
                <div class="col-sm-10">
                  <select class="form-control" id="categorie_id"name="categorie_id" id="categorie_id">
                    <option >Select Categories</option>
                    @foreach ($categories as $categorie )
                    <option value="{{ $categorie->id }}" {{ $posts->categorie_id == $categorie->id ? 'selected':'' }}>
                    {{ $categorie->name }}</option>
                        
                    @endforeach
                  </select>
                </div>
              </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name"  class="form-control" id="name" value="{{ $posts['name'] }}" >
                </div>
              </div>

            <div class="form-group row">
                <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                <div class="col-sm-10">
                  <input type="text" name="slug"  class="form-control" id="slug" value="{{ $posts['slug'] }}">
                </div>
              </div>

            <div class="form-group row">
                <label for="my_summernote" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="description" id="my_summernote" rows="3">{{ $posts['description'] }}</textarea>
                </div>
              </div>

            <div class="form-group row">
                <label for="yt_iframe" class="col-sm-2 col-form-label">Youtube Iframe LInk</label>
                <div class="col-sm-10">
                  <input type="text" name="yt_iframe"  class="form-control" id="yt_iframe" value="{{ $posts['yt_iframe'] }}">
                </div>
              </div>

              <hr>
              <h6 class="text-bold text-success ">SEO Tags</h6>
            <div class="form-group row">
                <label for="meta_title" class="col-sm-2 col-form-label">Meta Title</label>
                <div class="col-sm-10">
                  <input type="text" name="meta_title"  class="form-control" id="meta_title" value="{{ $posts['meta_title'] }}">
                </div>
              </div>

            <div class="form-group row">
                <label for="my_summernote2" class="col-sm-2 col-form-label">Meta Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="meta_description" id="meta_description" rows="3">{{ $posts['meta_description'] }}
                  </textarea>

                </div>
              </div>

            <div class="form-group row">
                <label for="meta_keyword" class="col-sm-2 col-form-label">Meta Keyword</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="meta_keyword" id="meta_keyword" rows="3">{{ $posts['meta_keyword'] }}</textarea>

                </div>
              </div>

              <hr>
              <h6 class="text-bold text-success">Status Mode</h6>

              <div class="form-group row align-items-center">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <input id="status" type="checkbox" name="status" {{ $posts->status ==  '1' ? 'checked':'' }}>

                </div>
              </div>

              <div class="form-group row align-items-center">
               <a href="{{ url('admin/posts') }}"  class="btn btn-danger px-5 mx-4 py-2 mt-3">Cancel</a>
               <button type="submit" class="btn btn-primary px-5 py-2 mt-3">Save Post</button>
              </div>
        </form>
    </div>
</div>
{{-- end card --}}


@endsection
