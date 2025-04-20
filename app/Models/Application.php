<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Application
 * 
 * Represents a job application submitted by a user
 * 
 * @property int $user_id
 * @property int $job_id
 * @property int $resume_id
 * @property string $message
 * @property string $status
 */
class Application extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'job_id',
        'resume_id',
        'message',
        'status'
    ];

    /**
     * Get the user that submitted the application
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the job that the application is for
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    /**
     * Get the resume associated with the application
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
