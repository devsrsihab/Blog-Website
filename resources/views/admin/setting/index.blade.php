@extends('layouts.master')
@section('title','Posts View')
@section('content')

<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="m-0 font-weight-bold text-primary">Websites Settings</h6>

    </div>

    <div class="row">
        <div class="message">
            @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="card card-body">
                <form action="{{ url('admin/settings') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="mb-3" for="website_name">Website Name</label>
                                <input type="text" class="form-control" id="website_name" name="website_name" required value=" @if ($setting) {{ $setting->website_name }} @endif ">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="mb-3" for="logo">Logo</label>
                                <input type="file" class="form-control-file" id="logo" name="logo">
                                <img class="my-3 " style="width:100px;height:100px" src="{{ url('uploads/settings/'.$setting->logo) }}" alt="logo">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="mb-3" for="favicon">Favicon</label>
                                <input type="file" class="form-control-file" id="favicon" name="favicon">
                                <img class="my-3" src="{{ url('uploads/settings/'.$setting->favicon) }}" alt="logo">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="mb-3" for="description">Description</label>
                                <textarea type="text" class="form-control" id="description" name="description" rows="6">@if ($setting) {{ $setting->description }} @endif</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="mb-3" for="meta_title">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" required value="@if ($setting) {{ $setting->meta_title }} @endif">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="mb-3" for="meta_keyword">Meta Keyword</label>
                                <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" required value="@if ($setting) {{ $setting->meta_keyword }} @endif">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="mb-3" for="meta_description">meta_description</label>
                                <textarea type="text" class="form-control" id="meta_description" name="meta_description" rows="6">@if ($setting) {{ $setting->meta_description }} @endif </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary px-5 py-2">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





@endsection
