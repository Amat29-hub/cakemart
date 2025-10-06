<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaKerja extends Model
{
    use HasFactory;

    protected $table = 'tenagakerja';
    
    protected $fillable = [
        'photo',
        'name',
        'description',
        'position',
        'is_active',
    ];
}
