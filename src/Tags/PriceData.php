<?php

namespace MityDigital\StatamicStripeCheckoutFieldtype\Tags;

use MityDigital\StatamicStripeCheckoutFieldtype\Support\StripeService;

class PriceData extends \Statamic\Tags\Tags
{

    public function name()
    {
        $this->params->get('id');
    }

    public function amount()
    {
        $this->params->get('id');
    }

    public function all()
    {
        // get products from the stripe service
        $products = app(StripeService::class)->getProducts();

        return json_encode($products);
    }

}
