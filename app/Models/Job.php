<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'type',
        'description',
        'salary',
        'deadline',
        'photo',
    ];

    protected $casts = [
        'deadline' => 'datetime'
    ];

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function company()
    {
        return $this->belongsTo(Company::class);
    }

    function applications()
    {
        return $this->hasMany(Application::class);
    }

    protected static function newFactory(): Factory
    {
        return JobAddFactory::new();
    }
}
