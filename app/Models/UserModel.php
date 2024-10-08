<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $table = 'User';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'id_user'; // id_user is a primary key (NEEDED TO MAKE SURE THE JWT IS IDENTIFIYING THE TABLE)
    protected $keyType = 'string'; // id_user is a string (varchar)
    protected $fillable = [
        'id_user',
        'name',
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
