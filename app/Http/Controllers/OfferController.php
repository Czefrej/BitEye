<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Seller;
use App\Models\SellerChange;
use App\Models\OfferChange;
use App\Models\APICredential;
use App\Models\Category;
use App\Services\OfferHistoryService;
use App\Services\SellerHistoryService;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;


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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($id,$fromDate = null, $toDate = null)
    {
        if($fromDate == null && $toDate == null){
            $data = array("auctionNumber"=>$id);
        }else{
            if($fromDate != null && $toDate != null)
                $data = array("auctionNumber"=>$id,"daterange"=>$fromDate." - ".$toDate);
            else{
                $messageBag = new MessageBag;
                $messageBag->add(0,__("offer.dateframe-required"));
                return redirect(route("offer.index"))->with(["errors" => $messageBag]);
            }
        }

        $validator = $this->validator($data);
        if(!$validator->fails()) {
            if ($id != null) {
                try {
                    $offer = Offer::findOrFail($id);
                    $category = $offer->category;
                    #$seller = $offer->seller->changes->selectRaw("(SELECT login FROM seller WHERE login != null ORDER BY creation_date DESC LIMIT 1)")->first();
                    if($fromDate != null && $toDate != null) {
                        $offerHistory = $offer->changes->where('creation_date', '>=', "$fromDate")->where('creation_date', '<=', "$toDate");
//                        $offerHistory = OfferChange::where('offer_id', '=', '?')
//                            ->where('creation_date', '>=', '?')
//                            ->where('creation_date', '<=', '?')
//                            ->setBindings([$id, $fromDate, $toDate])->get();

                        $sellerDetails = SellerHistoryService::getCurrentDetails($offer);
                        $offerDetails = OfferHistoryService::getCurrentDetails($offer);
                        return view('pages.offers', ['offer' => $offer, 'seller' => $sellerDetails, 'offerDetails' => $offerDetails, 'category' => $category, 'history' => $offerHistory,'fromDate'=>$fromDate,'toDate'=>$toDate,'priceChartData'=>OfferHistoryService::getPriceChartdata($offerHistory)]);
                    }else{
                        $offerHistory = $offer->changes;
                        $sellerDetails = SellerHistoryService::getCurrentDetails($offer);
                        $offerDetails = OfferHistoryService::getCurrentDetails($offer);
                        return view('pages.offers', ['offer' => $offer, 'seller' => $sellerDetails, 'offerDetails' => $offerDetails, 'category' => $category, 'history' => $offerHistory]);
                    }

                } catch (ModelNotFoundException $e) {
                    return view('pages.offers');
                }
                /*while($category['parent-id'] != 0){
                    $category = $category->parentCategory;
                    array_push($categoriesBreadCrumb,$category);
                    if($i == 2)
                        break;
                    $i++;
                }*/
            } else {
                return view('pages.offers');
            }
        }else{
            return redirect(route("offer.index"))->withErrors($validator);
        }
        //
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'auctionNumber' => ['required', 'numeric', 'digits:10'],
            'daterange' => ['regex:/[0-9]{4}-[0-9]{2}-[0-9]{2} - [0-9]{4}-[0-9]{2}-[0-9]{2}/']
        ]);
    }

    public function processForm(Request $request)
    {
        $id = $request->input('auctionNumber');
        $date = $request->input('daterange');

        $data = array(
            "auctionNumber" => $id,
            "daterange" => $date
        );
        $validator = $this->validator($data);
        if (!$validator->fails()) {
            $daterange = explode(" - ",$date);
            try {
                $offer = offer::findorfail($id);
                return redirect("app/offer/$id/$daterange[0]/$daterange[1]")->withInput();

            } catch (modelnotfoundexception $e) {
                $validator->getmessagebag()->add("not_found", __("offer.notfound"));
                return back()->witherrors($validator)->withinput();
            }
        } else {
            return back()->witherrors($validator)->withinput();
        }

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
