<?php

namespace App\Services;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\CardException;

class StripeService
{
    public function __construct()
    {
        // Set the Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    }

    public function createPaymentIntent($amount)
    {
        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $amount * 100, // Amount in cents
                'currency' => 'usd', // Change currency if needed
            ]);

            return $paymentIntent;
        } catch (CardException $e) {
            throw new \Exception('Card error: ' . $e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception('Error: ' . $e->getMessage());
        }
    }
}
