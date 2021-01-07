<?php
namespace App\Services;

use App\Models\SellerChange;
use App\Models\Offer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SellerHistoryService{


    public static function getCurrentDetails(Offer $offer)
    {
        return SellerChange::select(["*"])->join("seller","seller.seller_id","=","seller_change.seller_id")->where('seller_change.seller_id', "=", "?")
            ->setBindings([$offer->seller->seller_id])->first();
    }

}
