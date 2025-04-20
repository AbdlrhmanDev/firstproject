<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Company Model
 * 
 * Represents a company entity in the system.
 * Each company belongs to a user (owner) and can have multiple jobs.
 */
class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'description'
    ];

    /**
     * Get the user that owns the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class); // صاحب الشركة
    }

    /**
     * Get all jobs associated with the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
        return $this->hasMany(Job::class); // الوظائف التابعة للشركة
    }
}
