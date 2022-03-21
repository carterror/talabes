<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class PayPalPaymentController extends Controller
{

    private $apiContext;

    public function __construct()
    {

        $paypalconfig = Config::get("paypal");
        
        $this->apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $paypalconfig["sandbox"]["certificate"],                   // ClientID
                $paypalconfig["sandbox"]["secret"]      // ClientSecret
            )
        );
    }

    public function handlePayment()
    {
        // 3. Lets try to create a Payment
        // https://developer.paypal.com/docs/api/payments/#payment_create
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal('1.00');
        $amount->setCurrency('USD');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(route("success.payment"))
            ->setCancelUrl(route("cancel.payment"));
            
            
        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        // 4. Make a Create Call and print the values
        try {
            $payment->create($this->apiContext);
            echo $payment;

            echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }

    }

    

}