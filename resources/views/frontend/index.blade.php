@extends('layouts.app')
@section('title',"$setting->meta_title")
@section('meta_description',"$setting->meta_description")
@section('meta_keyword',"$setting->meta_keyword")
@section('content')

<div class="bg-success py-5">
    <div class="container mx-auto">
        <div class="row ">
            <div class="col-md-12">
                <div class="owl-carousel categorie_carousel owl-theme">
                    @foreach ( $all_categories as $cate_item )

                    <div class="item">
                        <a class="text-decoration-none " href="{{ url('tutorials/'.$cate_item->slug) }}">
                            <div class="card shadow">
                                <img src="{{ asset('uploads/categorie/'.$cate_item->image) }}" alt="category-img">
                                <div class="card-body">
                                    <h6 class="card-title text-dark text-bold text-uppercase text-center">{{ $cate_item->name }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>


<div class="py-1 bg-gray">
    <div class="container">
        <div class="border py-3 text-center">
            <h4>Advertising Area</h4>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5>SRS Website </h5>
                <div class="underline"></div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur tempora adipisci, amet
                    excepturi provident nobis rerum quia quae pariatur doloremque eos facere. Lorem ipsum dolor sit amet
                    consectetur adipisicing elit. Quisquam optio laboriosam inventore natus et, praesentium recusandae
                    sapiente minus earum, molestiae at eum. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Dolor libero atque nesciunt esse quae eveniet suscipit, odio nostrum nihil iste officiis cum.</p>
            </div>
        </div>
    </div>
</div>

{{-- categorie  --}}
<div class="py-5 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5>All Categories</h5>
                </h5>
                <div class="underline"></div>
            </div>
            @foreach ($all_categories as $cate_item )
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <a class="text-decoration-none" href="{{ url('tutorials/'.$cate_item->slug) }}">
                            <h6 class="text-dark  text-uppercase">{{ $cate_item->name }}</h6>
                        </a>
                    </div>
                </div>
            </div>

            @endforeach
          </div>
    </div>
</div>

{{-- latest post  --}}
<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ml-3">
                <h5>Latest Posts</h5>
                </h5>
                <div class="underline"></div>
            </div>
          </div>
          <div class="row ">
            <div class="col-md-6">
                @foreach ($latest_posts as $latest_post )
                <div class="col-md-12 ">
                    <div class="card card-body bg-gray mb-2">
                            <a class="text-decoration-none" href="{{ url('tutorials/'.$latest_post->categorie->name .'/'.$latest_post->slug) }}">
                                <h6 class="text-dark  text-calitalize">{{ $latest_post->name }}</h6>
                            </a>
                            <h6 class="text-danger">Post On: {{ $latest_post->created_at->format('d-m-Y') }}</h6>
                    </div>
                </div>    
                @endforeach
            </div>
            <div class="col-md-6">
                    <div class="border py-2 text-center">
                        <h4>Advertising Area</h4>
    
                    </div>
            </div>
          </div>
    </div>
</div>



@endsection
