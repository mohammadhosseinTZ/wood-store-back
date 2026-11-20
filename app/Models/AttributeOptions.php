<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeOptions extends Model
{
    protected $table = "attribute_options";
    protected $guarded = [];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

}
