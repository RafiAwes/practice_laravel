<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SCategory extends Model
{
    protected $fillable =[
        'category_id',
        'subcategory_name'
    ];
}
