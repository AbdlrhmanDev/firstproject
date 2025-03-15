<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'salary',
        'company_id',
        'featured',
        'logo',
    ];

    // Ensure tags are cast as an array
   
    public function application()
    {
        return $this->hasMany(Application::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'job_tag');
    }
    public function employer()
    {

        return $this->belongsTo(Employer::class, 'company_id');
    }

    /**
     * Scope for filtering by title or description (search query).
     */
    public function scopeSearch($query, ?string $term)
    {
        if ($term) {
            return $query->where(function ($query) use ($term) {
                $query->where('title', 'like', "%{$term}%")
                    ->orWhere('description', 'like', "%{$term}%");
            });
        }

        return $query; // Return the query unchanged if no search term is provided
    }

    /**
     * Scope for filtering by salary range.
     */
    public function scopeSalaryRange($query, float $min, float $max)
    {
        return $query->whereBetween('salary', [$min, $max]);
    }

    /**
     * Scope for filtering by company.
     */
    public function scopeCompany($query, int $companyId)
    {
        return $query->where('company_id', $companyId);
    }

    /**
     * Scope for filtering featured jobs.
     */
    public function scopeFeatured($query, bool $featured)
    {
        return $query->where('featured', $featured);
    }
   
}
