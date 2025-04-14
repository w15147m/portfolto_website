<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSkill extends Model
{
    use HasFactory;

    protected $table = 'project_skill'; // Explicitly defining the table name

    protected $fillable = [
        'projects_id',
        'skills_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'projects_id');
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skills_id');
    }
}
