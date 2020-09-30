<?php


namespace App\Misc\Payment\Mpesa\Transaction;

use App\Transaction;

class TransactionRepository
{
    public function save($reference, $amount, $type = 'CREDIT', $status = 'PROCESSING')
    {
        return Transaction::create([
            'reference' => $reference,
            'type' => "CREDIT",
            'amount' => $amount,
            'status' => $status
        ]);
    }
}
