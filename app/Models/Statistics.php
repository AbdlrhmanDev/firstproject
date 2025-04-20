<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Statistics extends Model
{
    protected $fillable = [
        'active_jobs_count',
        'companies_count',
        'job_seekers_count',
        'jobs_filled_count',
        'last_updated'
    ];

    protected $casts = [
        'last_updated' => 'datetime'
    ];

    /**
     * Get the latest statistics from the database
     */
    public static function getLatestStats()
    {
        return Cache::remember('statistics_data', 3600, function () {
            return [
                'active_jobs' => Job::where('status', 'active')->count(),
                'companies' => Company::count(),
                'job_seekers' => User::where('role', 'user')->count(),
                'jobs_filled' => Job::where('status', 'filled')->count(),
                'last_updated' => now()
            ];
        });
    }

    /**
     * Update statistics in the database
     */
    public static function updateStatistics()
    {
        $stats = self::getLatestStats();
        
        DB::table('statistics')->updateOrInsert(
            ['id' => 1],
            [
                'active_jobs_count' => $stats['active_jobs'],
                'companies_count' => $stats['companies'],
                'job_seekers_count' => $stats['job_seekers'],
                'jobs_filled_count' => $stats['jobs_filled'],
                'last_updated' => $stats['last_updated'],
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        Cache::forget('statistics_data');
    }
} 