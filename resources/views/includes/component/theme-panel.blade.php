<!-- begin theme-panel -->
<div class="theme-panel theme-panel-lg">
	<a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
	<div class="theme-panel-content">
		<h5>Ustawienia aplikacji</h5>
        <div class="divider"></div>
        <h5>Ogólne</h5>
		<div class="row m-t-10">
			<div class="col-8 control-label text-inverse f-w-600">Filtruj niepoprawne dane</div>
			<div class="col-4 d-flex">
				<div class="custom-control custom-switch ml-auto">
					<input type="checkbox" class="custom-control-input" name="settingsFilterData" id="settingsFilterData"/>
					<label class="custom-control-label" for="settingsFilterData">&nbsp;</label>
				</div>
			</div>
		</div>
		<div class="divider"></div>
		<h5>Język</h5>
        <div class="row m-t-10">
            @if(app()->getLocale() == "pl")
                <a href="/lang/en" class="btn btn-default btn-block btn-rounded"><b>English</b></a>
            @else
                <a href="/lang/pl" class="btn btn-default btn-block btn-rounded"><b>Polski</b></a>
            @endif
        </div>
		<div class="divider"></div>
{{--		<div class="row m-t-10">--}}
{{--			<div class="col-md-12">--}}
{{--				<a href="https://seantheme.com/color-admin/documentation/" class="btn btn-inverse btn-block btn-rounded" target="_blank"><b>Documentation</b></a>--}}
{{--				<a href="javascript:;" class="btn btn-default btn-block btn-rounded" data-click="reset-local-storage"><b>Reset Local Storage</b></a>--}}
{{--			</div>--}}
{{--		</div>--}}
	</div>
</div>



<!-- end theme-panel -->
