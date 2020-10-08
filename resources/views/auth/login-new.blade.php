@extends('layouts.empty', ['paceTop' => true, 'bodyExtraClass' => 'bg-white'])

@section('title', __('login-form.title'))

@section('content')
    <!-- begin login -->
    <div class="login login-with-news-feed">
        <!-- begin news-feed -->
        <div class="news-feed">
            <div class="news-image" style="background-image: url(/assets/img/login-bg/login-bg-11.jpg)"></div>
            <div class="news-caption">
                <h4 class="caption-title">{!!__('login-form.jumbotron')!!}</h4>
                {{__('login-form.jumbotron-description')}}
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
                    {{__('login-form.header')}}
                </h1>
            </div>
            <!-- end login-header -->
            <!-- begin login-content -->
            <div class="login-content">
                @if ($errors->any())
                    <div class="alert alert-danger fade show mb-4">
                        <span class="close" data-dismiss="alert">×</span>
                        {{__('login-form.error')}}
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
                <form method="POST" action="{{ route('login') }}" class="margin-bottom-0">
                    @csrf
                    <div class="form-group m-b-15">
                        <input name="email" type="email" class="form-control form-control-lg" placeholder="{{__('login-form.email-placeholder')}}" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                    </div>
                    <div class="form-group m-b-15">
                        <input type="password" class="form-control form-control-lg" placeholder="{{__('login-form.password-placeholder')}}" name="password" required autocomplete="current-password"/>
                    </div>
                    <div class="checkbox checkbox-css m-b-30">
                        <input name="remember" id="remember" type="checkbox"  {{ old('remember') ? 'checked' : '' }}/>
                        <label for="remember" onclick="changeCheckbox()">
                            {{__('login-form.remember-me')}}
                        </label>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">{!!__('login-form.signin-button')!!}</button>
                    </div>
                    <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                        {!!__('login-form.signup')!!}
                        <br>
                        <br>
                        {!!__('login-form.forgot-password')!!}
                    </div>
                    <hr />
                    <p class="text-center text-grey-darker mb-0">
                        {{__('login-form.footer')}}
                    </p>
                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end right-container -->
    </div>
    <!-- end login -->
@endsection

@push('scripts')
    <script>
        function changeCheckbox() {
            var value = $('#remember').val();
            if(value == 1){
                $('#remember').val(0);
            }else{
                $('#remember').val(1);
            }
        }
    </script>
@endpush
