<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    // 儘量還是寫一下
    protected $table ='contact_us';

    protected $fillable = [
        'name', 'email', 'subject', 'message_return'
    ];
}
