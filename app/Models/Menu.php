<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    //khai báo table
    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'content',
        'slug',
        'active',
    ];
}
