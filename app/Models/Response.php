<?php

namespace App\Models;

use App\Models\User;
use App\Models\Complaint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_response',
        'response',
        'image',
        'complaint_id',
        'user_id',
    ];

    // protected $primaryKey = 'complaint_id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    public function complaint()
    {
        return $this->belongsTo(Complaint::class, 'complaint_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class ,'user_id');
    }

    public function takeImage()
    {
        return "storage/".$this->image;
    }

}
