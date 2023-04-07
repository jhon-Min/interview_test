<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InternetServiceProvider\Mpt;
use App\Services\InternetServiceProvider\Ooredoo;
use App\Interfaces\InternetServiceProviderInterface;

class InternetServiceProviderController extends Controller
{
    protected $internetServiceProvider;

    public function __construct(InternetServiceProviderInterface $internetServiceProvider)
    {
        $this->internetServiceProvider = $internetServiceProvider;
    }

    public function getMptInvoiceAmount(Request $request)
    {
        $amount = $this->internetServiceProvider->getInvoiceAmount($request->get('month') ?: 1);

        return response()->json([
            'data' => $amount
        ]);
    }

    public function getOoredooInvoiceAmount(Request $request)
    {
        $amount = $this->internetServiceProvider->getInvoiceAmount($request->get('month') ?: 1);

        return response()->json([
            'data' => $amount
        ]);
    }
}
