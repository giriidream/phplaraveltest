<?php

namespace App\Resources;

class ItemResource extends JsonResource
{
    public function toArray($request)
    {
        $data = [
            'id'     => (int) $this->id,
            'sumsung'   => $this->sumsung,
            'vivo' => (isset ($this->vivo)) ? $this->sets->pluck('id') : [],
            'apple' => (isset ($this->apple)) ? $this->things->pluck('id') : [],
        ];
        return $data;
    }
}