<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TeacherCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'teachers';
    public function toArray($request)
    {
        return [
            'status' => true,
            'teachers' => $this->collection,
            'links'=> [
                'self'=> 'link-value'
            ]
        ];
    }
}
