<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'link',
    ];
}
