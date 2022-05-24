<?php

namespace App\Http\Resources;

use App\Models\Backend\NoticeCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class NoticeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = null;
    public function toArray($request): array
    {
       $noticeCategory =  NoticeCategory::find($this->notice_category_id);
        return [
                'title' => $this->title,
                'body' => $this->description,
                'date' => date('d-m-Y', strtotime($this->created_at)),
                'category' => $noticeCategory->name,
                'type' => $this->notice_type_id == 1 ? 'News' : 'Notice',
                'image' => $this->file,
                'download_link' => null,
                'facebook_link' => null,
                'twitter_link' => null,
                'linkedin_link' => null,

        ];
    }
}
