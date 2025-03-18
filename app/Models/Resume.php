<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'phone',
        'email',
        'address',
        'skills',
        'experience',
        'education',
        'summary',
    
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
