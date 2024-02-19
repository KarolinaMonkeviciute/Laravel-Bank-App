<?php

namespace App\Services;

class GenerateAccountNumber
{
    static public function generateNumber(): string {
       $number = mt_rand(100000000000000000, 999999999999999999);
       return 'LT'.$number;
    }
}