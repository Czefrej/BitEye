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

        return OfferChange::selectRaw("
                            (SELECT name FROM offer_change WHERE name is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as name,
                            (SELECT stock FROM offer_change WHERE stock is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as stock,
                            (SELECT transactions FROM offer_change WHERE transactions is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as transactions,
                            (SELECT promo_bold FROM offer_change WHERE promo_bold is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as promo_bold,
                            (SELECT promo_highlight FROM offer_change WHERE promo_highlight is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as promo_highlight,
                            (SELECT promo_emphasized FROM offer_change WHERE promo_emphasized is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as promo_emphasized,
                            (SELECT free_delivery FROM offer_change WHERE free_delivery is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as free_delivery,
                            (SELECT lowest_delivery_price FROM offer_change WHERE lowest_delivery_price is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as lowest_delivery_price,
                            (SELECT price FROM offer_change WHERE price is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as price,
                            creation_date")->where('offer_id', "=", "?")->orderBy("creation_date","DESC")
            ->setBindings([$offer->id, $offer->id, $offer->id, $offer->id, $offer->id, $offer->id, $offer->id, $offer->id, $offer->id, $offer->id])->first();
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

}
