<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id',
        'name',
        'desc',
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
    public function images()
    {
        return $this->hasMany(ProjectImage::class, 'projects_id');
    }
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'project_skill', 'projects_id', 'skills_id')->withTimestamps();
    }
}
