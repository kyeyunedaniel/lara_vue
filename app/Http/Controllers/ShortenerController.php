<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shortener;

class ShortenerController extends Controller
{
    //
    public function AddLongUrl(Request $request){
        $short = new Shortener;
        $short->long_url= request()->longurl;
        $short->save();
        return (request()->longurl);
    }
}
