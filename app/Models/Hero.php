<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $table = "heroes";
    protected $fillable = ["title" , "description_part_one" , "description_part_two"];
}
