<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'color',
        'image',
    ];
}
