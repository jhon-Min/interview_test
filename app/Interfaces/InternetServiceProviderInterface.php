<?php

namespace App\Interfaces;

interface InternetServiceProviderInterface
{
    public function getInvoiceAmount(int $month): float;
}
