@extends('layouts.app')
@section('title',"$categorie->meta_title")
@section('meta_description',"$categorie->meta_description")
@section('meta_keyword',"$categorie->meta_keyword")
@section('content')
<div class="container">
    <div class="row">
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="categorie_heading">
                <h6 class="text-uppercase">{{ $categorie->name }}</h6>
            </div>

            @forelse ($posts as $post )
            <div class="card card-shadow mt-4">
                <div class="card-body">
                    <a href="{{ url('tutorials/'.$categorie->slug.'/'.$post->slug) }}">
                        <h6 class="text-capitalize">{{ $post->name }}</h6>                    
                    </a>
                    <h6>
                        <span class="mr-3">Posted On: {{ $post->created_at->format('d-m-Y') }}</span>
                        <span class="">Created By: {{ $post->user->name }}</span>

                    </h6>
                </div>
            </div> 
            @empty
            <div class="card card-shadow mt-4"> 
                <div class="card-body">
                    <h4 class="text-danger">No Post Found</h4>
                </div>
            </div> 
            @endforelse
            <div class="my_pagination">
                {{ $posts->links() }}
             </div>
        </div>
        <div class="col-md-3">
            <div class="border p-2">
                <h4>Add Section</h4>

            </div>
        </div>
    </div>
</div>
@endsection