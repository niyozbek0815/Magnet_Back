<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'text'=>$this->description,
            'price'=>$this->price,
            'chegirma'=>$this->sale,
            'count'=>$this->count,
            'count_review'=>$this->count_review,
            'stars'=>$this->stars,
            'category_uz'=>$this->categories->name_uz,
            'category_kr'=>$this->categories->name_kr,
            'category_ru'=>$this->categories->name_ru,
            'category_en'=>$this->categories->name_en,
            'shop'=>$this->stores->name,

        ];
    }
}
