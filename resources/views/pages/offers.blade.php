@extends('layouts.default')

@section('title', 'Dashboard V1')

@push('css')
	<link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
	<link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="/css/custom.css" rel="stylesheet"/>

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
                        <div class="row" id="date-input">
                            <div class="col-xl-3">

                            </div>

                            <div class="col-xl-6 text-center m-b-10">
                                <input class="btn btn-inverse mr-2 text-truncate" type="text" name="daterange" value="" />
                            </div>
                            <div class="col-xl-3">

                            </div>
                        </div>
						<div class="row form-group m-b-10" id="offer-input">
                            @csrf
							<div class="col-xl-3">

							</div>
							<div class="input-group text-center col-xl-6">
								<div class="input-group-prepend"><span class="input-group-text">https://allegro.pl/oferta/</span></div>
                                <input type="number" id="auctionNumber" name="auctionNumber" class="form-control" placeholder="Wprowadź numer aukcji" @if(isset($offer)) value="{{$offer->offer_id}}" @else value="{{old('auctionNumber')}}" @endif required autocomplete="auctionNumber">
							</div>
							<div class="col-xl-3">

							</div>
						</div>
						<div class="row form-group m-b-10">
							<div class="col-xl-3">

							</div>
							<div class="input-group text-center col-xl-6" id="submit-button">
								<button type="submit" class="btn btn-sm btn-primary btn-orange m-r-5 float-right">Szukaj</button>
							</div>
							<div class="col-xl-3">

							</div>
						</div>

                        <div class="row m-b-10">
                            <div class="col-xl-3">
                            </div>
                            <div class="input-group col-xl-6 d-block hide-img" id="loading-spinner">
                                <div class="text-center">
                                    <object id="animated-svg" type="image/svg+xml" width="370px" data="/assets/biteye-loading-spinner.svg">
                                    </object>
                                </div>

                                <div>
                                    <h2 class="text-center" style="font-family: 'Poppins', sans-serif;">
                                        Rzucę na to okiem.<br>
                                        To zajmie tylko chwilkę...
                                    </h2>

                                </div>

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
                        <h4 class="panel-title">Oferta #{{$offer->offer_id}} - {{$offer->name}}</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>


                    <div class="panel-body">
                        <div class="row form-group m-b-10">
                            <div class="col-xl-6 text-center">
                                <img src="{{$offer->img_url}}" width="50%" alt="{{$offer->offer_id}}" class="img-thumbnail">
                            </div>
                            <div class="text-center col-xl-6">
                                <div class="text-gray text-right col-xl-12 mb-5">
                                    <small>Supermarket  /  Artykuły dla zwierząt  / Dla kotów  /  Karmy  /  {{$category['name']}} ({{$category['id']}})</small>
                                </div>
                                <div>
                                    <h4>{{$offer->name}}</h4>
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
                                                    @if($offerDetails['promoted'])
                                                        <i class="fa fa-bullhorn" data-toggle="tooltip" data-placement="bottom" title="Promowanie"></i>
                                                    @endif
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
        @if(isset($historicalData))
            <div class="col-xl-6 php  ui-sortable">
                <div class="panel panel-inverse">
                    <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">Historia aukcji</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div>
                            <canvas id="price-chart" data-render="chart-js"></canvas>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-6 php  ui-sortable">
                <div class="panel panel-inverse">
                    <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">Historia sprzedaży</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if($restocked)
                            <div class="note note-warning note-with-right-icon m-b-15">
                                <div class="note-content text-right">
                                    <h4><b>Ostrzeżenie!</b></h4>
                                    <p>
                                        Wykryliśmy, że wykres może zawierać niedokładne dane.
                                        Domyślnie, wszystkie punkty z niedokładnymi danymi, są automatycznie zerowane.
                                        Aby poprawić czytelność wykresów, możesz włączyć opcję filtrowania niedokładnych danych.
                                        Dzięki niej, nierzetelne dane nie będą wyświetlane na wykresie.
                                    </p>
                                    <div class="custom-control custom-switch mb-1">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1" data-np-checked="1">
                                        <label class="custom-control-label" for="customSwitch1">Filtruj niedokładne dane </label>
                                    </div>
                                </div>
                                <div class="note-icon"><i class="fa fa-lightbulb"></i></div>
                            </div>
                        @endif
                        <div>
                            <canvas id="transactions-chart" data-render="chart-js"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
	<script src="/assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="/assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
	<script src="/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
    <script src="/assets/plugins/moment/moment.js"></script>
    <script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
    <script src="/assets/plugins/chart.js/dist/Chart.min.js"></script>
    <script>
        function pretifyNumber(x) {
            x = x.toString();
            var pattern = /(-?\d+)(\d{3})/;
            while (pattern.test(x))
                x = x.replace(pattern, "$1 $2");
            return x;
        }

        var total = @json($totalStats ?? '');
        var restocked = @json($restocked ?? '');

        var randomScalingFactor = function() {
            return Math.round(Math.random()*100)
        };
        @if(isset($historicalData))
            var historicalData = @json($historicalData);

            var offerHistoryChartData = {
                labels: historicalData['date'],
                datasets: [{
                    label: 'Cena',
                    borderColor: COLOR_BLACK,
                    pointBackgroundColor: COLOR_BLACK,
                    pointRadius: 2,
                    borderWidth: 2,
                    data: historicalData['price'],
                    yAxisID: 'price-axis',
                    fill: false
                },{
                    label: 'Stan magazynowy',
                    borderColor: COLOR_ORANGE,
                    pointBackgroundColor: COLOR_ORANGE,
                    pointRadius: 2,
                    borderWidth: 2,
                    hidden: true,
                    data: historicalData['stock'],
                    yAxisID: 'stock-axis',
                    fill: false
                }]
            };
            var transactionChartData = {
                labels: historicalData['date'],
                datasets: [{
                    label: 'Sprzedane sztuki',
                    borderColor: COLOR_BLACK,
                    pointBackgroundColor: COLOR_BLACK,
                    pointRadius: 2,
                    borderWidth: 2,
                    data: historicalData['units_sold'],
                    fill: false,
                    yAxisID: 'units-axis',
                },{
                    label: 'Obrót',
                    borderColor: COLOR_ORANGE,
                    pointBackgroundColor: COLOR_ORANGE,
                    pointRadius: 2,
                    borderWidth: 2,
                    data: historicalData['revenue'],
                    fill: false,
                    yAxisID: 'revenue-axis',
                },{
                    label: 'Transakcje',
                    borderColor: COLOR_PINK,
                    pointBackgroundColor: COLOR_PINK,
                    pointRadius: 2,
                    borderWidth: 2,
                    hidden: true,
                    data: historicalData['transactions'],
                    fill: false,
                    yAxisID: 'revenue-axis',
                }]
            };
            var transactionCensuredChartData = {
                labels: historicalData['date'],
                datasets: [{
                    label: 'Sprzedane sztuki',
                    borderColor: COLOR_BLACK,
                    pointBackgroundColor: COLOR_BLACK,
                    pointRadius: 2,
                    borderWidth: 2,
                    data: historicalData['censured']['units_sold'],
                    fill: false,
                    yAxisID: 'units-axis',
                },{
                    label: 'Obrót',
                    borderColor: COLOR_ORANGE,
                    pointBackgroundColor: COLOR_ORANGE,
                    pointRadius: 2,
                    borderWidth: 2,
                    data: historicalData['censured']['revenue'],
                    fill: false,
                    yAxisID: 'revenue-axis',
                },{
                    label: 'Transakcje',
                    borderColor: COLOR_PINK,
                    pointBackgroundColor: COLOR_PINK,
                    pointRadius: 2,
                    borderWidth: 2,
                    hidden: true,
                    data: historicalData['transactions'],
                    fill: false,
                    yAxisID: 'revenue-axis',
                }]
            };
        @endif


        var handleDateRangeFilter = function() {
            $('input[name="daterange"]').html(moment().subtract(7,'days').format('YYYY-MM-DD') + ' - ' + moment().format('YYYY-MM-DD'));

            $('#daterange-prev-date').html(moment().subtract(15,'days').format('D MMMM') + ' - ' + moment().subtract(8,'days').format('D MMMM YYYY'));

            $('input[name="daterange"]').daterangepicker({
                @if(!isset($fromDate))
                startDate: moment().subtract(7, 'days'),
                @else
                startDate: @json($fromDate),
                @endif

                @if(!isset($toDate))
                endDate: moment(),
                @else
                endDate: @json($toDate),
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
        var transactionsChart;

        function f() {
            if(restocked) {
                if (Cookies.get('deleteInaccurateData') == 'true') {
                    return transactionCensuredChartData;
                } else return transactionChartData;
            }else return transactionChartData;
        }

        var handleChartJs = function(){
            @if(isset($historicalData))

                var ctx = document.getElementById('price-chart').getContext('2d');

                var offerHistoryChart = new Chart(ctx, {
                    type: 'line',
                    data: offerHistoryChartData,
                    options:{
                        tooltips:{
                          mode: 'index',
                          intersect: true
                        },
                        hover:{
                            mode: 'index',
                            intersect: true
                        },
                        scales:{
                            yAxes:[{
                                type: 'linear',
                                position: 'left',
                                id: 'price-axis'
                            },{
                                type: 'linear',
                                position: 'right',
                                id: 'stock-axis'
                            }]
                        }
                    }
                });
                var ptx = document.getElementById('transactions-chart').getContext('2d');
                transactionsChart = new Chart(ptx, {
                    type: 'line',
                    data: f(),
                    options:{
                        tooltips:{
                            mode: 'index',
                            intersect: true
                        },
                        hover:{
                            mode: 'index',
                            intersect: true
                        },
                        title:{
                            display: true,
                            text: 'Całkowita wartość sprzedaży: '+ pretifyNumber(Math.round(total['revenue']*1000)/1000)+ ' zł'
                        },
                        scales:{
                            yAxes:[{
                                type: 'linear',
                                position: 'left',
                                id: 'units-axis'
                            },{
                                type: 'linear',
                                position: 'right',
                                id: 'revenue-axis'
                            }]
                        }
                    }
                });

            @endif
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
            if(restocked){
                if (Cookies.get('deleteInaccurateData') == 'true') {
                    $("#customSwitch1").attr("checked", true);
                }
            }
            Offers.init();
        });

        if(restocked) {
            $("#customSwitch1").change(function () {
                var attr = $(this).attr('deleteInaccurateData');

                if (this.checked) {
                    Cookies.set('deleteInaccurateData', true, {expires: 7});
                    transactionsChart.data = transactionCensuredChartData;
                    transactionsChart.update();
                } else {
                    Cookies.set('deleteInaccurateData', false, {expires: 7});
                    transactionsChart.data = transactionChartData;
                    transactionsChart.update();
                }
            });
        }

        $("form").submit(function( event ) {
            $('#loading-spinner').removeClass('hide-img');
            $('#submit-button').addClass('hide-img');
            $('#date-input').addClass('hide-img');
            $('#offer-input').addClass('hide-img');
            // a = document.getElementById("animated-svg");
            // b = a.contentDocument
            // c = b.getElementById("eecardrcm4gv1");
            // c.dispatchEvent(new Event('click'));
        });

        $("#auctionNumber").bind("paste", function(e){
            // access the clipboard using the api
            var pastedData = e.originalEvent.clipboardData.getData('text');
            var re = /[0-9]{10}/g;
            var number = re.exec(pastedData);
            $("#auctionNumber").val(number);
            e.preventDefault();
        } );

    </script>
@endpush

