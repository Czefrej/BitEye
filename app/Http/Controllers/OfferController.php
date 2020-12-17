<?php

namespace App\Http\Controllers;

use App\Exceptions\NotEnoughDataException;
use App\Models\Offer;
use App\Models\Seller;
use App\Models\SellerChange;
use App\Models\OfferChange;
use Illuminate\Support\Facades\DB;
use App\Models\APICredential;
use App\Models\Category;
use App\Services\OfferHistoryService;
use App\Services\SellerHistoryService;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use mysql_xdevapi\Exception;


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
    public function show($category_id,$id,$fromDate = null, $toDate = null)
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
                    $offer = Offer::select("*")
                        ->where("category_id","=","?")
                        ->where("offer_id","=","?")
                        ->setBindings([$category_id,$id])->firstOrFail();
                    $category = $offer->category;

                    $category_path[0] = array("id"=>$category->id,"name"=>$category->name);

                    $next = $category->parent()->get()->first();
                    while($next != null){
                        $category_path[sizeof($category_path)] = array("id"=>$next->id,"name"=>$next->name);
                        $next = $next->parent()->get()->first();
                    }
                    $category_path = array_reverse($category_path);

                    if($fromDate != null && $toDate != null) {

                        $offerHistory = OfferChange::selectRaw("transactions,price,stock,NVL(lag(offer_change.stock) over (order by offer_change.creation_date) - offer_change.stock, 0) as units,units*price as revenue,offer_change.creation_date as date")
                            ->where('date', '>=', DB::Raw("dateadd(day,-1,'$fromDate')"))
                            ->where('date', '<=', "$toDate")
                            ->where('offer_change.offer_id',"=",$id)->orderBy("date","asc")
                            ->get();
                        $offerData = array();
                        if($offerHistory->count()>1) {
                            $i = -1;

                            $restocked = false;
                            foreach ($offerHistory as $row) {
                                if ($i >= 0) {
                                    $offerData["price"][$i] = $row->price;
                                    $offerData["stock"][$i] = $row->stock;
                                    if ($row->units < 0) {
                                        $restocked = true;
                                        $offerData["units_sold"][$i] = 0;
                                        $offerData["revenue"][$i] = 0;
                                        $offerData['censured']["revenue"][$i] = null;
                                        $offerData['censured']["units_sold"][$i] = null;
                                    } else {
                                        $offerData["units_sold"][$i] = $row->units;
                                        $offerData["revenue"][$i] = $row->revenue;
                                        $offerData['censured']["revenue"][$i] = $row->revenue;
                                        $offerData['censured']["units_sold"][$i] = $row->revenue;
                                    }
                                    $offerData['date'][$i] = $row->date;
                                    $offerData['transactions'][$i] = $row->transactions;
                                }
                                $i++;
                            }
                        }else throw new NotEnoughDataException("Not enough data");

//                        $offerHistory = OfferChange::select(["price", "stock", "transactions", "creation_date",DB::raw("Date(creation_date) as creation_day")])
//                            ->where(DB::Raw('DATE(creation_date)'), '>=', "$fromDate")
//                            ->where(DB::Raw('DATE(creation_date)'), '<=', "$toDate")
//                            ->where("offer_id","=","$id")->get();
//
                        $sellerDetails = SellerHistoryService::getCurrentDetails($offer);
                        $offerDetails = OfferHistoryService::getCurrentDetails($offer);

                        $totalStats = array();
                        $totalStats['revenue'] = 0;
                        $totalStats['units_sold'] = 0;
                        for($i=0;$i<sizeof($offerData['date']);$i++){
                            if($offerData['revenue'][$i]>=0)
                                $totalStats['revenue'] += $offerData['revenue'][$i];
                            if($offerData['revenue'][$i]>=0)
                                $totalStats['units_sold'] += $offerData['units_sold'][$i];
                        }

                        return view('pages.offers', ['offer' => $offer,
                            'seller' => $sellerDetails, 'offerDetails' => $offerDetails,
                            'category_path' => $category_path, 'history' => $offerHistory,
                            'fromDate'=>$fromDate,'toDate'=>$toDate,
                            'historicalData'=>$offerData,'totalStats'=>$totalStats,'restocked'=>$restocked]);
                    }else{
                        $offerHistory = $offer->changes;
                        $sellerDetails = SellerHistoryService::getCurrentDetails($offer);
                        $offerDetails = OfferHistoryService::getCurrentDetails($offer);
                        return view(
                            'pages.offers', ['offer' => $offer,
                            'seller' => $sellerDetails, 'offerDetails' => $offerDetails,
                                'category' => $category, 'history' => $offerHistory]);
                    }

                } catch (ModelNotFoundException $e) {
                    $messageBag = new MessageBag;
                    $messageBag->add(0,__("offer.notFound"));
                    return redirect(route("offer.index"))->with(["errors" => $messageBag]);
                } catch (NotEnoughDataException $e){
                    $messageBag = new MessageBag;
                    $messageBag->add(0,__("offer.notEnoughData"));
                    return redirect(route("offer.index"))->with(["errors" => $messageBag]);
                }
            } else {
                return view('pages.offers');
            }
        }else{
            return redirect(route("offer.index"))->withErrors($validator);
        }

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
                $offer = offer::select('category_id')->findorfail($id);
                return redirect("app/offer/$offer->category_id/$id/$daterange[0]/$daterange[1]")->withInput();

            } catch (modelnotfoundexception $e) {
                $validator->getmessagebag()->add("not_found", __("offer.notFound"));
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
