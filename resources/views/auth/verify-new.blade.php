@extends('layouts.default')

@section('title', 'Weryfikacja konta')

@push('css')
    <link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="row">
        <div class="col-xl-12 ui-sortable">
            <div class="panel panel-inverse" data-sortable-id="ui-general-3">

                <div class="panel-heading ui-sortable-handle">
                    <h4 class="panel-title">Weryfikacja email</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>


                <div class="panel-body">
                    <div class="note note-danger m-b-15">
                        <div class="note-icon"><i class="fas fa-exclamation-triangle"></i></div>
                        <div class="note-content">
                            <h2><b>Twoje konto nie zostało jeszcze zweryfikowane.</b></h2>
                            <p class="lead">
                                Do pełnego działania konta, wymagana jest weryfikacja email.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">

                        </div>
                        <div class="col-lg-8">
                            @if (\Session::has('status'))
                                <div class="alert alert-success fade show">
                                    <span class="close" data-dismiss="alert">×</span>
                                    Wiadomość weryfikacyjna została ponownie wysłana na email <a href="#">{{Auth::user()->email}}</a>.
                                </div>
                            @endif
                            <p class="lead">
                                Wysłaliśmy adres wiadomość weryfikacyjną na adres <a href="#">{{Auth::user()->email}}</a>. Jeśli nie możesz znaleźć wiadomości, sprawdź folder spam.
                                <br>Jeśli nie otrzymałeś wiadomości weryfikacyjnej kliknij przycisk wyślij ponownie.
                            </p>
                            <div class="text-right">
                                <form method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-lg">Wyślij ponownie</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-2">

                        </div>
                    </div>

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
@endpush

