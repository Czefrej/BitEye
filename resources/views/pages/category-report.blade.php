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

        <div class="col-xl-12 ui-sortable-disabled">
            <div class="panel panel-inverse">

                <div class="panel-heading ui-sortable-disabled">
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

                        <div class="row form-group m-b-10">
                            <div class="col-xl-3">

                            </div>
                            <div class="input-group text-center col-xl-6">

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

        <div class="col-xl-7 ui-sortable">
            <div class="panel panel-inverse">
                <div class="panel-heading ui-sortable-handle">
                    <h4 class="panel-title">Sellers</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>


                <div class="alert alert-purple fade show">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">×</span>
                    </button>
                    This trivial example shows the use of the rowReorder property being used to enable RowReorder on a DataTable. The first column in the table is a sequence number that provides the basis for the ordering. To change a row's order, simply click and drag the row.
                </div>


                <div class="panel-body">
                    <table id="data-table-rowreorder-seller" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                        <tr>
                            <th width="1%">#</th>
                            <th width="1%" data-orderable="false"></th>
                            <th class="text-nowrap">Seller</th>
                            <th class="text-nowrap">Revenue</th>
                            <th class="text-nowrap">Units Sold</th>
                            <th class="text-nowrap">Market Share</th>
                            <th class="text-nowrap">CSS grade</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd gradeX">
                            <td width="1%" class="f-s-600 text-inverse">1</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="img-rounded height-30" /></td>
                            <td>Trident</td>
                            <td>Internet Explorer 4.0</td>
                            <td>Win 95+</td>
                            <td>4</td>
                            <td>X</td>
                        </tr>
                        <tr class="even gradeC">
                            <td width="1%" class="f-s-600 text-inverse">2</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-2.jpg" class="img-rounded height-30" /></td>
                            <td>Trident</td>
                            <td>Internet Explorer 5.0</td>
                            <td>Win 95+</td>
                            <td>5</td>
                            <td>C</td>
                        </tr>
                        <tr class="odd gradeA">
                            <td width="1%" class="f-s-600 text-inverse">3</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-3.jpg" class="img-rounded height-30" /></td>
                            <td>Trident</td>
                            <td>Internet Explorer 5.5</td>
                            <td>Win 95+</td>
                            <td>5.5</td>
                            <td>A</td>
                        </tr>
                        <tr class="even gradeA">
                            <td width="1%" class="f-s-600 text-inverse">4</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-4.jpg" class="img-rounded height-30" /></td>
                            <td>Trident</td>
                            <td>Internet Explorer 6</td>
                            <td>Win 98+</td>
                            <td>6</td>
                            <td>A</td>
                        </tr>
                        <tr class="odd gradeA">
                            <td width="1%" class="f-s-600 text-inverse">5</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-5.jpg" class="img-rounded height-30" /></td>
                            <td>Trident</td>
                            <td>Internet Explorer 7</td>
                            <td>Win XP SP2+</td>
                            <td>7</td>
                            <td>A</td>
                        </tr>
                        <tr class="even gradeA">
                            <td width="1%" class="f-s-600 text-inverse">6</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-6.jpg" class="img-rounded height-30" /></td>
                            <td>Trident</td>
                            <td>AOL browser (AOL desktop)</td>
                            <td>Win XP</td>
                            <td>6</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">7</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-7.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Firefox 1.0</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.7</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">8</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-8.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Firefox 1.5</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">9</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-9.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Firefox 2.0</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">10</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-10.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Firefox 3.0</td>
                            <td>Win 2k+ / OSX.3+</td>
                            <td>1.9</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">11</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-11.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Camino 1.0</td>
                            <td>OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">12</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-12.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Camino 1.5</td>
                            <td>OSX.3+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">13</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-13.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Netscape 7.2</td>
                            <td>Win 95+ / Mac OS 8.6-9.2</td>
                            <td>1.7</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">14</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-14.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Netscape Browser 8</td>
                            <td>Win 98SE+</td>
                            <td>1.7</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">15</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Netscape Navigator 9</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">16</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-2.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.0</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td>1</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">17</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-3.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.1</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td>1.1</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">18</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-4.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.2</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td>1.2</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">19</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-5.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.3</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td>1.3</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">20</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-6.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.4</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td>1.4</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">21</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-7.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.5</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td>1.5</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">22</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-8.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.6</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td>1.6</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">23</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-9.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.7</td>
                            <td>Win 98+ / OSX.1+</td>
                            <td>1.7</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">24</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-10.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.8</td>
                            <td>Win 98+ / OSX.1+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">25</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-11.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Seamonkey 1.1</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">26</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-12.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Epiphany 2.20</td>
                            <td>Gnome</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">27</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-13.jpg" class="img-rounded height-30" /></td>
                            <td>Webkit</td>
                            <td>Safari 1.2</td>
                            <td>OSX.3</td>
                            <td>125.5</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">28</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-14.jpg" class="img-rounded height-30" /></td>
                            <td>Webkit</td>
                            <td>Safari 1.3</td>
                            <td>OSX.3</td>
                            <td>312.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">29</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="img-rounded height-30" /></td>
                            <td>Webkit</td>
                            <td>Safari 2.0</td>
                            <td>OSX.4+</td>
                            <td>419.3</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">30</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-2.jpg" class="img-rounded height-30" /></td>
                            <td>Webkit</td>
                            <td>Safari 3.0</td>
                            <td>OSX.4+</td>
                            <td>522.1</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">31</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-3.jpg" class="img-rounded height-30" /></td>
                            <td>Webkit</td>
                            <td>OmniWeb 5.5</td>
                            <td>OSX.4+</td>
                            <td>420</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">32</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-4.jpg" class="img-rounded height-30" /></td>
                            <td>Webkit</td>
                            <td>iPod Touch / iPhone</td>
                            <td>iPod</td>
                            <td>420.1</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">33</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-5.jpg" class="img-rounded height-30" /></td>
                            <td>Webkit</td>
                            <td>S60</td>
                            <td>S60</td>
                            <td>413</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">34</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-6.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Opera 7.0</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">35</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-7.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Opera 7.5</td>
                            <td>Win 95+ / OSX.2+</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">36</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-8.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Opera 8.0</td>
                            <td>Win 95+ / OSX.2+</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">37</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-9.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Opera 8.5</td>
                            <td>Win 95+ / OSX.2+</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">38</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-10.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Opera 9.0</td>
                            <td>Win 95+ / OSX.3+</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">39</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-11.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Opera 9.2</td>
                            <td>Win 88+ / OSX.3+</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">40</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-12.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Opera 9.5</td>
                            <td>Win 88+ / OSX.3+</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">41</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-13.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Opera for Wii</td>
                            <td>Wii</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">42</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-14.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Nokia N800</td>
                            <td>N800</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">43</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Nintendo DS browser</td>
                            <td>Nintendo DS</td>
                            <td>8.5</td>
                            <td>C/A<sup>1</sup></td>
                        </tr>
                        <tr class="gradeC">
                            <td width="1%" class="f-s-600 text-inverse">44</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-2.jpg" class="img-rounded height-30" /></td>
                            <td>KHTML</td>
                            <td>Konqureror 3.1</td>
                            <td>KDE 3.1</td>
                            <td>3.1</td>
                            <td>C</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">45</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-3.jpg" class="img-rounded height-30" /></td>
                            <td>KHTML</td>
                            <td>Konqureror 3.3</td>
                            <td>KDE 3.3</td>
                            <td>3.3</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">46</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-4.jpg" class="img-rounded height-30" /></td>
                            <td>KHTML</td>
                            <td>Konqureror 3.5</td>
                            <td>KDE 3.5</td>
                            <td>3.5</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeX">
                            <td width="1%" class="f-s-600 text-inverse">47</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-5.jpg" class="img-rounded height-30" /></td>
                            <td>Tasman</td>
                            <td>Internet Explorer 4.5</td>
                            <td>Mac OS 8-9</td>
                            <td>-</td>
                            <td>X</td>
                        </tr>
                        <tr class="gradeC">
                            <td width="1%" class="f-s-600 text-inverse">48</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-6.jpg" class="img-rounded height-30" /></td>
                            <td>Tasman</td>
                            <td>Internet Explorer 5.1</td>
                            <td>Mac OS 7.6-9</td>
                            <td>1</td>
                            <td>C</td>
                        </tr>
                        <tr class="gradeC">
                            <td width="1%" class="f-s-600 text-inverse">49</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-7.jpg" class="img-rounded height-30" /></td>
                            <td>Tasman</td>
                            <td>Internet Explorer 5.2</td>
                            <td>Mac OS 8-X</td>
                            <td>1</td>
                            <td>C</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">50</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-8.jpg" class="img-rounded height-30" /></td>
                            <td>Misc</td>
                            <td>NetFront 3.1</td>
                            <td>Embedded devices</td>
                            <td>-</td>
                            <td>C</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">51</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-9.jpg" class="img-rounded height-30" /></td>
                            <td>Misc</td>
                            <td>NetFront 3.4</td>
                            <td>Embedded devices</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeX">
                            <td width="1%" class="f-s-600 text-inverse">52</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-10.jpg" class="img-rounded height-30" /></td>
                            <td>Misc</td>
                            <td>Dillo 0.8</td>
                            <td>Embedded devices</td>
                            <td>-</td>
                            <td>X</td>
                        </tr>
                        <tr class="gradeX">
                            <td width="1%" class="f-s-600 text-inverse">53</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-11.jpg" class="img-rounded height-30" /></td>
                            <td>Misc</td>
                            <td>Links</td>
                            <td>Text only</td>
                            <td>-</td>
                            <td>X</td>
                        </tr>
                        <tr class="gradeX">
                            <td width="1%" class="f-s-600 text-inverse">54</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-12.jpg" class="img-rounded height-30" /></td>
                            <td>Misc</td>
                            <td>Lynx</td>
                            <td>Text only</td>
                            <td>-</td>
                            <td>X</td>
                        </tr>
                        <tr class="gradeC">
                            <td width="1%" class="f-s-600 text-inverse">55</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-13.jpg" class="img-rounded height-30" /></td>
                            <td>Misc</td>
                            <td>IE Mobile</td>
                            <td>Windows Mobile 6</td>
                            <td>-</td>
                            <td>C</td>
                        </tr>
                        <tr class="gradeC">
                            <td width="1%" class="f-s-600 text-inverse">57</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-14.jpg" class="img-rounded height-30" /></td>
                            <td>Misc</td>
                            <td>PSP browser</td>
                            <td>PSP</td>
                            <td>-</td>
                            <td>C</td>
                        </tr>
                        <tr class="gradeU">
                            <td width="1%" class="f-s-600 text-inverse">58</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="img-rounded height-30" /></td>
                            <td>Other browsers</td>
                            <td>All others</td>
                            <td>-</td>
                            <td>-</td>
                            <td>U</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="panel panel-inverse">
                <div class="panel-heading ui-sortable-handle">
                    <h4 class="panel-title">Products</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>


                <div class="alert alert-purple fade show">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">×</span>
                    </button>
                    This trivial example shows the use of the rowReorder property being used to enable RowReorder on a DataTable. The first column in the table is a sequence number that provides the basis for the ordering. To change a row's order, simply click and drag the row.
                </div>


                <div class="panel-body">
                    <table id="data-table-rowreorder-products" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                        <tr>
                            <th width="1%">#</th>
                            <th width="1%" data-orderable="false"></th>
                            <th class="text-nowrap">Seller</th>
                            <th class="text-nowrap">Revenue</th>
                            <th class="text-nowrap">Units Sold</th>
                            <th class="text-nowrap">Market Share</th>
                            <th class="text-nowrap">CSS grade</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd gradeX">
                            <td width="1%" class="f-s-600 text-inverse">1</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="img-rounded height-30" /></td>
                            <td>Trident</td>
                            <td>Internet Explorer 4.0</td>
                            <td>Win 95+</td>
                            <td>4</td>
                            <td>X</td>
                        </tr>
                        <tr class="even gradeC">
                            <td width="1%" class="f-s-600 text-inverse">2</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-2.jpg" class="img-rounded height-30" /></td>
                            <td>Trident</td>
                            <td>Internet Explorer 5.0</td>
                            <td>Win 95+</td>
                            <td>5</td>
                            <td>C</td>
                        </tr>
                        <tr class="odd gradeA">
                            <td width="1%" class="f-s-600 text-inverse">3</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-3.jpg" class="img-rounded height-30" /></td>
                            <td>Trident</td>
                            <td>Internet Explorer 5.5</td>
                            <td>Win 95+</td>
                            <td>5.5</td>
                            <td>A</td>
                        </tr>
                        <tr class="even gradeA">
                            <td width="1%" class="f-s-600 text-inverse">4</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-4.jpg" class="img-rounded height-30" /></td>
                            <td>Trident</td>
                            <td>Internet Explorer 6</td>
                            <td>Win 98+</td>
                            <td>6</td>
                            <td>A</td>
                        </tr>
                        <tr class="odd gradeA">
                            <td width="1%" class="f-s-600 text-inverse">5</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-5.jpg" class="img-rounded height-30" /></td>
                            <td>Trident</td>
                            <td>Internet Explorer 7</td>
                            <td>Win XP SP2+</td>
                            <td>7</td>
                            <td>A</td>
                        </tr>
                        <tr class="even gradeA">
                            <td width="1%" class="f-s-600 text-inverse">6</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-6.jpg" class="img-rounded height-30" /></td>
                            <td>Trident</td>
                            <td>AOL browser (AOL desktop)</td>
                            <td>Win XP</td>
                            <td>6</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">7</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-7.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Firefox 1.0</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.7</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">8</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-8.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Firefox 1.5</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">9</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-9.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Firefox 2.0</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">10</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-10.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Firefox 3.0</td>
                            <td>Win 2k+ / OSX.3+</td>
                            <td>1.9</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">11</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-11.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Camino 1.0</td>
                            <td>OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">12</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-12.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Camino 1.5</td>
                            <td>OSX.3+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">13</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-13.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Netscape 7.2</td>
                            <td>Win 95+ / Mac OS 8.6-9.2</td>
                            <td>1.7</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">14</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-14.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Netscape Browser 8</td>
                            <td>Win 98SE+</td>
                            <td>1.7</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">15</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Netscape Navigator 9</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">16</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-2.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.0</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td>1</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">17</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-3.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.1</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td>1.1</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">18</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-4.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.2</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td>1.2</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">19</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-5.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.3</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td>1.3</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">20</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-6.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.4</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td>1.4</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">21</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-7.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.5</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td>1.5</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">22</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-8.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.6</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td>1.6</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">23</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-9.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.7</td>
                            <td>Win 98+ / OSX.1+</td>
                            <td>1.7</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">24</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-10.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Mozilla 1.8</td>
                            <td>Win 98+ / OSX.1+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">25</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-11.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Seamonkey 1.1</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">26</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-12.jpg" class="img-rounded height-30" /></td>
                            <td>Gecko</td>
                            <td>Epiphany 2.20</td>
                            <td>Gnome</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">27</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-13.jpg" class="img-rounded height-30" /></td>
                            <td>Webkit</td>
                            <td>Safari 1.2</td>
                            <td>OSX.3</td>
                            <td>125.5</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">28</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-14.jpg" class="img-rounded height-30" /></td>
                            <td>Webkit</td>
                            <td>Safari 1.3</td>
                            <td>OSX.3</td>
                            <td>312.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">29</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="img-rounded height-30" /></td>
                            <td>Webkit</td>
                            <td>Safari 2.0</td>
                            <td>OSX.4+</td>
                            <td>419.3</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">30</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-2.jpg" class="img-rounded height-30" /></td>
                            <td>Webkit</td>
                            <td>Safari 3.0</td>
                            <td>OSX.4+</td>
                            <td>522.1</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">31</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-3.jpg" class="img-rounded height-30" /></td>
                            <td>Webkit</td>
                            <td>OmniWeb 5.5</td>
                            <td>OSX.4+</td>
                            <td>420</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">32</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-4.jpg" class="img-rounded height-30" /></td>
                            <td>Webkit</td>
                            <td>iPod Touch / iPhone</td>
                            <td>iPod</td>
                            <td>420.1</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">33</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-5.jpg" class="img-rounded height-30" /></td>
                            <td>Webkit</td>
                            <td>S60</td>
                            <td>S60</td>
                            <td>413</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">34</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-6.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Opera 7.0</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">35</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-7.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Opera 7.5</td>
                            <td>Win 95+ / OSX.2+</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">36</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-8.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Opera 8.0</td>
                            <td>Win 95+ / OSX.2+</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">37</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-9.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Opera 8.5</td>
                            <td>Win 95+ / OSX.2+</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">38</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-10.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Opera 9.0</td>
                            <td>Win 95+ / OSX.3+</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">39</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-11.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Opera 9.2</td>
                            <td>Win 88+ / OSX.3+</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">40</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-12.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Opera 9.5</td>
                            <td>Win 88+ / OSX.3+</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">41</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-13.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Opera for Wii</td>
                            <td>Wii</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">42</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-14.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Nokia N800</td>
                            <td>N800</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">43</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="img-rounded height-30" /></td>
                            <td>Presto</td>
                            <td>Nintendo DS browser</td>
                            <td>Nintendo DS</td>
                            <td>8.5</td>
                            <td>C/A<sup>1</sup></td>
                        </tr>
                        <tr class="gradeC">
                            <td width="1%" class="f-s-600 text-inverse">44</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-2.jpg" class="img-rounded height-30" /></td>
                            <td>KHTML</td>
                            <td>Konqureror 3.1</td>
                            <td>KDE 3.1</td>
                            <td>3.1</td>
                            <td>C</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">45</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-3.jpg" class="img-rounded height-30" /></td>
                            <td>KHTML</td>
                            <td>Konqureror 3.3</td>
                            <td>KDE 3.3</td>
                            <td>3.3</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">46</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-4.jpg" class="img-rounded height-30" /></td>
                            <td>KHTML</td>
                            <td>Konqureror 3.5</td>
                            <td>KDE 3.5</td>
                            <td>3.5</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeX">
                            <td width="1%" class="f-s-600 text-inverse">47</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-5.jpg" class="img-rounded height-30" /></td>
                            <td>Tasman</td>
                            <td>Internet Explorer 4.5</td>
                            <td>Mac OS 8-9</td>
                            <td>-</td>
                            <td>X</td>
                        </tr>
                        <tr class="gradeC">
                            <td width="1%" class="f-s-600 text-inverse">48</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-6.jpg" class="img-rounded height-30" /></td>
                            <td>Tasman</td>
                            <td>Internet Explorer 5.1</td>
                            <td>Mac OS 7.6-9</td>
                            <td>1</td>
                            <td>C</td>
                        </tr>
                        <tr class="gradeC">
                            <td width="1%" class="f-s-600 text-inverse">49</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-7.jpg" class="img-rounded height-30" /></td>
                            <td>Tasman</td>
                            <td>Internet Explorer 5.2</td>
                            <td>Mac OS 8-X</td>
                            <td>1</td>
                            <td>C</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">50</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-8.jpg" class="img-rounded height-30" /></td>
                            <td>Misc</td>
                            <td>NetFront 3.1</td>
                            <td>Embedded devices</td>
                            <td>-</td>
                            <td>C</td>
                        </tr>
                        <tr class="gradeA">
                            <td width="1%" class="f-s-600 text-inverse">51</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-9.jpg" class="img-rounded height-30" /></td>
                            <td>Misc</td>
                            <td>NetFront 3.4</td>
                            <td>Embedded devices</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr class="gradeX">
                            <td width="1%" class="f-s-600 text-inverse">52</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-10.jpg" class="img-rounded height-30" /></td>
                            <td>Misc</td>
                            <td>Dillo 0.8</td>
                            <td>Embedded devices</td>
                            <td>-</td>
                            <td>X</td>
                        </tr>
                        <tr class="gradeX">
                            <td width="1%" class="f-s-600 text-inverse">53</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-11.jpg" class="img-rounded height-30" /></td>
                            <td>Misc</td>
                            <td>Links</td>
                            <td>Text only</td>
                            <td>-</td>
                            <td>X</td>
                        </tr>
                        <tr class="gradeX">
                            <td width="1%" class="f-s-600 text-inverse">54</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-12.jpg" class="img-rounded height-30" /></td>
                            <td>Misc</td>
                            <td>Lynx</td>
                            <td>Text only</td>
                            <td>-</td>
                            <td>X</td>
                        </tr>
                        <tr class="gradeC">
                            <td width="1%" class="f-s-600 text-inverse">55</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-13.jpg" class="img-rounded height-30" /></td>
                            <td>Misc</td>
                            <td>IE Mobile</td>
                            <td>Windows Mobile 6</td>
                            <td>-</td>
                            <td>C</td>
                        </tr>
                        <tr class="gradeC">
                            <td width="1%" class="f-s-600 text-inverse">57</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-14.jpg" class="img-rounded height-30" /></td>
                            <td>Misc</td>
                            <td>PSP browser</td>
                            <td>PSP</td>
                            <td>-</td>
                            <td>C</td>
                        </tr>
                        <tr class="gradeU">
                            <td width="1%" class="f-s-600 text-inverse">58</td>
                            <td width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="img-rounded height-30" /></td>
                            <td>Other browsers</td>
                            <td>All others</td>
                            <td>-</td>
                            <td>-</td>
                            <td>U</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="col-xl-5 ui-sortable">
            <div class="panel panel-inverse">
                <div class="panel-heading ui-sortable-handle">
                    <h4 class="panel-title">Report</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>

                </div>
                <div class="panel-body">
                    <div>
                        <dl class="row">
                            <dt class="text-inverse text-right col-4 text-truncate">Category ID</dt>
                            <dd class="col-8 text-truncate">Moda</dd>
                            <dt class="text-inverse text-right col-4 text-truncate">Total revenue</dt>
                            <dd class="col-8 text-truncate">1 000 000 zł</dd>
                            <dt class="text-inverse text-right col-4 text-truncate">Avg. Daily Revenue</dt>
                            <dd class="col-8 text-truncate">152,38 zł</dd>
                        </dl>

                    </div>
                </div>
            </div>
            <div class="panel panel-inverse">
                <div class="panel-heading ui-sortable-handle">
                    <h4 class="panel-title">Sales</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-white btn-xs active">
                            <input type="radio" name="options" id="option1" checked /> Dzień
                        </label>
                        <label class="btn btn-white btn-xs">
                            <input type="radio" name="options" id="option2" /> Tydzień
                        </label>
                        <label class="btn btn-white btn-xs">
                            <input type="radio" name="options" id="option2" /> Miesiąc
                        </label>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>

                </div>
                <div class="panel-body">
                    <p>
                        A bar chart is a way of showing data as bars.
                        It is sometimes used to show trend data, and the comparison of multiple data sets side by side.
                    </p>
                    <div><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="bar-chart" data-render="chart-js" width="328" height="164" class="chartjs-render-monitor" style="display: block; width: 328px; height: 164px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="panel panel-inverse" data-sortable-id="flot-chart-3">
                <div class="panel-heading ui-sortable-handle">
                    <h4 class="panel-title">Radar Chart</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="panel-body">

                    <p>
                        A radar chart is a way of showing multiple data points and the variation between them.
                        They are often useful for comparing the points of two or more different data sets.
                    </p>
                    <div>
                        <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="radar-chart" data-render="chart-js" width="328" height="164" class="chartjs-render-monitor" style="display: block; width: 328px; height: 164px;"></canvas>
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
    <script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables.net-rowreorder/js/dataTables.rowreorder.min.js"></script>
    <script src="/assets/plugins/datatables.net-rowreorder-bs4/js/rowreorder.bootstrap4.min.js"></script>

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

        Chart.defaults.global.defaultFontColor = COLOR_DARK;
        Chart.defaults.global.defaultFontFamily = FONT_FAMILY;
        Chart.defaults.global.defaultFontStyle = FONT_WEIGHT;

        var randomScalingFactor = function() {
            return Math.round(Math.random()*100)
        };

        var barChartData = {
            labels: ['2020-11-01', '2020-11-02', '2020-11-03', '2020-11-04', '2020-11-05', '2020-11-06', '2020-11-07','2020-11-08','2020-11-09','2020-11-10'],
            datasets: [{
                label: 'Kurtki',
                borderColor: COLOR_BLUE,
                pointBackgroundColor: COLOR_BLUE,
                pointRadius: 2,
                borderWidth: 2,
                backgroundColor: COLOR_BLUE_TRANSPARENT_3,
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
            }, {
                label: 'Obuwie',
                borderColor: COLOR_DARK_LIGHTER,
                pointBackgroundColor: COLOR_DARK,
                pointRadius: 2,
                borderWidth: 2,
                backgroundColor: COLOR_DARK_TRANSPARENT_3,
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
            }]
        };


        var radarChartData = {
            labels: ['Sprzedane sztuki', 'Śr. cena produktu', 'Ilość ofert', 'Wartość sprzedaży'],
            datasets: [{
                label: 'Kurtki',
                borderWidth: 2,
                borderColor: COLOR_RED,
                pointBackgroundColor: COLOR_RED,
                pointRadius: 2,
                backgroundColor: COLOR_RED_TRANSPARENT_2,
                data: [2110420/(2110420+102302),35.4/(35.4+109.9),102/(102+350),10532/(105040+10532)]
            }, {
                label: 'Obuwie',
                borderWidth: 2,
                borderColor: COLOR_DARK,
                pointBackgroundColor: COLOR_DARK,
                pointRadius: 2,
                backgroundColor: COLOR_DARK_TRANSPARENT_2,
                data: [102302/(2110420+102302),109.9/(35.4+109.9),102/(102+350),105040/(105040+10532)]
            }]
        };

        var handleDataTableRowReorder = function() {
            "use strict";

            if ($('#data-table-rowreorder-seller').length !== 0) {
                $('#data-table-rowreorder-seller').DataTable({
                    responsive: true,
                    rowReorder: true
                });
            }

            if ($('#data-table-rowreorder-products').length !== 0) {
                $('#data-table-rowreorder-products').DataTable({
                    responsive: true,
                    rowReorder: true
                });
            }
        };

        var handleChartJs = function() {

            var ctx2 = document.getElementById('bar-chart').getContext('2d');
            var barChart = new Chart(ctx2, {
                type: 'bar',
                data: barChartData,
                order:1,
            });

            var ctx3 = document.getElementById('radar-chart').getContext('2d');
            var radarChart = new Chart(ctx3, {
                type: 'radar',
                data: radarChartData
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
                    handleDataTableRowReorder();
                    handleChartJs();
                }
            };
        }();

        $(document).ready(function() {
            Category.init();
            TableManageRowReorder.init();
        });

    </script>
@endpush

