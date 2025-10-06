<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaSocial extends Model
{
    use HasFactory;

    protected $table = 'mediasocial';

    protected $fillable = [
        'photo',
        'link',
        'nameaccount',
        'namemediasocial',
        'is_active',
    ];
}
