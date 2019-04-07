<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'role_id',
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
     * @var array
     */
    protected $dates = [
        'birth_date',
    ];

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role ? $this->role->slug == Role::where('slug', 'admin')->first()->slug : false;
    }

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return sprintf('%s %s', $this->first_name, $this->last_name);
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
