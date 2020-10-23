<?php
namespace App\Services;

use App\Models\SellerChange;
use App\Models\Offer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SellerHistoryService{


    public static function getCurrentDetails(Offer $offer)
    {
        return SellerChange::select(["*"])->where('seller_id', "=", "?")
            ->setBindings([$offer->seller->id])->first();
    }

}
