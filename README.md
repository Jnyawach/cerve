## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Set up .env config

```
SHORT_CODE=123456
LIPA_NA_MPESA_SHORT_CODE=654321
VALIDATION_KEY=some-secure-key
CONFIRMATION_KEY=some-secure-key
CONSUMER_SECRET=from-daraja
CONSUMER_KEY=from-daraja
LIPA_NA_MPESA_ONLINE_PASS_KEY=from-daraja

PROD_SHORT_CODE=123456
PROD_LIPA_NA_MPESA_SHORT_CODE=654321
PROD_VALIDATION_KEY=some-secure-key
PROD_CONFIRMATION_KEY=some-secure-key
PROD_CONSUMER_SECRET=from-daraja
PROD_CONSUMER_KEY=from-daraja
PROD_LIPA_NA_MPESA_ONLINE_PASS_KEY=from-daraja

```
## C2B
##### Register C2B Endpoints
```
URI
/api/v1/m-ke/c2b/register

Payload
--
```

##### Send dummy simulation to app
```
URI
/api/v1/m-ke/c2b/confirm/some_random_confirmation_key

Payload
--
```

##### Send simulation request to Safaricom
```
URI
/api/v1/m-ke/c2b/confirm/simulate

Payload

{
	"short_code":"short_code",
	"bill_ref_number":"order_reference",
	"msisdn":"254_phone_number",
	"amount":"some_amount"
}
```
## STK Push
##### Send simulation request to Safaricom
```
URI
/api/v1/m-ke/c2b/stk-push/simulate

Payload

{
    "sender_phone":"254_phone_number",
    "payer_phone":"254_phone_number",
    "amount":some_amount,
    "account_reference":"order_reference"
}
```
##### Send dummy stk push transaction to app
```
URI
/api/v1/m-ke/stk-push/confirm/some_random_key

Payload
	
{ "Body":
       { 
            "stkCallback":{ 
                "MerchantRequestID": "15578-16590447-1",
                "CheckoutRequestID": "ws_CO_010820202127420966",
                "ResultCode": "0",
                "ResultDesc": "0"
            } ,
           "CallbackMetadata":  {
            "Item": [
                    { "Name":"Amount", "Value":10 },
                    { "Name":"MpesaReceiptNumber",    "Value":"MRLSJHDH9" },
                    { "Name":"balance",    "Value":"1000" },
                    { "Name":"b2CUtilityAccountAvailableFunds",    "Value":"1000" },
                    { "Name":"transactionDate",    "Value":"vuala" },
                    { "Name":"phoneNumber",    "Value":"25472000000" }

            ]

         }
       }

} 
```
### Sample Payment Processing
#### C2B
##### Process Payment
```
#Let's say this is the payment processing page

# ~ In your controller

public function processPayment(Request $reqest, Order $order) {

    # Update Transaction
    if( $transaction = Transaction::where('reference', $request->mpesa_confirmation_code)->first() ) {
        
        $transaction->fill(['order_id' => $order->id, 'status' => 'COMPLETED'])->save();
        
        #update order details
        if($order->transactions()->sum('amount') >= $order->amount) {
            //Update order status and do more
        }
    }
}
```
