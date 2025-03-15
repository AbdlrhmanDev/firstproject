<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
