@extends('layouts.landing')

@section('title',__("verification-success.title"))

@section('content')
    <div class="content-wrapper-area bg-white d-flex justify-content-between align-items-center">
        <!-- Logo--><a class="logo" href="/"><img class="img-responsive" src="{{asset("assets/biteye.svg")}}" width="250" alt="BitEye Logo"></a>
        <!-- Content-->
        <div class="main-content py-5">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-5 mb-5 mb-md-0"><img src="{{asset("assets/img/landing/bg-img/hero-4.png")}}" alt="BitEye User"></div>
                    <div class="col-12 col-md-6">
                        <h2>{!! __("verification-success.header") !!}</h2>
                        <p>{{__('verification-success.header-description')}}</p><a class="btn apland-btn" href="{{route('app')}}">{{__('verification-success.action-button')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Copwrite Area-->
        <div class="footer_bottom">
            <p>{!! __("verification-success.footer") !!}</a></p>
        </div>
    </div>
@endsection
