<?php

namespace App\Http\Controllers;

use App\RomanNumeralsConversion;
use Illuminate\Http\Request;

class RomanNumeralsController extends Controller
{


    /**
     * Convert a decimal and store it in the db.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function convert(Request $request)
    {   


        //convert decimal

        //check if conversion already exists

        //increment if exists else store conversion

        return "convert";
    }

    /**
     * get latest (last 15).
     *
     * @return \Illuminate\Http\Response
     */
    public function getLatest()
    {
        $conversions = RomanNumeralsConversion::orderBy('updated_at', 'desc')->limit(15)->get();
        return $conversions;
        
    }

    /**
     * get the top 10 numbers using the usage count .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTop10()
    {
        $conversions = RomanNumeralsConversion::orderBy('usage_count', 'asc')->limit(10)->get();
        return $conversions;
    }

}
