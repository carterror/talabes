<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

use PayPal\Auth\OAuthTokenCredential;
use Paypal\Rest\ApiContext;


class PayPalPaymentController extends Controller
{

    private $apiContext;

    public function __construct()
    {

        $paypalconfig = Config::get("paypal");

        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                $paypalconfig["sandbox"]["certificate"],                   // ClientID
                $paypalconfig["sandbox"]["secret"]      // ClientSecret
            )
        );
    }

    public function handlePayment()
    {
return 123;
    }

    

}