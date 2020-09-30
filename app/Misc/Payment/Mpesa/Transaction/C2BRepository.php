<?php


namespace App\Misc\Payment\Mpesa\Transaction;


use App\Misc\Payment\Mpesa\Transaction\Contracts\Mpesa;
use App\Misc\Payment\Mpesa\Transaction\Contracts\Transaction;
use App\MpesaC2B;
use Illuminate\Http\Request;

class C2BRepository implements Transaction
{

    /**
     * @param Request $request
     * @return Mpesa
     */
    public function saveTransaction(Request $request)
    {
        return MpesaC2B::create([
            'trans_time' => $request->TransTime,
            'trans_amount' => $request->TransAmount,
            'business_short_code' => $request->BusinessShortCode,
            'bill_ref_number' => $request->BillRefNumber,
            'invoice_number' => $request->InvoiceNumber,
            'org_account_balance' => $request->OrgAccountBalance,
            'third_party_trans_id' => $request->ThirdPartyTransID,
            'msisdn' => $request->MSISDN,
            'first_name' => $request->FirstName,
            'middle_name' => $request->MiddleName,
            'last_name' => $request->LastName,
            'trans_id' => $request->TransID,
            'transaction_type' => $request->TransactionType
        ]);
    }

}
