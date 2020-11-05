<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function goal()
    {
        return $this->belongsTo(Goal::class, 'goal_id');
    }
}