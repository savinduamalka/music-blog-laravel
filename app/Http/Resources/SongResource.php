<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SongResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'url' => $this->url,
            'image' => $this->image,
            'albumId' => $this->when($this->album, function () {
                return $this->album->id;
            }),
            'albumName' => $this->when($this->album, function () {
                return $this->album->name;
            }),
        ];
    }
}
