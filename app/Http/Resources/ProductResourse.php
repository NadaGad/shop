<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResourse extends JsonResource
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
            'product_id' => $this->id,
            'product_title' => $this->title,
            'product_description' => $this->description,
           // 'product_unit' => new UnitResourse($this->hasunit),
            'product_quantity' => number_format( $this->quantity, 2),
            'product_price' => number_format( $this->price, 2),
            'product_total' =>number_format( $this->total, 2),
            'product_discount' =>number_format( $this->discount, 2),
           // 'product_category' => new CategoryResourse($this->category),
            'product_tags' => TagResourse::collection($this->tags),
            'product_image' => ImageResourse::collection($this->images),
            'product_review' => ReviewResourse::collection($this->reviews),
           // 'product_option' => $this-> jsonoptions(),
            ];
    }
}
