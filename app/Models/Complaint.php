<?php

namespace App\Models;

use App\Models\User;
use DateTimeInterface;
use App\Models\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'username',
        'title',
        'subject',
        'image',
        'location',
        'date',
        'status',
        'user_id',
    ];

    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function response()
    {
        return $this->hasOne(Response::class);
    }

    public function takeImage()
    {
        return "storage/".$this->image;
    }

}
