<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $table="manufacturers"; //нзвание таблицы в базе
    protected $fillable=['title'];
}
