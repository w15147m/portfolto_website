<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [ 'company', 'position', 'image', 'start_date', 'end_date', 'desc', 'portfolio_id' ];

    public function portfolio() { return $this->belongsTo(Portfolio::class); }
}
