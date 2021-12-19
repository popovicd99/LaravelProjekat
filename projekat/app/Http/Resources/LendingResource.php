<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LendingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap ='lendings';
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'=>$this->resource->id,
            'return_date'=> $this->resource->return_date,
            'user'=> new UserResource($this->resource->user),
            'book'=> new BookResource($this->resource->book)
        ];
    }
}
