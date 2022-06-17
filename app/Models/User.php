<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Api\v1\HeaderInventoryLost;
use App\Models\Api\v1\Status;
use App\Models\Api\v1\Rol;
use App\Models\Api\v1\Campus;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol_id',
        'campus_id',
        'statuses_id',

    ];

    public function statusUser()
    {
        return $this->belongsTo(Status::class);
    }

    public function RolUser()
    {
        return $this->belongsTo(Rol::class);
    }

    public function campusUser()
    {
        return $this->belongsTo(Campus::class);
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function HeaderInventoryLost()
    {
        return $this->hasMany(HeaderInventoryLost::class);
    }
}
