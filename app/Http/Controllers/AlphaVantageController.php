<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AlphaVantageService;

class AlphaVantageController
{
    protected $alphaVantageService;

    public function __construct(AlphaVantageService $alphaVantageService)
    {
        $this->alphaVantageService = $alphaVantageService;
    }

    public function teste(Request $request)
    {
        $cotacao = null;

        if($request->has('ticker')) {
            $ticker = $request->ticker;
            $cotacao = $this->alphaVantageService->getCotacao($request->ticker);
        }

        return view('teste', compact('cotacao'));
    }
}