<?php
class StripeTest extends CI_Controller
{
    public function index()
    {

// Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_PwuymHGLn01nujkDxKKoD1vn00cLjzvItz');

        print_r(\Stripe\PaymentIntent::create([
            'amount' => 1000,
            'currency' => 'inr',
            'payment_method_types' => ['card'],
            'receipt_email' => 'sufyan8834@gmail.com',
        ]));
    }

}
