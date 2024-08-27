<?php

namespace MityDigital\StatamicStripeCheckoutFieldtype\Tags;

use MityDigital\StatamicStripeCheckoutFieldtype\Support\StripeService;

class PriceData extends \Statamic\Tags\Tags
{

   public function name()
   {
       $prices = $this->all();
       return $prices[$this->params->get('id')]['name'];
   }

   public function amount()
   {
       $prices = $this->all();
       return $prices[$this->params->get('id')]['amount'];
   }

   public function all()
   {
       // get products from the stripe service
       $products = app(StripeService::class)->getProducts();

       $prices = $products->map(fn ($product) => $product['prices']->map(function ($price) use ($product) {
           // get the name
           $name = $price['name'];
           $amount = $price['amount'];

           // set the name string
           if ($name) {
               $name = $name;
           } else {
               $name = $product['name'];
           }

           return ['id' => $price['id'], 'name' => $name, 'amount' => $amount ];
       }))
       ->flatten(1)
       ->mapWithKeys(fn ($price) => [
               $price['id'] => [
                   'name' => $price['name'],
                   'amount' => $price['amount']
               ]
       ]);

       return $prices;
   }

}