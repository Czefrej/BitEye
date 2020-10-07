<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Seller;
use App\Models\SellerChange;
use App\Models\OfferChange;
use App\Models\APICredential;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        return view('pages.offers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id != null) {
            try{
                $offer = Offer::findOrFail($id);
                #$seller = $offer->seller->changes->selectRaw("(SELECT login FROM seller WHERE login != null ORDER BY creation_date DESC LIMIT 1)")->first();
                $seller = SellerChange::selectRaw("
                        (SELECT login FROM seller_change WHERE login is not null AND seller_id = ? ORDER BY creation_date DESC LIMIT 1) as login,
                        (SELECT super_seller FROM seller_change WHERE super_seller is not null AND seller_id = ? ORDER BY creation_date DESC LIMIT 1) as super_seller,
                        (SELECT company FROM seller_change WHERE company is not null AND seller_id = ? ORDER BY creation_date DESC LIMIT 1) as company")
                    ->where('seller_id', "=", "?")
                    ->setBindings([$offer->seller->id, $offer->seller->id, $offer->seller->id, $offer->seller->id])->first();

                $offerDetails = OfferChange::selectRaw("
                            (SELECT name FROM offer_change WHERE name is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as name,
                            (SELECT stock FROM offer_change WHERE stock is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as stock,
                            (SELECT transactions FROM offer_change WHERE transactions is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as transactions,
                            (SELECT promo_bold FROM offer_change WHERE promo_bold is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as promo_bold,
                            (SELECT promo_highlight FROM offer_change WHERE promo_highlight is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as promo_highlight,
                            (SELECT promo_emphasized FROM offer_change WHERE promo_emphasized is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as promo_emphasized,
                            (SELECT free_delivery FROM offer_change WHERE free_delivery is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as free_delivery,
                            (SELECT lowest_delivery_price FROM offer_change WHERE lowest_delivery_price is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as lowest_delivery_price,
                            (SELECT price FROM offer_change WHERE price is not null AND offer_id = ? ORDER BY creation_date DESC LIMIT 1) as price,
                            creation_date")
                    ->where('offer_id', "=", "?")
                    ->setBindings([$offer->id, $offer->id, $offer->id, $offer->id, $offer->id, $offer->id, $offer->id, $offer->id, $offer->id, $offer->id])->first();
                #$seller = $offer->seller->changes->selectRawwhere("login","!=",null)->sortByDesc("creation_date")->first();
                $category = $offer->category;
            }catch(ModelNotFoundException $e)
            {
                return view('pages.offers');
            }
            /*while($category['parent-id'] != 0){
                $category = $category->parentCategory;
                array_push($categoriesBreadCrumb,$category);
                if($i == 2)
                    break;
                $i++;
            }*/
            return view('pages.offers', ['offer' => $offer, 'seller' => $seller, 'offerDetails' => $offerDetails, 'category' => $category]);
        }else{
            return view('pages.offers');
        }
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
