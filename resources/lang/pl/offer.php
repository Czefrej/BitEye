<?php
$currentPlan = Auth::user()->type;
$availableHistory = config("subscription_plans.$currentPlan.search.availableHistory")-1;
return [
    "notFound"=>"Nie udało nam się znaleźć aukcji o podanym numerze.",
    "dateframe-required" => "Zapytanie powinno zawierać datę początkową i końcową (numer-kategorii/numer-aukcji/data-od/data-do).",
    "notEnoughData" => "Oferta o podanym id nie posiada wystarczającej ilości danych. Poczekaj na dane lub zmień okres wyszukiwania.",
    "requestNotCoveredBySubscriptionPlan" => "Twój plan umożliwia wyszukiwanie danych z przed maksymalnie $availableHistory dni",
];
