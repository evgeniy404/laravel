<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items'; //нзвание таблицы в базе
    protected $fillable=['title', 'group_id', 'manufacturer_id', 'weight', 'cost'];
}
