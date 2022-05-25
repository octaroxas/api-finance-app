<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => [
                'type' => $this->type,
                'display' => $this->type->display()
            ],
            'description' => $this->description,
            'amount' => $this->amount,
            'date' => $this->date,
            'done' => $this->done,
            'category' => CategoryResource::make($this->category)
        ];
    }
}
