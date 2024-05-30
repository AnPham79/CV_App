<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Job extends Model
{
    use HasFactory;

    public static array $experience = ['fresher', 'intermediate', 'senior'];

    public static array $languages = [
        'Java', 
        'C#', 
        'NodeJS', 
        'PHP & Laravel', 
        'ReactJs', 
        'Angular', 
        'VueJs',
        'Mobile',
        'Java Spring Boot'
    ];

    public function scopeFilter(Builder | QueryBuilder $query, array $filters)
    {
        return $query->when($filters['search'] ?? null, function($query, $search) {
            $query->where(function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('languages', 'like', '%' . $search . '%')
                ->orWhere('location', 'like', '%' . $search . '%')
                ->orWhereHas('employer', function($query) use ($search) {
                    $query->where('company_name', 'like', '%' . $search . '%');
                });
            });
        })->when($filters['min_salary'] ?? null, function($query, $min_salary) {
            $query->where('salary', '>=', $min_salary);
        })->when($filters['max_salary'] ?? null, function($query, $max_salary) {
            $query->where('salary', '<=', $max_salary);
        })->when($filters['experience'] ?? null, function($query, $experience) {
            $query->where('experience', $experience);
        });
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}