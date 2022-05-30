<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Rol extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function rolUser()
    {
         return $this->hasmany(User::class);
    }

}
