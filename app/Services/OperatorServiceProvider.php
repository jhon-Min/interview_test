<?php

namespace App\Services;

use App\Services\InternetServiceProvider\Mpt;
use App\Interfaces\InternetServiceProviderInterface;
use App\Services\InternetServiceProvider\Ooredoo;

class OperatorServiceProvider implements InternetServiceProviderInterface
{
    protected $mpt;
    protected $ooredoo;

    public function __construct(Mpt $mpt, Ooredoo $ooredoo)
    {
        $this->mpt = $mpt;
        $this->ooredoo = $ooredoo;
    }

    public function getInvoiceAmount(int $month): float
    {
        $this->mpt->setMonth($month);
        return $this->mpt->calculateTotalAmount();
    }

    public function getInvoiceOoredooAmount(int $month): float
    {
        $this->ooredoo->setMonth($month);
        return $this->ooredoo->calculateTotalAmount();
    }
}
