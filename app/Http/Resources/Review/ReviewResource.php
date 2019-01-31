<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\Product\ProductResource;

class ReviewResource extends Resource
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
            'id' => $this->id,
            // 'product_id' => $this->product_id,
            'product' => $this->product->name,
            // 'product' => new ProductResource($this->product),
            'customer' => $this->customer,
            'review' => $this->review,
            'star' => $this->star,
        ];
    }
}
