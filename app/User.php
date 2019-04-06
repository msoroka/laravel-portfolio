<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Social;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'birth_date',
        'phone',
        'city',
        'country',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth_date'        => 'date',
    ];

    /**
     * @return bool
     */
    public function isAdmin() {
        return $this->role->slug == Role::where('slug', 'admin')->first()->slug;
    }

    /**
     * @return string
     */
    public function getFullNameAttribute() {
        return sprintf('%s %s', $this->first_name, $this->last_name);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function socials()
    {
        return $this->belongsToMany(Social::class);
    }
}
