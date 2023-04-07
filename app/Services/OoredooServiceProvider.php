<?php

namespace App\Services;

use App\Interfaces\InternetServiceProviderInterface;
use App\Services\InternetServiceProvider\Ooredoo;

class OoredooServiceProvider implements InternetServiceProviderInterface
{
    protected $ooredoo;

    public function __construct(Ooredoo $ooredoo)
    {
        $this->ooredoo = $ooredoo;
    }

    public function getInvoiceAmount(int $month): float
    {
        $this->ooredoo->setMonth($month);
        return $this->ooredoo->calculateTotalAmount();
    }
}
