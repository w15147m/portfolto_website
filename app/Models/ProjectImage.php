<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use HasFactory;

    protected $fillable = ['projects_id', 'image' , 'default => 0'];

    public function project() { return $this->belongsTo(Project::class, 'projects_id'); }
}
