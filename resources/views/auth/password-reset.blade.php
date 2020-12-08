@extends('layouts.empty', ['paceTop' => true, 'bodyExtraClass' => 'bg-white'])

@section('title', __('password-reset-form.title'))

@section('content')
    <!-- begin register -->
    <div class="register register-with-news-feed">
        <!-- begin news-feed -->
        <div class="news-feed">
            <div class="news-image" style="background-image: url(/assets/img/login-bg/login-bg-2.jpg)"></div>
            <div class="news-caption">
                <h4 class="caption-title">{!! __('password-reset-form.jumbotron') !!}</h4>
                <p>
                    {!! __('password-reset-form.jumbotron-description') !!}
                </p>
            </div>
        </div>
        <!-- end news-feed -->
        <!-- begin right-content -->
        <div class="right-content">
            <!-- begin register-header -->
            <div class="row m-b-20 text-center d-md-block ">
                <img class="img-responsive center-block d-block mx-auto" src="{{asset('assets/biteye.svg')}}" alt="logo" height="50px">
            </div>
            <div class="row m-b-20 text-center d-xs-none d-sm-none">
                <img class="img-responsive center-block d-block mx-auto" src="{{asset('assets/biteye.svg')}}" alt="logo" width="200px">
            </div>
            <h1 class="register-header">
                {{__('password-reset-form.header')}}
                <small>{{__('password-reset-form.reset-header')}}</small>
            </h1>
            <!-- end register-header -->
            <!-- begin register-content -->
            <div class="register-content">
                @if ($errors->any())
                    <div class="alert alert-danger fade show mb-4">
                        <span class="close" data-dismiss="alert">×</span>
                        {{__('password-reset-form.error')}}
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
                <form action="{{ route('password.update') }}" method="POST" class="margin-bottom-0">
                    @csrf
                    <label class="control-label">{{__('password-reset-form.email-label')}} <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input id="email" name="email" type="email" class="form-control" value="{{request()->email}}" placeholder="{{__('password-reset-form.email-placeholder')}}" required autocomplete="email"/>
                        </div>
                    </div>
                    <label class="control-label">{{__('password-reset-form.password-label')}} <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input id="password" name="password" type="password" class="form-control" placeholder="{{__('password-reset-form.password-placeholder')}}" required autocomplete="new-password"/>
                        </div>
                    </div>
                    <label class="control-label">{{__('password-reset-form.repassword-label')}} <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="{{__('password-reset-form.repassword-placeholder')}}" required autocomplete="new-password"/>
                        </div>
                    </div>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input id="token" name="token" value="{{request()->token}}" type="text" class="form-control" hidden/>
                        </div>
                    </div>
                    <div class="register-buttons">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">{{__('password-reset-form.reset-button')}}</button>
                    </div>
                    <div class="m-t-30 m-b-30 p-b-30">
                        {!! __('password-reset-form.reset')!!}
                    </div>
                    <hr />
                    <p class="text-center text-grey-darker mb-0">
                        {{__('password-reset-form.footer')}}
                    </p>
                </form>
            </div>
            <!-- end register-content -->
        </div>
        <!-- end right-content -->
    </div>
    <!-- end register -->
@endsection


@push('scripts')
    <script>
        function changeCheckbox() {
            var value = $('#agreement_checkbox').val();
            if(value == 1){
                $('#agreement_checkbox').val(0);
            }else{
                $('#agreement_checkbox').val(1);
            }
        }
    </script>
@endpush
