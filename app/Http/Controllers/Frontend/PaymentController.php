<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentProcess(Request $request)
    {
        $payment = $request->payment;
        if ($payment == 'Stripe') {
            return view('frontend.payment.stripe');
        } elseif ($payment == 'Ideal') {
            return view('frontend.payment.ideal');
        } else {
            echo 'handcash';
        }
    }

    public function stripeCharge(Request $request)
    {
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/account/apikeys

        \Stripe\Stripe::setApiKey('sk_test_51IRtnOCYitchOLcaejRaLPEJ8VkMp3SoVsY0lFyEHXEII8fvjd3Zb7zeBNTK1xC54TqU7zz35XqytrKUlPNfVkz2005w7pmay9');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => 999*100,
            'currency' => 'usd',
            'description' => 'Imran Payment Description',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        dd($charge);
    }
}
