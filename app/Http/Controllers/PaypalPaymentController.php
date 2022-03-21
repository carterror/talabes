<?php

namespace App\Http\Controllers;

use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

use \PayPal\Api\Amount;
use \PayPal\Api\Details;
use \PayPal\Api\Payment;
use \PayPal\Api\PaymentExecution;
use \PayPal\Api\Transaction;


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
            return redirect()->away($payment->getApprovalLink());
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }

    }


    public function paymentCancel()
    {

    return "Cancelado";

//     sb-kezh614538651@business.example.com
// System Generated Password:
// ak1F+CR&

// sb-hjhd714538650@personal.example.com
// System Generated Password:
// DK8W-Aux
    
    }

    public function paymentSuccess(Request $request)
    {

        // $paymentId = $request->paymentId;
        // $token = $request->token;
        // $PayerID = $request->PayerID;
        // return $paymentId. " ". $token  . " ".$PayerID;
        if (isset($request)) {
            // Get the payment Object by passing paymentId payment id was previously stored in session in CreatePaymentUsingPayPal.php
            
                $paymentId = $_GET['paymentId'];
                $payment = Payment::get($paymentId, $this->apiContext);
            // Payment Execute
            // PaymentExecution object includes information necessary to execute a PayPal account payment. The payer_id is added to the request query parameters when the user is redirected from paypal back to your site
            
                $execution = new PaymentExecution();
                $execution->setPayerId($_GET['PayerID']);
            // Optional Changes to Amount
            // If you wish to update the amount that you wish to charge the customer, based on the shipping address or any other reason, you could do that by passing the transaction object with just amount field in it. Here is the example on how we changed the shipping to $1 more than before.
            
                $transaction = new Transaction();
                $amount = new Amount();
                $details = new Details();
            
                $details->setShipping(2.2)
                    ->setTax(1.3)
                    ->setSubtotal(17.50);
            
                $amount->setCurrency('USD');
                $amount->setTotal(21);
                $amount->setDetails($details);
                $transaction->setAmount($amount);
            // Add the above transaction object inside our Execution object.
            
                $execution->addTransaction($transaction);
            
                try {
            // Execute the payment (See bootstrap.php for more on ApiContext)
            
                    $result = $payment->execute($execution, $this->apiContext);
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            
                    return "Executed Payment Payment"."<br>". $payment->getId()."<br>". $execution."<br>". $result;
            
                    try {
                        $payment = Payment::get($paymentId, $this->apiContext);
                    } catch (Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            
                        return "Get Payment ". " Payment"."<br>". $ex;
                        exit(1);
                    }
                } catch (Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            
                    return "Executed Payment ". " Payment"."<br>". $ex;
                    exit(1);
                }
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            
                return "Get Payment ". " Payment"."<br>". $payment->getId()."<br>". $payment;
            
                return $payment;
            } else {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            
                return "User Cancelled the Approval";
                exit;
            }
    }

}