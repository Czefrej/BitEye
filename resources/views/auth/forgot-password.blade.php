@extends('layouts.empty', ['paceTop' => true, 'bodyExtraClass' => 'bg-white'])

@section('title', __('recover-password-form.title'))

@section('content')
    <!-- begin login -->
    <div class="login login-with-news-feed">
        <!-- begin news-feed -->
        <div class="news-feed">
            <div class="news-image" style="background-image: url(/assets/img/login-bg/login-bg-3.jpg)"></div>
            <div class="news-caption">
                <h4 class="caption-title">{!!__('recover-password-form.jumbotron')!!}</h4>
                {{__('recover-password-form.jumbotron-description')}}
            </div>
        </div>
        <!-- end news-feed -->
        <!-- begin right-content -->
        <div class="right-content">
            <!-- begin login-header -->
            <div class="login-header">
                <div class="row m-b-20 text-center d-md-block ">
                    <img class="img-responsive center-block d-block mx-auto" src="{{asset('assets/biteye.svg')}}" alt="logo" height="50px">
                </div>
                <div class="row m-b-20 text-center d-xs-none d-sm-none">
                    <img class="img-responsive center-block d-block mx-auto" src="{{asset('assets/biteye.svg')}}" alt="logo" width="200px">
                </div>

                <h1 class="register-header">
                    {{__('recover-password-form.header')}}
                </h1>
            </div>
            <!-- end login-header -->
            <!-- begin login-content -->
            <div class="login-content">
                @if ($errors->any())
                    <div class="alert alert-danger fade show mb-4">
                        <span class="close" data-dismiss="alert">×</span>
                        {{__('recover-password-form.error')}}
                        <br>
                        <span role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="black">{{$error}}</li>
                                @endforeach
                            </ul>
                        </span>
                    </div>
                @endif
                @if(session('status'))
                    <div class="alert alert-success fade show mb-4">
                        <span class="close" data-dismiss="alert">×</span>
                        {{__('recover-password-form.success')}}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}" class="margin-bottom-0">
                    @csrf
                    <div class="form-group m-b-15">
                        <input name="email" type="email" class="form-control form-control-lg" placeholder="{{__('recover-password-form.email-placeholder')}}" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">{!!__('recover-password-form.signin-button')!!}</button>
                    </div>
                    <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                        {!!__('recover-password-form.signup')!!}
                        <br>
                        <br>
                    </div>
                    <hr />
                    <p class="text-center text-grey-darker mb-0">
                        {{__('recover-password-form.footer')}}
                    </p>
                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end right-container -->
    </div>
    <!-- end login -->
@endsection

