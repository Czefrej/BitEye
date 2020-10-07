<?php

namespace App\Http\Controllers;

use App\Models\APICredential;
use Illuminate\Http\Request;

class APIController extends Controller
{
    //

    public function store(Request $request)
    {
        //
        $api = new APICredential();
        $api->setAttribute('client-id', $request->input(['id']));
        $api->secret = $request->input(['secret']);
        $api->save();
        return redirect("/input");

    }
}
