<?php 

namespace App\Helpers;

class FinanceHelpers{
    public static function calcularJurosCompostos($capital, $taxa, $tempo){

        return $capital * pow((1 + $taxa / 100), $tempo);
    }
}

