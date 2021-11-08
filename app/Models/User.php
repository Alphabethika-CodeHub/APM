<?php

namespace App\Models;

use App\Models\Response;
use App\Models\Complaint;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'username',
        'name',
        'phone',
        'image',
        'email',
        'level',
        'password',
        'email_verified_at',
    ];

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function takeImage()
    {
        return "storage/".$this->image;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
