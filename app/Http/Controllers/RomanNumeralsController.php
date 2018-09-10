<?php

namespace App\Http\Controllers;

use App\RomanNumeralsConversion;
use Illuminate\Http\Request;
use App\Http\Resources\RomanNumeralsResource;

class RomanNumeralsController extends Controller
{


    /**
     * Convert a decimal and store it in the db.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function convert($int)
    {   
        
        //convert decimal


        //check if conversion already exists
        $conversion = RomanNumeralsConversion::where('Numerals','=','hhh')->first();

        //increment if exists else store conversion
        if ($conversion != null) {
            //conversion already exists so update its usage_count
            $updated_usage_count = $conversion->usage_count + 1;
            $conversion->usage_count = $updated_usage_count;
            $conversion->save();
            
            return new RomanNumeralsResource($conversion);
        } else {
            
            $new_conversion = new RomanNumeralsConversion;

            $new_conversion->integer = $int;
            $new_conversion->usage_count = 1;
            $new_conversion->Numerals = "hhh4";
            $new_conversion->save();

            return new RomanNumeralsResource($new_conversion);
        }

        
    }

    /**
     * get latest (last 15).
     *
     * @return \Illuminate\Http\Response
     */
    public function getLatest()
    {
        $conversions = RomanNumeralsConversion::orderBy('updated_at', 'desc')->limit(15)->get();
        return RomanNumeralsResource::collection($conversion);
        
    }

    /**
     * get the top 10 numbers using the usage count .
     *
     * @return \Illuminate\Http\Response
     */
    public function getTop10()
    {
        $conversions = RomanNumeralsConversion::orderBy('usage_count', 'desc')->limit(10)->get();
        return RomanNumeralsResource::collection($conversions);
    }

}
