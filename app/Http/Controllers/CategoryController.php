<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //
    public function show($fromDate,$toDate,$categories){

        $data = array(
            "categories" => str_replace("/",";",$categories),
            "daterange"=>$fromDate." - ".$toDate
        );

        $validator = $this->validator($data);
        if (!$validator->fails()) {
            $categories = explode(";",$categories);
            $numberOfCategories = sizeof($categories);
            $categ = Category::findMany($categories);
            if($categ->count() == $numberOfCategories){
                $offer = Offer::select("*")->join("offer_change","offer.offer_id","=","offer_change.offer_id")
                    ->whereBetween("offer_change.creation_date",[$fromDate,$toDate])
                    ->whereIn("offer.category_id",$categories)->groupBy('offer_change.creation_date')->sum('stock');
                dd($offer);
            }else{
                $validator->getmessagebag()->add("not_found", __("offer.notFound"));
                return back()->witherrors($validator)->withinput();
            }
        }else{
            return redirect(route("category.index"))->withErrors($validator);
        }

    }

    protected function validator(array $data){
        return Validator::make($data, [
            'categories' => ['required', 'regex:/^[0-9]+(;[0-9]*)*$/'],
            'daterange' => ['regex:/[0-9]{4}-[0-9]{2}-[0-9]{2} - [0-9]{4}-[0-9]{2}-[0-9]{2}/'],
        ]);
    }

    public function processForm(Request $request){
        $keywords = $request->input("keywords");
        $categories = $request->input("categories");
        $date = $request->input('daterange');

        $data = array(
            "categories" => $categories,
            "daterange"=>$date
        );
        $validator = $this->validator($data);
        if (!$validator->fails()) {
            $daterange = explode(" - ",$date);
            $categoryString = str_replace(";","/",$categories);
            $categories = explode(";",$categories);
            $numberOfCategories = sizeof($categories);
            try {
                $categories = Category::findMany($categories);
                if($categories->count() == $numberOfCategories)
                    return redirect("app/category/$daterange[0]/$daterange[1]/$categoryString")->withInput();
                else{
                    $validator->getmessagebag()->add("not_found", __("offer.notFound"));
                    return back()->witherrors($validator)->withinput();
                }
            } catch (modelnotfoundexception $e) {
                $validator->getmessagebag()->add("not_found", __("offer.notFound"));
                return back()->witherrors($validator)->withinput();
            }
        }else {
            return back()->witherrors($validator)->withinput();
        }

    }
}
