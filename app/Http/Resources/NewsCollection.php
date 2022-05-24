<?php

namespace App\Http\Resources;

use App\Models\Backend\Notice;
use App\Models\Backend\NoticeCategory;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NewsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'news';

    public function toArray($request)
    {
        $notices = Notice::query()->where('notice_type_id',1)->paginate(10);
        if($notices) {
            $data = [];
            foreach ($notices as $notice) {
                $noticeCategory = NoticeCategory::find($notice->notice_category_id);
                $data[] = [
                    'id' => $notice->id,
                    'title' => $notice->title,
                    'date' => date('d-m-Y', strtotime($notice->created_at)),
                    'category' => $noticeCategory->name,
                    'type' => $notice->notice_type_id == 1 ? 'News' : 'Notice',
                ];
            }
            return ['status' => true, 'news' => $data];
        }
    }
}
