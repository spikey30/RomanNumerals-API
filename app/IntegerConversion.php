<?php

namespace App;


class IntegerConversion implements IntegerConversionInterface
{
    private $lookup = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I',
    ];

    public function toRomanNumerals($integer) {
        if($integer > 0 && $integer < 3999) {
            $numerals = '';

            foreach($lookup as $limit => $glyph){
                while ($number >= $limit) {
                    $numerals .= $glyph;
                    $number -= $limit;
                }
            }

            return $numerals;

         }

    }
}