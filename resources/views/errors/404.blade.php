
@extends('layouts.landing')

@section('title',__("404.title"))

@section('content')
    <!-- Content Wrapper Area-->
    <div class="content-wrapper-area bg-white d-flex justify-content-between align-items-center">
      <!-- Logo--><a class="logo" href="../pages/landing/index.html"><img class="img-responsive" src="{{asset("assets/biteye.svg")}}" width="250" alt="Logo BitEye"></a>
      <!-- Content-->
      <div class="main-content pt-5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 col-md-6 mb-5"><img src="{{asset('/assets/img/landing/bg-img/404.png')}}" alt="404"></div>
            <div class="col-12 col-md-6 mb-5">
              <h2>{!! __("404.header") !!}</h2>
              <p>{{__('404.header-description')}}</p><a class="btn apland-btn" href="/">{{__('404.action-button')}}</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer Copwrite Area-->
      <div class="footer_bottom text-center">
          <p>{!! __("404.footer") !!}</p>
      </div>
    </div>
@endsection
