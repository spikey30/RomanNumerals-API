<?php

namespace App;

use App\IntegerConversionInterface;

class IntegerConversion implements IntegerConversionInterface
{
    private $numeral_list = [
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

    public function toRomanNumerals($integer)
    {
        if ($integer < 0) {
            return "<0";
        }
        if ($integer > 3999) {
            return ">3999";
        }
        
            $numerals = '';

        foreach ($this->numeral_list as $value => $symbol) {
            while ($integer >= $value) {
                    $numerals .= $symbol;
                    $integer -= $value;
            }
        }

        return $numerals;
    }
}
