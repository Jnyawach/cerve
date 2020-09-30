<?php


namespace App\Misc\Payment\Mpesa\Transaction\Contracts;

use Illuminate\Http\Request;

interface Transaction
{
    public function saveTransaction(Request $request);

}
