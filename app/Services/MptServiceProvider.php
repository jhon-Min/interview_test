<?php

namespace App\Services;

use App\Services\InternetServiceProvider\Mpt;
use App\Interfaces\InternetServiceProviderInterface;

class MptServiceProvider implements InternetServiceProviderInterface
{
    protected $mpt;

    public function __construct(Mpt $mpt)
    {
        $this->mpt = $mpt;
    }

    public function getInvoiceAmount(int $month): float
    {
        $this->mpt->setMonth($month);
        return $this->mpt->calculateTotalAmount();
    }
}
