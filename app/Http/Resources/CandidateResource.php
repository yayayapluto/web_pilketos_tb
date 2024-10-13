<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'candidate_id' => $this->candidate_id,
            'image' => $this->image,
            'name' => $this->name,
            'description' => $this->description,
            'external_link' => $this->external_link,
        ];
    }
}
