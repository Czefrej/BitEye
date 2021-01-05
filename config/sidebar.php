<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */
  'menu' => [
//      [
//      'icon' => 'fa fa-th-large',
//      'title' => 'Dashboard',
//      'url' => '/app/',
//      'caret' => false,
//  ],
//      [
//      'icon' => 'fa fa-chart-bar',
//      'title' => 'Raporty',
//      'url' => 'javascript:;',
//      'caret' => true,
//      'sub_menu' => [[
//          'url' => '/app/category',
//          'title' => 'Raport kategorii'
//      ]]
//  ],
      [
      'icon' => 'fa fa-hdd',
      'title' => 'Aukcje',
      'url' => '/app/offer'
  ],[
    'icon' => 'fa fa-user',
    'title' => 'Sprzedawcy',
    'url' => '/app/seller'
	],
      [
		'icon' => 'fa fa-rocket',
		'title' => 'API',
		'label' => 'Wkrótce',
		'url' => 'javascript:;'
	]]
];
