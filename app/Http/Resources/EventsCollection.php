<?php

namespace App\Http\Resources;

use App\Models\Backend\UpcomingEvent;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EventsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'events';
    public function toArray($request)
    {
        return [
            'status' => true,
            'events' => $this->collection,
            'links'=> [
                'self'=> 'link-value'
            ]
        ];
    }
}
