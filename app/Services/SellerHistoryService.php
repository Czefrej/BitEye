<?php
namespace App\Services;

use App\Models\SellerChange;
use App\Models\Offer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SellerHistoryService{


    public static function getCurrentDetails(Offer $offer)
    {
        return SellerChange::selectRaw("
                        (SELECT login FROM seller_change WHERE login is not null AND seller_id = ? ORDER BY creation_date DESC LIMIT 1) as login,
                        (SELECT super_seller FROM seller_change WHERE super_seller is not null AND seller_id = ? ORDER BY creation_date DESC LIMIT 1) as super_seller,
                        (SELECT company FROM seller_change WHERE company is not null AND seller_id = ? ORDER BY creation_date DESC LIMIT 1) as company")
            ->where('seller_id', "=", "?")
            ->setBindings([$offer->seller->id, $offer->seller->id, $offer->seller->id, $offer->seller->id])->first();
    }

}
