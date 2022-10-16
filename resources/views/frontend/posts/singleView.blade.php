@extends('layouts.app')
@section('title',"$posts->meta_title")
@section('meta_description',"$posts->meta_description")
@section('meta_keyword',"$posts->meta_keyword")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="post_heading">
                <h6 class="text-uppercase">{!! $posts->name !!}</h6>
            </div>
            <div class="mt-2 breadcum">
                <h6 class="text-capitalize">Category: <span >{{ $posts->categorie->name  }}</span></h6>
            </div>


            <div class="card card-shadow mt-4">
                <div class="card-body">
                    {!! $posts->description !!}
                </div>
            </div> 

        </div>
        <div class="col-md-3">

            <div class="card mt-3">
                <div class="card-header">
                    <h4>Latest Post</h4>
                </div>
                <div class="card-body sinle_post_description">
                    @foreach ($latest_posts as $latest_post )
                    <a href="{{ url('tutorials/' . $latest_post->categorie->slug . '/'. $latest_post->slug ) }}" class="my-3 d-block">
                        <h6> >>{{ $latest_post->name }}</h6>
                    </a>                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="comment_area mt-4">
                @if (session('message'))
                    <div class="alert alert-warning">{{ session('message') }}</div>
                @endif
                @if (session('sub_comment'))
                    <div class="alert alert-success">{{ session('sub_comment') }}</div>
                @endif
                <div class="card card-body">
                    <h6 class="card-title">Leave a Comment</h6>
                    <form action="{{ url('comments') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_slug" value="{{ $posts->slug }}">
                        <textarea class="form-control" name="comment_body" rows="5" required></textarea>
                        <button class="btn btn-primary mt-2" type="submit" >Submit</button>
                    </form>
                </div>

                @forelse ($posts->comments as $comment )
                    

                <div class="comment_container card card-body shadow mt-3">
                    <div class="details_area">
                        <h5 class="user_name mb-1">
                            @if ($comment->userfu)
                            {{ $comment->userfu->name }}  
                            @else 
                            Unkown                               
                            @endif
                                <small class="mx-3 text-primary">Comment on: {{ $comment->created_at->format('d-m-Y') }}</small>    
                            </h5>
                            <p class="user_comment mb-1">
                                {{ $comment->comment_body }}

                            </p>
                    </div>
                </div>
                @if (Auth::check() && Auth::id()==$comment->user_id)
                <div class="mt-3">
                    <a class="btn btn-success "><i class="fa-regular fa-pen-to-square"></i></a>
                    <button type="button" value="{{ $comment->id }}" class="btn btn-danger deletecomment"><i class="fa fa-trash"></i></a>
                </div>  
                @endif
        

                @empty
                    <h5 class="text-danger">No Comments Found</h5>
                @endforelse

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $(document).on('click', '.deletecomment',function(){

              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (confirm('Are you sure you want to delete this comment'))
             {
                var thisClicked = $(this);
                var comment_id = thisClicked.val();

                $.ajax({
                    type: "POST",
                    url: "/delete-comment",
                    data: {'comment_id' : comment_id },
                    success : function(res){
                        if (res.status == 200) {
                            thisClicked.closest('.comment_container').remove();
                            alert(res.message);
                        }
                        else
                        {
                            alert(res.message);
                        }
                    }
                })






            }
        });

    });
</script>
@endsection