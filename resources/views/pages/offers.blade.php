@extends('layouts.default')

@section('title', 'Dashboard V1')

@push('css')
	<link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
	<link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
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
					<form>
						<div class="row form-group m-b-10">
							<div class="col-xl-3">

							</div>
							<div class="input-group text-center col-xl-6">
								<div class="input-group-prepend"><span class="input-group-text">https://allegro.pl/oferta/</span></div>
								<input type="number" name="auctionNumber" class="form-control" placeholder="Numer oferty" required pattern="[0-9]{11}">

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

		<div class="col-xl-12 ui-sortable">

			<div class="panel panel-inverse" data-sortable-id="form-stuff-8">

				<div class="panel-heading ui-sortable-handle">
					<h4 class="panel-title">Oferta #{numer aukcji} - {tytuł aukcji}</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					</div>
				</div>


				<div class="panel-body">
					<div class="row form-group m-b-10">
						<div class="col-xl-6 text-center">
							<img src="https://a.allegroimg.com/original/1ebc55/9a8462ce4985a59e70c0149e5a3c" width="50%" alt="{title}" class="img-thumbnail">
						</div>
						<div class="text-center col-xl-6">
							<div class="text-gray text-right col-xl-12 mb-5">
								<small>Supermarket  /  Artykuły dla zwierząt  / Dla kotów  /  Karmy  /  Mokra karma</small>
							</div>
							<div>
								<h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
								<p class="text-gray">od <img src="https://assets.allegrostatic.com/metrum/icon/super-seller-af2bec0d44.svg" height="16px">Super Sprzedawcy <a target="_blank" rel="noopener noreferrer" href="https://allegro.pl/uzytkownik/karma-as">karma-as <i class="fa fa-external-link-alt"></i> </a>(firma)</p>
							</div>

							<div>
								<hr>
								<div class="text-left">
									<h3>30.00 zł <img src="https://assets.allegrostatic.com/freebox/icons/FREEBOX_NOMARGIN.svg" height="16px" alt="Allegro Smart!"></h3>

									<p class="text-gray">38 osób kupiło 10 sztuk</p>

									<div class="text-right">
										<small>
											<i class="fa fa-bullhorn text-gray-lighter" data-toggle="tooltip" data-placement="bottom" title="Promowanie"></i>
											<i class="fa fa-h-square" data-toggle="tooltip" data-placement="bottom" title="Podświetlenie"></i>
											<i class="fa fa-bold" data-toggle="tooltip" data-placement="bottom" title="Pogrubienie"></i>
											<i class="fa fa-underline" data-toggle="tooltip" data-placement="bottom" title="Podkreślenie"></i>
										</small>
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
							<small>Data utworzenia w systemie: 2020-20-21 5:36</small>
							<br>
							<small>Ostania aktualizacja: 2020-20-21 5:36</small>
						</div>
					</div>

				</div>


			</div>

		</div>
	</div>
@endsection

@push('scripts')
	<script src="/assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.time.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.resize.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.pie.js"></script>
	<script src="/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="/assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
	<script src="/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
	<script src="/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
	<script src="/assets/js/demo/dashboard.js"></script>
@endpush
