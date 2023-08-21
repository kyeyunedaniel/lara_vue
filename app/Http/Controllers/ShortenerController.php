<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shortener;
use Illuminate\Support\Carbon;

class ShortenerController extends Controller
{
    //
    public function AddLongUrl(Request $request){
        $short = new Shortener;
        $short->long_url = request()->long_url;
        // $short->save();

        // make the short url and save it 

        //get the site url
        $local_site_url= 'http://127.0.0.1:8000/short/';

        //get the links after to which the get is input 

        //generate a randon value for the url
        // $now = Carbon::now();
        $digit_1=rand(0,9);
        $digit_2=rand(0,9);
        $randomLetters = '';
        for ($i = 0; $i < 3; $i++) {
            $randomAscii = mt_rand(97, 122); // ASCII for 'a' to 'z'
            $randomLetter = chr($randomAscii);
            $randomLetters .= $randomLetter;
        }

        $generated_short_url = $local_site_url.$digit_1.$randomLetters.$digit_2;
        $short->short_url= $generated_short_url;
        $short->save();
        
        return ($generated_short_url);
    }
}
