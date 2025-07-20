<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'portfolio_id', 'proficiency', 'image', 'desc'];
    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_skill', 'skills_id', 'projects_id')->withTimestamps();
    }
}
