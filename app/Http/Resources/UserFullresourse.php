<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use function Symfony\Component\Debug\Tests\testHeader;

class UserFullresourse extends JsonResource
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

            'user_id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'email_confirmed' => $this->email_verified,
            'mobile' => $this->mobile,
            'mobile_confirmed' => $this->mobile_verified,
           // 'shipping_address' => new Addressresourse($this->shippingAddress),
           // 'billing_address' => new Addressresourse($this->billingAddress),
            'api_token' => $this->api_token,
            'member_since' => $this->created_at->format('D M Y'),
        ];
    }
}
