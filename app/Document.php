<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function documentAttributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function text()
    {
        return $this->hasOne(Text::class);
    }

    public function status()
    {
        return $this->hasOne(Status::class);
    }
}
