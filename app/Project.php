<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'link',
        'image',
        'date_from',
        'date_to',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'date_from' => 'date',
        'date_to'   => 'date',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'date_from',
        'date_to',
    ];
}
