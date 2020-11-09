@extends('layouts.default')

@section('title', 'Dashboard V1')

@push('css')
    <link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="/assets/plugins/jstree/dist/themes/default/style.min.css" rel="stylesheet">
@endpush

@section('content')
    <h1 class="page-header">Raport kategorii</h1>


    <div cLass="row">

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
                    <form method="POST" action="{{route("category.store")}}" data-np-checked="1">
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
                        @csrf
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

                        <div class="row form-group m-b-10">

                            <div class="col-xl-3">

                            </div>
                            <div class="text-center col-xl-6">
                                <div class="form-group row m-b-15">
                                    <input class="form-control" placeholder="Słowa kluczowe" name="keywords" data-parsley-required="true">

                                </div>
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

                    <div class="modal fade" id="modal-dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Modal Dialog</h4>
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
@endsection

@push('scripts')
    <script src="/assets/plugins/moment/moment.js"></script>
    <script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/assets/plugins/chart.js/dist/Chart.min.js"></script>
    <script src="/assets/plugins/jstree/dist/jstree.min.js"></script>
    <script>
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

                selectedCategories[data['node']['id']] = data['node']['text'];
                var textString = "";
                var valueString = "";

                selectedCategories.forEach(function(item, index, array) {
                    valueString = valueString.concat(index,";");
                    textString = textString.concat(item,", ");
                });
                valueString = valueString.substring(0,valueString.length -1);
                textString = textString.substring(0,textString.length -2);
                $('#cateogories').html("<input name='categories' value='"+valueString+"' hidden>");
                $('#category-modal').html("Wybrane kategorie: "+textString)
            });
            $('#jstree').on('deselect_node.jstree', function(e,data) {
                var length = 0;
                selectedCategories.forEach(function (item, index, array) {
                   length++;
                });
                if(length > 1) {
                    selectedCategories.splice(data['node']['id'], 1);
                    var textString = "";
                    var valueString = "";
                    selectedCategories.forEach(function (item, index, array) {
                        valueString = valueString.concat(index, ";");
                        textString = textString.concat(item, ", ");
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

        var Category = function () {
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
                }
            };
        }();

        $(document).ready(function() {
            Category.init();
        });

    </script>
@endpush

