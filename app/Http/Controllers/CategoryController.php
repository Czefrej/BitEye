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
    public function show(){
        $o = Offer::select("*")
            ->whereRaw("MATCH(name,ean) AGAINST('karmidło')")->limit(10)->get();

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
            $categories = explode(";",$categories);
            try {
                $categories = Category::findMany($categories);
                dd($categories);
                //return redirect("app/offer/$id/$daterange[0]/$daterange[1]")->withInput();

            } catch (modelnotfoundexception $e) {
                $validator->getmessagebag()->add("not_found", __("offer.notFound"));
                return back()->witherrors($validator)->withinput();
            }
        }else {
            return back()->witherrors($validator)->withinput();
        }

    }
}
