<?php

namespace App\Http\Resources;

use App\Models\ClassSchedule;
use Illuminate\Http\Resources\Json\JsonResource;

class RoutineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

        return [
            'id' => $this->id,
            'weekday' => $this->day,
            'hours' => ClassSchedule::query()
                ->where('id', $this->id)
                ->get()
                ->groupBy('day'),
        ];

    }
}
