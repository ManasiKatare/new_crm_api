<?php

namespace Modules\Core\Transformers\Organization;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Facades\Image;

class OrganizationMiniResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $logoPath = base64_decode(Storage::url($this->logo));
        //$logo = Image::make($logoPath)->response();

        return [
            'hash' => $this->hash,
            'name' => $this->name,
            'subdomain' => $this->subdomain,
            'logo' => $logoPath,
            'users_count' => $this->users_count,
            'last_updated_at' => $this->last_updated_at
        ];
    } //Function ends

} //Class ends
