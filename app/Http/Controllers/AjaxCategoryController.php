<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AjaxCategoryController extends Controller
{
    public function show($category_id){
        $categories = Category::select(['id','name'])
            ->where("parent-id","=","?")
            ->setBindings(array($category_id))
            ->get();

        $array = [];

        foreach ($categories as $c){
            $array[$c['id']]=$c['name'];
        }

        return response()->json(array('response'=>$array),200);
    }

    public function index() {
        $categories = Category::select(['id','name','parent-id'])->get();

        $array = [];

        foreach ($categories as $c){
            if($c['parent-id'] == 0)
                $parent = "#";
            else{
                $parent = $c['parent-id'];
            }
            $array[sizeof($array)] = [
                'id' => $c['id'],
                'parent' => $parent,
                'text' => $c['name']
            ];

        }
        return response()->json($array, 200);
    }
}
