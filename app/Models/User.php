<?php

namespace App\Models;


use App\Models\Scopes\AuthScope;
use Illuminate\Console\View\Components\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $guarded = [
        'is_admin',
    ];


    protected $hidden = [
        'password',
        'remember_token',
        'is_admin',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function tasks(): BelongsToMany{
        return $this->belongsToMany(Task::class);
    }


    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function setUserNameAttribute($value)
    {
        $this->attributes['username'] = Str::slug($value, '-');
    }


    public function scopeAdmin(Builder $query): void
    {
        $query->where('is_admin', true);
    }


    protected static function booted(): void
    {
        static::addGlobalScope(new AuthScope);
    }
}
