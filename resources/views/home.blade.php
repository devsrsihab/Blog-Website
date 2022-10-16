@extends('layouts.app')
@section('title',"The SRS Home")
@section('meta_description',"This is SRS Website || SRS Website Provides You The Best Service")
@section('meta_keyword',"The Best Online Selling Course Company")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    @if (session('message'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    @php
                        $user_id = Auth::user()->id;
                        $user = App\Models\User::find($user_id);
                    @endphp
                    <h4>Hello <span class="text-danger text-bold text-uppercase">-></span> <span class="text-success text-uppercase">{{ $user->name }}</span></h4>
                    @if (session('normal_role'))
                        <div class="alert alert-success" role="alert">
                            {{ session('normal_role') }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
