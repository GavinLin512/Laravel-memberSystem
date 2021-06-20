<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // 'key' => 'value'
    // TYPE['key']
    // 取出來是陣列，直接寫死好處是直接在這做修改不會影響其他資料，跟資料庫相關的都寫在 model 內
    const TYPE = [
        'announcement' => '公告',
        'event' => '活動',
        'promotion' => '促銷',
        'major' => '重大公告'
    ];

    protected $fillable = [
        'type', 'publish_date', 'title', 'img', 'content'
    ];
}
