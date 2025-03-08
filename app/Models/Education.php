<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'degree',
        'portfolio_id',
        'institution',
        'start_date',
        'end_date',
        'field_of_study',
        'desc'
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
