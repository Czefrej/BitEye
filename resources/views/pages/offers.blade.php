@extends('layouts.default')

@section('title', 'Dashboard V1')

@push('css')
	<link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
	<link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
@endpush

@section('content')
	<!-- begin page-header -->
	<h1 class="page-header">Aukcje</h1>
	<!-- end page-header -->
	<div class="row">

		<div class="col-xl-12 ui-sortable">

			<div class="panel panel-inverse" data-sortable-id="form-stuff-8">

				<div class="panel-heading ui-sortable-handle">
					<h4 class="panel-title">Wyszukiwarka aukcji</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					</div>
				</div>


				<div class="panel-body">
					<form method="POST" action="{{route("offer.store")}}">
                        <div class="row form-group m-b-10">
                            <div class="col-xl-3">

                            </div>
                            <div class="ext-center col-xl-6">
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
                            </div>
                            <div class="col-xl-3">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3">

                            </div>
                            <div class="col-xl-6 text-center m-b-10">
                                <input class="btn btn-inverse mr-2 text-truncate" type="text" name="daterange" value="" />
                            </div>
                            <div class="col-xl-3">

                            </div>
                        </div>
						<div class="row form-group m-b-10">
                            @csrf
							<div class="col-xl-3">

							</div>
							<div class="input-group text-center col-xl-6">
								<div class="input-group-prepend"><span class="input-group-text">https://allegro.pl/oferta/</span></div>
                                <input type="number" name="auctionNumber" class="form-control" placeholder="Wprowadź numer aukcji" value="{{old('auctionNumber')}}" required autocomplete="auctionNumber">

							</div>
							<div class="col-xl-3">

							</div>
						</div>
						<div class="row form-group m-b-10">
							<div class="col-xl-3">

							</div>
							<div class="input-group text-center col-xl-6">
								<button type="submit" class="btn btn-sm btn-primary btn-orange m-r-5 float-right">Szukaj</button>
							</div>
							<div class="col-xl-3">

							</div>
						</div>
					</form>
				</div>


			</div>

		</div>
        @if(isset($offer))
            <div class="col-xl-12 ui-sortable">

                <div class="panel panel-inverse" data-sortable-id="form-stuff-8">

                    <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">Oferta #{{$offer->id}} - {{$offerDetails['name']}}</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>


                    <div class="panel-body">
                        <div class="row form-group m-b-10">
                            <div class="col-xl-6 text-center">
                                <img src="{{$offer->img_url}}" width="50%" alt="{{$offer->id}}" class="img-thumbnail">
                            </div>
                            <div class="text-center col-xl-6">
                                <div class="text-gray text-right col-xl-12 mb-5">
                                    <small>Supermarket  /  Artykuły dla zwierząt  / Dla kotów  /  Karmy  /  {{$category['name']}} ({{$category['id']}})</small>
                                </div>
                                <div>
                                    <h4>{{$offerDetails['name']}}</h4>
                                    <p class="text-gray">
                                        od
                                        @if($seller['super_seller'])
                                            <img src="https://assets.allegrostatic.com/metrum/icon/super-seller-af2bec0d44.svg" height="16px"> Super Sprzedawcy
                                        @endif

                                        <a target="_blank" rel="noopener noreferrer" href="https://allegro.pl/uzytkownik/{{$seller['login']}}">{{$seller['login']}}
                                            <i class="fa fa-external-link-alt"></i>
                                        </a>

                                        @if($seller['company'])
                                        (konto firmowe)
                                        @else
                                        (konto prywatne)
                                        @endif
                                    </p>
                                </div>

                                <div>
                                    <hr>
                                    <div class="text-left">
                                        <div class="row">
                                            <div class="col-xl-8">
                                                <h3>{{number_format($offerDetails['price'],2)}} zł
                                                    <small>
                                                        Dostawa od {{number_format($offerDetails['lowest_delivery_price'],2)}} zł
                                                    </small>
                                                    @if($offerDetails['free_delivery'])
                                                        Darmowa dostawa
                                                    @endif
                                                </h3>
                                                <p class="text-gray">{{$offerDetails['transactions']}} osób kupiło</p>
                                            </div>

                                            <div class="col-xl-4">
                                                <div class="text-right f-s-20">

                                                    <i class="fa fa-bullhorn text-gray-lighter" data-toggle="tooltip" data-placement="bottom" title="Promowanie"></i>
                                                    @if($offerDetails['promo_highlight'])
                                                    <i class="fa fa-h-square" data-toggle="tooltip" data-placement="bottom" title="Podświetlenie"></i>
                                                    @endif
                                                    @if($offerDetails['promo_highlight'])
                                                        <i class="fa fa-bold" data-toggle="tooltip" data-placement="bottom" title="Pogrubienie"></i>
                                                    @endif
                                                    @if($offerDetails['promo_emphasized'])
                                                        <i class="fa fa-underline" data-toggle="tooltip" data-placement="bottom" title="Podkreślenie"></i>
                                                    @endif

                                                    <br>
                                                    <small>
                                                        {{$offerDetails['stock']}} dostępnych sztuk
                                                    </small>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div>
                                    <hr>
                                    <div class="text-left">

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row form-group m-b-10">
                            <div class="col-xl-3">

                            </div>
                            <div class="input-group text-center col-xl-6">

                            </div>
                            <div class="col-xl-3">

                            </div>
                        </div>
                        <div class="row orm-group m-b-10">
                            <div class="text-gray text-right col-xl-12">
                                <small>Data utworzenia w systemie: {{$offer->creation_date}}</small>
                                <br>
                                <small>Ostania aktualizacja: {{$offerDetails['creation_date']}}</small>
                            </div>
                        </div>

                    </div>


                </div>

            </div>

        @endif
	</div>
    <div class="row">
        <div class="col-xl-6 ui-sortable">
            <div class="panel panel-inverse">
                <div class="panel-heading ui-sortable-handle">
                    <h4 class="panel-title">Historia cen</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div>
                        <canvas id="line-chart" data-render="chart-js"></canvas>
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
    <script src="/assets/plugins/moment/moment.js"></script>
    <script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/assets/plugins/chart.js/dist/Chart.min.js"></script>

    <script>
        var randomScalingFactor = function() {
            return Math.round(Math.random()*100)
        };
        var priceChangeData = @json($priceChartData);
        var lineChartData = {
            labels: priceChangeData['datetime'],
            datasets: [{
                label: 'Cena',
                borderColor: COLOR_ORANGE,
                pointBackgroundColor: COLOR_ORANGE,
                pointRadius: 2,
                borderWidth: 2,
                backgroundColor: COLOR_ORANGE_TRANSPARENT_1,
                data: priceChangeData['price']
            }]
        };
        var handleDateRangeFilter = function() {
            $('input[name="daterange"]').html(moment().subtract(7,'days').format('YYYY-MM-DD') + ' - ' + moment().format('YYYY-MM-DD'));
            $('#daterange-prev-date').html(moment().subtract(15,'days').format('D MMMM') + ' - ' + moment().subtract(8,'days').format('D MMMM YYYY'));

            $('input[name="daterange"]').daterangepicker({
                @if(!isset($fromDate))
                startDate: moment().subtract(7, 'days'),
                @else
                startDate: {{$fromDate}},
                @endif

                @if(!isset($toDate))
                endDate: moment(),
                @else
                endDate: {{$toDate}},
                @endif
                minDate: '2020-01-10',
                maxDate: moment(),
                dateLimit: { days: 60 },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    '@lang('daterangepicker.today')': [moment(), moment()],
                    '@lang('daterangepicker.yesterday')': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '@lang('daterangepicker.last_7_days')': [moment().subtract(6, 'days'), moment()],
                    '@lang('daterangepicker.last_30_days')': [moment().subtract(29, 'days'), moment()],
                    '@lang('daterangepicker.this_month')': [moment().startOf('month'), moment().endOf('month')],
                    '@lang('daterangepicker.last_month')': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'right',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-primary',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    format: 'YYYY-MM-DD',
                    weeks : "@lang('daterangepicker.week-short')",
                    applyLabel: "@lang('daterangepicker.submit')",
                    cancelLabel: "@lang('daterangepicker.cancel')",
                    fromLabel: "@lang('daterangepicker.from')",
                    toLabel: "@lang('daterangepicker.to')",
                    customRangeLabel: "@lang('daterangepicker.custom')",
                    daysOfWeek: ['@lang("daterangepicker.sunday-short")', '@lang("daterangepicker.monday-short")', '@lang("daterangepicker.tuesday-short")', '@lang("daterangepicker.wednesday-short")', '@lang("daterangepicker.thursday-short")', '@lang("daterangepicker.friday-short")','@lang("daterangepicker.saturday-short")'],
                    monthNames: ['@lang("daterangepicker.january")', '@lang("daterangepicker.february")', '@lang("daterangepicker.march")', '@lang("daterangepicker.april")', '@lang("daterangepicker.may")', '@lang("daterangepicker.june")', '@lang("daterangepicker.july")', '@lang("daterangepicker.august")', '@lang("daterangepicker.september")', '@lang("daterangepicker.october")', '@lang("daterangepicker.november")', '@lang("daterangepicker.december")'],
                    firstDay: 1
                }
            }, function(start, end, label) {
                $('input[name="daterange"]').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));

                var gap = end.diff(start, 'days');
                $('#daterange-prev-date').html(moment(start).subtract('days', gap).format('D MMMM') + ' - ' + moment(start).subtract('days', 1).format('D MMMM YYYY'));
            });
        };
        var handleChartJs = function(){
            var ctx = document.getElementById('line-chart').getContext('2d');
            var lineChart = new Chart(ctx, {
                type: 'line',
                data: lineChartData
            });
        };

        var Offers = function () {
            "use strict";
            return {
                //main function
                init: function () {
                    handleDateRangeFilter();
                    handleChartJs();
                }
            };
        }();

        $(document).ready(function() {
            Offers.init();
        });
    </script>
@endpush

