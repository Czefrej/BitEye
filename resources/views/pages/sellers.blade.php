@extends('layouts.default')

@section('title', 'Wyszukiwarka sprzedawców')

@push('css')
    <link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="/assets/plugins/jstree/dist/themes/default/style.min.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet"/>

@endpush

@section('content')
    <!-- begin page-header -->
    <h1 class="page-header">Sprzedawcy</h1>
    <!-- end page-header -->
    <div class="row">

        <div class="col-xl-12 ui-sortable">

            <div class="panel panel-inverse" data-sortable-id="form-stuff-8">

                <div class="panel-heading ui-sortable-handle">
                    <h4 class="panel-title">Raport sprzedawców</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>


                <div class="panel-body">
                    <form method="POST" action="{{route("seller.store")}}">
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

                            <div class="col-xl-6 m-b-10">
                                <div class="float-left m-b-5">
                                    <div class="input-group">
                                        <a class="btn btn-inverse mr-2 text-truncate" id="category-modal" href="#modal-dialog" data-toggle="modal"> Wybierz kategorię</a>
                                    </div>
                                </div>
                                <div class="float-right m-b-5">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar fa-lg"></i></span></div>
                                        <input class="btn btn-default mr-2 text-truncate" type="text" name="daterange" value="" data-np-checked="1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">

                            </div>
                        </div>
                        <div class="row form-group m-b-10" id="category-div-1">
                            <div class="col-xl-3">

                            </div>
                            <div class="text-center col-xl-6">
                                <div class="form-group row m-b-15">
                                    <div id="cateogories">

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">

                            </div>
                        </div>
                        <div class="row form-group m-b-10" id="offer-input">
                            @csrf
                            <div class="col-xl-3">

                            </div>
                            <div class="input-group text-center col-xl-6">
                                <div class="input-group-prepend"><span class="input-group-text">https://allegro.pl/uzytkownik/</span></div>
                                <input type="text" id="seller" name="seller" class="form-control" placeholder="Wprowadź nazwę użytkownika" @if(isset($offer)) value="{{$offer->offer_id}}" @else value="{{old('auctionNumber')}}" @endif required autocomplete="seller">
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
                    <div class="modal fade" id="modal-dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Wybierz kategorię</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div id="jstree" class="jstree jstree-2 jstree-default jstree-checkbox-selection">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Ok</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <div class="row">
        @if(isset($recentSellerData))
            <div class="col-xl-12 ui-sortable">


                <div class="panel panel-inverse" data-sortable-id="form-stuff-8">

                    <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">Sprzedający {{$recentSellerData['login']}}</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>


                    <div class="panel-body">
                        <div class="row form-group m-b-10">

                            <div class="text-center col-xl-12">
                                <div class="text-gray text-right col-xl-12 mb-5">
                                    <small>

                                    </small>
                                </div>
                                <div>
                                    <p class="text-gray">
                                        @if($recentSellerData['super_seller'])
                                            <img src="https://assets.allegrostatic.com/metrum/icon/super-seller-af2bec0d44.svg" height="16px"> Super Sprzedawca
                                        @endif

                                        <a target="_blank" rel="noopener noreferrer" href="https://allegro.pl/uzytkownik/{{$recentSellerData['login']}}">{{$recentSellerData['login']}}
                                            <i class="fa fa-external-link-alt"></i>
                                        </a>

                                        {{--                                        @if($seller['company'])--}}
                                        {{--                                            (konto firmowe)--}}
                                        {{--                                        @else--}}
                                        {{--                                        (konto prywatne)--}}
                                        {{--                                        @endif--}}
                                    </p>
                                </div>

                                <div>
                                    <dl class="row">
                                        <dt class="text-inverse text-right col-6 text-truncate">Sprzedaż łączna w okresie</dt>
                                        <dd class="col-6 text-left text-truncate">32,743 zł</dd>
                                    </dl>
                                    <hr>
                                    <dl class="row">
                                        <dt class="text-inverse text-right col-6 text-truncate">Średnia sprzedaż dzienna</dt>
                                        <dd class="col-6 text-left text-truncate">123,13 zł</dd>
                                    </dl>
                                    <hr>
                                    <dl class="row">
                                        <dt class="text-inverse text-right col-6 text-truncate">Ilość sprzedanych sztuk</dt>
                                        <dd class="col-6 text-left text-truncate">354 sztuk</dd>
                                    </dl>
                                    <hr>
                                    <dl class="row">
                                        <dt class="text-inverse text-right col-6 text-truncate">Kategoria</dt>
                                        <dd class="col- text-left text-truncate">Mokra karma</dd>
                                    </dl>
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
                                <small>Ostania aktualizacja: {{$recentSellerData['creation_date']}}</small>
                            </div>
                        </div>

                    </div>


                </div>

            </div>

        @endif
    </div>
    <div class="row">
        <div class="col-xl-12  ui-sortable">
            <div class="panel panel-inverse">
                <div class="panel-heading ui-sortable-handle">
                    <h4 class="panel-title">Sprzedaż wg ofert</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-striped table-bordered table-td-valign-middle dataTable no-footer dtr-inline collapsed" style="width:100%">
                        <thead>
                            <tr>
                                <th>IMG</th>
                                <th>Oferta</th>
                                <th>Liczba sprzedanych sztuk</th>
                                <th>Śr. Cena</th>
                                <th>Wartość sprzedaży</th>
                                <th>test</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img width="75px" src="https://a.allegroimg.com/s128/11d9f5/437dfb1d4aaf89a96fa72fff9292" alt="AS Premium wołowina baton ADULT 90% MIĘSA 10x1000g"></td>
                                <td>AS Premium wołowina baton ADULT 90% MIĘSA 10x1000g</td>
                                <td>735</td>
                                <td>31,19</td>
                                <td>2536,82</td>
                                <td>$320,800</td>
                            </tr>
                            <tr>
                                <td><img width="75px" src="https://a.allegroimg.com/s128/03533c/11bffb7c492395fe6c53e496fe3d" alt="AS - mrożone mięso wołowe wołowina - 10 kg BARF"></td>
                                <td>AS - mrożone mięso wołowe wołowina - 10 kg BARF</td>
                                <td>44</td>
                                <td>57,66</td>
                                <td>1497,02</td>
                                <td>$320,800</td>
                            </tr>
                        </tbody>
                    </table>

                    {{--                @if($restocked)--}}
                    {{--                    <div class="note note-warning note-with-right-icon m-b-15">--}}
                    {{--                        <div class="note-content text-right">--}}
                    {{--                            <h4><b>Ostrzeżenie!</b></h4>--}}
                    {{--                            <p>--}}
                    {{--                                Wykryliśmy, że wykres może zawierać niedokładne dane.--}}
                    {{--                                Domyślnie, wszystkie punkty z niedokładnymi danymi, są automatycznie zerowane.--}}
                    {{--                                Aby poprawić czytelność wykresów, możesz włączyć opcję filtrowania niedokładnych danych.--}}
                    {{--                                Dzięki niej, nierzetelne dane nie będą wyświetlane na wykresie.--}}
                    {{--                            </p>--}}
                    {{--                            <div class="custom-control custom-switch mb-1">--}}
                    {{--                                <input type="checkbox" class="custom-control-input" id="customSwitch1" data-np-checked="1">--}}
                    {{--                                <label class="custom-control-label" for="customSwitch1">Filtruj niedokładne dane </label>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="note-icon"><i class="fa fa-lightbulb"></i></div>--}}
                    {{--                    </div>--}}
                    {{--                @endif--}}
                    {{--                <div>--}}
                    {{--                    <canvas id="transactions-chart" data-render="chart-js"></canvas>--}}
                    {{--                </div>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12  ui-sortable">
            <div class="panel panel-inverse">
                <div class="panel-heading ui-sortable-handle">
                    <h4 class="panel-title">Sprzedaż wg dni</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="panel-body">
                        <div>
                            <canvas id="price-chart" data-render="chart-js"></canvas>
                        </div>
                        <table id="daily" class="table table-striped table-bordered table-td-valign-middle dataTable no-footer dtr-inline collapsed" style="width:100%">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Dzień</th>
                                <th>Liczba sprzedanych sztuk</th>
                                <th>Śr. Cena</th>
                                <th>Wartość sprzedaży</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>2020-01-31</td>
                                <td>pon.</td>
                                <td>300</td>
                                <td>25,82</td>
                                <td>34000</td>
                            </tr>
                            <tr>
                                <td>2020-02-01</td>
                                <td>wt.</td>
                                <td>431</td>
                                <td>550</td>
                                <td>725</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    {{--                @if($restocked)--}}
                    {{--                    <div class="note note-warning note-with-right-icon m-b-15">--}}
                    {{--                        <div class="note-content text-right">--}}
                    {{--                            <h4><b>Ostrzeżenie!</b></h4>--}}
                    {{--                            <p>--}}
                    {{--                                Wykryliśmy, że wykres może zawierać niedokładne dane.--}}
                    {{--                                Domyślnie, wszystkie punkty z niedokładnymi danymi, są automatycznie zerowane.--}}
                    {{--                                Aby poprawić czytelność wykresów, możesz włączyć opcję filtrowania niedokładnych danych.--}}
                    {{--                                Dzięki niej, nierzetelne dane nie będą wyświetlane na wykresie.--}}
                    {{--                            </p>--}}
                    {{--                            <div class="custom-control custom-switch mb-1">--}}
                    {{--                                <input type="checkbox" class="custom-control-input" id="customSwitch1" data-np-checked="1">--}}
                    {{--                                <label class="custom-control-label" for="customSwitch1">Filtruj niedokładne dane </label>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="note-icon"><i class="fa fa-lightbulb"></i></div>--}}
                    {{--                    </div>--}}
                    {{--                @endif--}}
                    {{--                <div>--}}
                    {{--                    <canvas id="transactions-chart" data-render="chart-js"></canvas>--}}
                    {{--                </div>--}}
                </div>
            </div>
        </div>
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
    <script src="/assets/plugins/jstree/dist/jstree.min.js"></script>
    <script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables.net-rowreorder/js/dataTables.rowreorder.min.js"></script>
    <script src="/assets/plugins/datatables.net-rowreorder-bs4/js/rowreorder.bootstrap4.min.js"></script>
    <script src="/assets/plugins/chart.js/dist/Chart.min.js"></script>

    <script>
        var randomScalingFactor = function() {
            return Math.round(Math.random()*100)
        };
        data = []
        labels = []

        var i;
        for (i = 0; i < 15; i++) {
            data.push(randomScalingFactor());
            labels.push(i);
        }
        var offerHistoryChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: 'Śr. cena',
                borderColor: COLOR_BLACK,
                backgroundColor: COLOR_BLACK_TRANSPARENT_6,
                pointRadius: 2,
                borderWidth: 2,
                data: [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],
                fill: false
            },{
                label: 'Liczba sprzedanych sztuk',
                borderColor: COLOR_ORANGE,
                backgroundColor: COLOR_ORANGE_TRANSPARENT_6,
                pointRadius: 2,
                borderWidth: 2,
                data: [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],
                fill: false
            },{
                label: 'Wartość sprzedaży',
                borderColor: COLOR_PINK,
                backgroundColor: COLOR_PINK_TRANSPARENT_6,
                pointRadius: 2,
                borderWidth: 2,
                data: [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],
                fill: false
            }]
        };


        var handleChartJs = function(){

            var ctx = document.getElementById('price-chart').getContext('2d');

            var offerHistoryChart = new Chart(ctx, {
                type: 'bar',
                data: offerHistoryChartData,
                options:{
                    scales:{

                    }
                }
            });
        };

        var selectedCategories = []
        var handleJstreeDefault = function(categories) {
            $('#jstree').jstree({
                "core": {
                    "themes": { "responsive": false },

                    "multiple" : true,
                    'data' : categories
                },
                "types": {
                    "default": { "icon": "fa fa-folder text-warning fa-lg" },
                    "file": { "icon": "fa fa-file text-warning fa-lg" }
                },
                "checkbox": {
                    "three_state": false

                },
                "plugins": [ "wholerow", "checkbox", "types" ]
            });

            $('#jstree').on('select_node.jstree', function(e,data) {
                selectedCategories[selectedCategories.length] = {"id":data['node']['id'],"text":data['node']['text']};
                var textString = "";
                var valueString = "";

                selectedCategories.forEach(function(item, index, array) {
                    valueString = valueString.concat(item['id'],";");
                    textString = textString.concat(item['text'],", ");
                });
                valueString = valueString.substring(0,valueString.length -1);
                textString = textString.substring(0,textString.length -2);
                $('#cateogories').html("<input name='categories' value='"+valueString+"' hidden>");
                $('#category-modal').html("Wybrane kategorie: "+textString)
            });
            $('#jstree').on('deselect_node.jstree', function(e,data) {
                var length = 0;
                var index = 0;
                selectedCategories.forEach(function (item, ind, array) {
                    if(data['node']['id'] === item['id']){
                        index = ind;
                    }
                    length++;
                });
                if(length > 1) {
                    selectedCategories.splice(index, 1);
                    var textString = "";
                    var valueString = "";
                    selectedCategories.forEach(function (item, index, array) {
                        valueString = valueString.concat(item['id'], ";");
                        textString = textString.concat(item['text'], ", ");
                    });
                    valueString = valueString.substring(0, valueString.length - 1);
                    textString = textString.substring(0, textString.length - 2);
                    $('#cateogories').html("<input name='categories' value='" + valueString + "' hidden>");
                    $('#category-modal').html("Wybrane kategorie: " + textString)
                }else{
                    selectedCategories = [];
                    $('#cateogories').html("");
                    $('#category-modal').html("Wybierz kategorię")
                }
            });

        };

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
                dateLimit: { days: 120 },
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
        var Sellers = function () {
            "use strict";
            return {
                //main function
                init: function () {
                    $(function() {
                        $.ajax({
                            async : true,
                            type : "GET",
                            url : "{{route('jstree')}}",
                            dataType : "json",

                            success : function(json) {
                                handleJstreeDefault(json);
                            },

                            error : function(xhr, ajaxOptions, thrownError) {
                                alert(xhr.status);
                                alert(thrownError);
                            }
                        });
                    });
                    handleDateRangeFilter();
                    handleChartJs();

                    $("#auctionNumber").bind("paste", function(e){
                        // access the clipboard using the api
                        var pastedData = e.originalEvent.clipboardData.getData('text');
                        var re = /[0-9]{10}/g;
                        var number = re.exec(pastedData);
                        $("#auctionNumber").val(number);
                        e.preventDefault();
                    } );

                    var table = $('#example').DataTable( {
                        rowReorder: true
                    } );

                    var table2 = $('#daily').DataTable( {
                        rowReorder: true
                    } );

                }
            };
        }();

        $(document).ready(function() {
            // if(restocked){
            //     if (Cookies.get('deleteInaccurateData') == 'true') {
            //         $("#customSwitch1").attr("checked", true);
            //     }
            // }
            Sellers.init();
        });

        // if(restocked) {
        //     $("#customSwitch1").change(function () {
        //         var attr = $(this).attr('deleteInaccurateData');
        //
        //         if (this.checked) {
        //             Cookies.set('deleteInaccurateData', true, {expires: 7});
        //             reloadTransactionData();
        //         } else {
        //             Cookies.set('deleteInaccurateData', false, {expires: 7});
        //             reloadTransactionData();
        //         }
        //     });
        // }



        $("form").submit(function( event ) {
            $('#loading-spinner').removeClass('hide-img');
            $('#submit-button').addClass('hide-img');
            $('#date-input').addClass('hide-img');
            $('#offer-input').addClass('hide-img');
        });


    </script>
@endpush

