<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'teacher';

    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'name' => $this->name,
            'designation' => $this->staff_type_id == 2 ? 'Teacher' : 'Staff',
            'phone' => $this->mobile,
            'empNo' => $this->card_id,
            'joiningDate' => $this->joining,
            'email' => $this->email,
            'image' => asset('assets/img/staffs').'/'.$this->image,
            'gender' => $this->gender->name,
            'bloodGroup' => $this->blood->name,
        ];
    }
}
