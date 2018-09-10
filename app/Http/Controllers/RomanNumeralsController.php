<?php

namespace App\Http\Controllers;

use App\RomanNumeralsConversion;
use Illuminate\Http\Request;
use App\Http\Resources\RomanNumeralsResource;
use App\IntegerConversionInterface;
use App\IntegerConversion;

class RomanNumeralsController extends Controller
{

    private $IntegerConversion;
    
    public function __construct(IntegerConversion $IntegerConversion)
    {
        $this->IntegerConversion = $IntegerConversion;
    }

    /**
     * Convert a decimal and store it in the db.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function convert($int)
    {
        
        //convert decimal
        $conversion_result = $this->IntegerConversion->toRomanNumerals($int);
        
        // check if result has an error otherwise continue
        if ($conversion_result == ">3999") {
            return response()->json(['errors' => ['Integer' => ['The integer entered is more than 3999 ']]], 422);
        }
        
        if ($conversion_result == "<1") {
            return response()->json(['errors' => ['Integer' => ['The integer entered is less  than 1 ']]], 422);
        }


        //check if conversion already exists
        $existing_conversion = RomanNumeralsConversion::where('Numerals', '=', $conversion_result)->first();

        //increment if exists else store conversion
        if ($existing_conversion != null) {
            //conversion already exists so update its usage_count
            $updated_usage_count = $existing_conversion->usage_count + 1;
            $existing_conversion->usage_count = $updated_usage_count;
            $existing_conversion->save();
            
            return new RomanNumeralsResource($conversion);
        } else {
            //create new conversion
            $new_conversion = new RomanNumeralsConversion;

            $new_conversion->integer = $int;
            $new_conversion->usage_count = 1;
            $new_conversion->Numerals = $result;
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
        return RomanNumeralsResource::collection($conversions);
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
