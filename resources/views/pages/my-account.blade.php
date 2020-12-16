@extends('layouts.default')

@section('title', 'Moje konto')

@push('css')
    <link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="/css/custom.css" rel="stylesheet"/>

@endpush

@section('content')
    <!-- begin page-header -->
    <h1 class="page-header">Moje konto</h1>
    <!-- end page-header -->
    <div class="row">

        <div class="col-xl-6">

            <ul class="nav nav-pills mb-2">
                <li class="nav-item">
                    <a href="#nav-pills-tab-1" data-toggle="tab" class="nav-link active">
                        <span class="d-sm-none">Informacje</span>
                        <span class="d-sm-block d-none">Informacje</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#nav-pills-tab-2" data-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Hasło</span>
                        <span class="d-sm-block d-none">Zmień hasło</span>
                    </a>
                </li>
            </ul>


            <div class="tab-content p-15 rounded bg-white mb-4">

                <div class="tab-pane fade active show" id="nav-pills-tab-1">
                    <h3 class="m-t-10">Informacje o koncie</h3>
                    <form data-np-checked="1">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3">ID</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control m-b-5" placeholder="{{ Auth::user()->id }}" data-np-checked="1" disabled>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3">Nazwa użytkownika</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control m-b-5" placeholder="{{ Auth::user()->name }}" data-np-checked="1" disabled>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3">Email address</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control m-b-5" placeholder="{{ Auth::user()->email }}" data-np-checked="1" disabled>
                                @if(Auth::user()->email_verified_at != null)
                                    <small class="f-s-12 text-green">Adres email został pomyślnie zweryfikowany.</small>
                                @else
                                    <small class="f-s-12 text-red">Adres email nie został jeszcze zweryfikowany. <a href="{{route("verification.notice")}}" class="text-red-darker">Kliknij aby przejść do weryfikacji email.</a></small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3">Typ abonamentu</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control m-b-5" placeholder="{{ Auth::user()->type }}" data-np-checked="1" disabled>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="tab-pane fade" id="nav-pills-tab-2">
                    <h3 class="m-t-10">Zmień swoje hasło</h3>
                    <form data-np-checked="1">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3">Obecne hasło</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control m-b-5" data-np-checked="1">
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3">Nowe hasło</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control m-b-5" data-np-checked="1">
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3">Potwierdź nowe hasło</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control m-b-5" data-np-checked="1">
                            </div>
                        </div>

                        <p class="text-right m-b-0">
                            <button type="submit" class="btn btn-orange m-r-5">Zmień hasło</button>
                        </p>
                    </form>
                </div>


            </div>

        </div>


    </div>
@endsection

@push('scripts')
    <script src="/assets/plugins/gritter/js/jquery.gritter.js"></script>
    <script src="/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="/assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
    <script src="/assets/plugins/moment/moment.js"></script>
    <script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/assets/plugins/chart.js/dist/Chart.min.js"></script>
@endpush

