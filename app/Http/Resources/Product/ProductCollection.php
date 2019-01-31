<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        /*return [
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];*/
        return [
            'name' => $this->name,
            'totalPrice' => round((1 - ($this->discount)/100) * $this->price ,2),//calculate total price
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')%$this->reviews->count('star'),2) : "No Rating!",//count rating
            'discount' => $this->discount,
            'href' => [
                'link' => route('products.show',$this->id),
            ]
        ];
    }
}
