<?php

namespace App;

use Carbon\Carbon;
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

    /**
     * @return mixed
     */
    public function getDateFromAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    }

    /**
     * @return mixed
     */
    public function getDateToAttribute($value)
    {
        if ($value) {
            return Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');

        }

        return 'Present';
    }
}
