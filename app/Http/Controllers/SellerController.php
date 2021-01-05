<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Seller;
use App\Models\Offer;
use App\Models\SellerChange;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class SellerController extends Controller
{
    //
    public function show($id,$fromDate, $toDate, $categories)
    {
        if($id == null){
            return view('pages.sellers');
        }

        if($categories == null){
            return view('pages.sellers');
        }


        $categoryString = str_replace("/",";",$categories);
        $categories = explode("/",$categories);
        $numberOfCategories = sizeof($categories);

        if($fromDate != null && $toDate != null)
            $data = array(
                "seller"=>$id
            ,"daterange"=>$fromDate." - ".$toDate
            ,"categories" => str_replace("/",";",$categories));
        else{
            $messageBag = new MessageBag;
            $messageBag->add(0,__("seller.dateframe-required"));
            return redirect(route("seller.index"))->with(["errors" => $messageBag]);
        }

        $validator = $this->validator($data);

        if(!$validator->fails()) {
            $categories = Category::findMany($categories);
            if($categories->count() != $numberOfCategories){
                $messageBag = new MessageBag;
                $messageBag->add(0,__("seller.InvalidCategory"));
                return redirect(route("seller.index"))->with(["errors" => $messageBag]);
            }


            $seller = Seller::select(["seller.seller_id","login","super_seller","company","seller_change.creation_date"])
                ->join('seller_change','seller_change.seller_id','=','seller.seller_id')
                ->where("seller_change.creation_date",">=",$fromDate)
                ->where("seller_change.creation_date","<=",$toDate)
                ->where("seller.seller_id","=",$id)
                ->orderBy("seller_change.creation_date","ASC")
                ->get();
            $recent = Seller::select(["login","super_seller","seller_change.creation_date"])
                ->join('seller_change','seller_change.seller_id','=','seller.seller_id')
                ->where("seller.seller_id","=",$id)
                ->orderBy("seller_change.creation_date","DESC")->firstOrFail();


//                $offers = Offer::selectRaw("")
//                    ->join("category","category.id","=","offer.category_id")
//                    ->where("seller_id","=",$id)->groupBy('category_id')->get();
//                dd($offers);
            if(sizeof($seller)>0)
                return view('pages.sellers', ['sellerData' => $seller,'recentSellerData'=>$recent]);
            else{
                $messageBag = new MessageBag;
                $messageBag->add(0,__("seller.notEnoughData"));
                return redirect(route("seller.index"))->with(["errors" => $messageBag]);
            }
        }else{
            return redirect(route("seller.index"))->withErrors($validator);
        }
    }



    protected function validator(array $data){
        return Validator::make($data, [
            'seller' => ['required', 'max:30'],
            'daterange' => ['regex:/[0-9]{4}-[0-9]{2}-[0-9]{2} - [0-9]{4}-[0-9]{2}-[0-9]{2}/'],
            'categories' => ['required'],
        ]);
    }

    public function processForm(Request $request){
        $id = strtolower($request->input('seller'));
        $date = $request->input('daterange');
        $categories = $request->input("categories");

        $data = array(
            "seller" => $id,
            "daterange" => $date,
            "categories" => $categories,
        );
        $validator = $this->validator($data);

        if (!$validator->fails()) {
            $daterange = explode(" - ",$date);

            $categoryString = str_replace(";","/",$categories);
            $categories = explode(";",$categories);
            $numberOfCategories = sizeof($categories);

            try {


                $seller = Seller::select('seller_id')
                    ->where('login','=',$id)->firstOrFail();
                return redirect("app/seller/$seller->seller_id/$daterange[0]/$daterange[1]/$categoryString")->withInput();

            } catch (modelnotfoundexception $e) {
                $validator->getmessagebag()->add("not_found", __("offer.notFound"));
                return back()->witherrors($validator)->withinput();
            }
        } else {
            return back()->witherrors($validator)->withinput();
        }
    }
}
