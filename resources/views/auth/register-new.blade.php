@extends('layouts.empty', ['paceTop' => true, 'bodyExtraClass' => 'bg-white'])

@section('title', __('registration-form.title'))

@section('content')
	<!-- begin register -->
	<div class="register register-with-news-feed">
		<!-- begin news-feed -->
		<div class="news-feed">
			<div class="news-image" style="background-image: url(/assets/img/login-bg/login-bg-15.jpg)"></div>
			<div class="news-caption">
				<h4 class="caption-title">{!! __('registration-form.jumbotron') !!}</h4>
				<p>
                    {!! __('registration-form.jumbotron-description') !!}
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
                {{__('registration-form.header')}}
				<small>{{__('registration-form.register-header')}}</small>
			</h1>
			<!-- end register-header -->
			<!-- begin register-content -->
			<div class="register-content">
                @if ($errors->any())
                    <div class="alert alert-danger fade show mb-4">
                        <span class="close" data-dismiss="alert">×</span>
                        {{__('registration-form.error')}}
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
				<form action="{{ route('register') }}" method="POST" class="margin-bottom-0">
                    @csrf
					<label class="control-label">{{__('registration-form.name-label')}} <span class="text-danger">*</span></label>
					<div class="row m-b-15">
						<div class="col-md-12">
							<input id="name" name="name" type="text" class="form-control" value="{{old('name')}}" placeholder="{{__('registration-form.name-placeholder')}}" required autocomplete="name" autofocus/>
						</div>
					</div>
					<label class="control-label">{{__('registration-form.email-label')}} <span class="text-danger">*</span></label>
					<div class="row m-b-15">
						<div class="col-md-12">
							<input id="email" name="email" type="email" class="form-control" value="{{old('email')}}" placeholder="{{__('registration-form.email-placeholder')}}" required autocomplete="email"/>
						</div>
					</div>
					<label class="control-label">{{__('registration-form.password-label')}} <span class="text-danger">*</span></label>
					<div class="row m-b-15">
						<div class="col-md-12">
							<input id="password" name="password" type="password" class="form-control" placeholder="{{__('registration-form.password-placeholder')}}" required autocomplete="new-password"/>
						</div>
					</div>
					<label class="control-label">{{__('registration-form.repassword-label')}} <span class="text-danger">*</span></label>
					<div class="row m-b-15">
						<div class="col-md-12">
							<input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="{{__('registration-form.repassword-placeholder')}}" required autocomplete="new-password"/>
						</div>
					</div>
					<div class="checkbox checkbox-css m-b-30">
						<div class="checkbox checkbox-css m-b-30">
							<input type="checkbox" onclick="changeCheckboxValue" id="agreement_checkbox" name="agreement_checkbox">
							<label for="agreement_checkbox" onclick="changeCheckbox()">
                                {!! __('registration-form.tos')!!}

							</label>
						</div>
					</div>
					<div class="register-buttons">
						<button type="submit" class="btn btn-primary btn-block btn-lg">{{__('registration-form.signup-button')}}</button>
					</div>
					<div class="m-t-30 m-b-30 p-b-30">
                        {!! __('registration-form.signin')!!}
					</div>
					<hr />
					<p class="text-center text-grey-darker mb-0">
                        {{__('registration-form.footer')}}
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
