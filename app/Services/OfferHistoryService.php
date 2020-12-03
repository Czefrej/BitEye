<?php

namespace App\Services;

use \App\Models\OfferChange;
use \App\Models\Offer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OfferHistoryService
{

    public static function getCurrentDetails(Offer $offer)
    {
        // logic here...

        return OfferChange::select(["*"])->where('offer_id', "=", "?")->orderBy("creation_date","DESC")
            ->setBindings([$offer->offer_id])->first();
    }

    public static function getPriceChartdata($fetchedOfferHistory){
        if($fetchedOfferHistory) {
            $last_price = 0;
            $last_stock = 0;
            $data = array("datetime" => array(), "price" => array(),"stock" => array());

            foreach ($fetchedOfferHistory as $o) {

                $data['datetime'][sizeof($data['datetime'])] = $o->creation_date;
                if ($o->price == null)
                    $data["price"][sizeof($data["price"])] = $last_price;
                else {
                    $data["price"][sizeof($data["price"])] = $o->price;
                    $last_price = $o->price;
                }

                if ($o->stock == null)
                    $data["stock"][sizeof($data["stock"])] = $last_stock;
                else {
                    $data["stock"][sizeof($data["stock"])] = $o->stock;
                    $last_stock = $o->stock;
                }

            }

            return $data;
        }else return false;
    }

    public static function getTransactionsChartData($fetchedOfferHistory){
        if($fetchedOfferHistory) {
            $last_price = 0;
            $last_stock = 0;
            $last_date = "";
            $i = 0;
            $data = array("datetime" => array() , "units-sold"=> array(), "revenue"=>array());

            foreach ($fetchedOfferHistory as $o) {


                if(sizeof($data['datetime']) == 0)
                    $data['datetime'][sizeof($data['datetime'])] = "Punkt początkowy";
                else
                    if($last_date != $o->creation_day)
                        $data['datetime'][sizeof($data['datetime'])] = $o->creation_day;

                if($o->creation_day != $last_date || $i == 0) {
                    $index = sizeof($data["units-sold"]);
                }else
                    $index=sizeof($data["units-sold"])-1;


                $last_date = $o->creation_day;

                if ($o->stock == null)
                    $data["units-sold"][$index] = 0;
                else {
                    $units_sold= $last_stock - $o->stock;
                    if($units_sold<0) {
                        $data["units-sold"][$index] = 0;
                    }else {
                        if ($o->stock > $last_stock) {
                            $units_sold = 0;
                        }
                        if (isset($data["units-sold"][$index]))
                            $data["units-sold"][$index] += $units_sold;
                        else
                            $data["units-sold"][$index] = $units_sold;
                    }
                    $last_stock = $o->stock;
                }


                $i++;
            }

            return $data;
        }else return false;
    }

}
