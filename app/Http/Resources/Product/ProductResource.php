<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;
use App\Model\Review;
use App\Http\Resources\Review\ReviewResource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'stock' => $this->stock == 0 ? "Out of Stock" : $this->stock,
            'discount' => $this->discount,
            'totalPrice' => round((1 - ($this->discount)/100) * $this->price ,2),//calculate total price
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')%$this->reviews->count('star'),2) : "No Rating!",//count rating
            // 'link' => [
                // 'reviews' => route('reviews.index',$this->id),
                'reviews' => ReviewResource::collection($this->reviews),
            // ],
        ];
    }
}
