<?php

namespace MityDigital\StatamicStripeCheckoutFieldtype\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use MityDigital\StatamicStripeCheckoutFieldtype\Support\StripeService;
use Stripe\Stripe;
use Symfony\Component\HttpFoundation\Response;

class StripeWebhookController extends Controller
{
    public function __invoke(Request $request)
    {
        $payload = json_decode($request->getContent(), true);

        // if this is one of the events to listen for, clear the cache
        if (in_array($payload['type'], StripeService::STRIPE_EVENTS)) {

            // set max retries
            $this->setMaxNetworkRetries();

            if ($payload->type == 'checkout.session.completed'
                || $payload->type == 'checkout.session.async_payment_succeeded') {

                // checkout completed so check for payment
                $this->notifyStripeCheckout($payload->data->object->id);

            }  else  {     

                // clear the stripe cache
                $this->clearStripeCache();

            }

            return new Response('Webhook Handled', 200);
        }

        // unknown event
        return new Response('Invalid Payload', 400);
    }

    /**
     * Set the number of automatic retries due to an object lock timeout from Stripe.
     *
     * @param  int  $retries
     * @return void
     */
    protected function setMaxNetworkRetries($retries = 3)
    {
        Stripe::setMaxNetworkRetries($retries);
    }

    protected function notifyStripeCheckout($checkoutId)
    {
        app(StripeService::class)->notifyCheckout($checkoutId);
    }

    protected function clearStripeCache()
    {
        app(StripeService::class)->clearCache();
    }
}
