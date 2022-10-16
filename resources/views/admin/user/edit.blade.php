@extends('layouts.master')
@section('title','Categories')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h6 class="m-0 font-weight-bold text-primary">User Edit</h6>
    <a href="{{ url('admin/users') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50  mr-2"></i>Back</a>
</div>

{{-- card --}}
<div class="card mt-4">
    <div class="card-header">
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

        <form action="{{ url('admin/updateUser/'.$users->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="my-3">
                <label for="name">Name</label>
                <p id="name " class="form-control" >{{ $users->name  }}</p>

            </div>
            <div class="my-3">
                <label for="email ">Email</label>
                <p id="email " class="form-control" >{{ $users->email  }}</p>
            </div>
            <div class="my-3">
                <label for="role_as">Role</label>
                <select name="role_as" value="" class="form-control">
                    <option value="--Select--">--Select--</option>
                    <option value="1" {{ $users->role_as == '1' ? 'selected' : ''}}>Admin</option>
                    <option value="0" {{ $users->role_as == '0' ? 'selected' : ''}}>Blogger</option>
                    <option value="2" {{ $users->role_as == '2' ? 'selected' : ''}}>Editor</option>


                </select>
            </div>
            <div class="my-3">
                <label for="created_at">Created At</label>
                <p id="created_at " class="form-control" >{{ $users->created_at->format('d-m-Y') }}</p>

            </div>

              <div class="form-group row align-items-center">
               <a href="{{ url('admin/users') }}" class="btn btn-danger px-5 mx-4 py-2 mt-3">Cancel </a>
               <button type="submit" class="btn btn-primary px-5 py-2 mt-3">Update </button>
              </div>
        </form>
    </div>
</div>
{{-- end card --}}
@endsection
