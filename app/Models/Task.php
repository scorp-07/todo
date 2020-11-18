<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_done',
    ];

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }
}
