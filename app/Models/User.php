<?php


namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];

    }
    // Add your custom methods here
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function resume()
    {
        return $this->hasOne(Resume::class); // Ensure it's hasOne, not hasMany
    }
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    public function company()
    {
        return $this->hasOne(Company::class);
    }
    public function isAdmin(): bool
    {
        return $this->role=== 'admin';
    }
    public function isEmployer(): bool{
        return $this->role=== 'employer';
    }


}