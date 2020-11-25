<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'goal',
        'author_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOfUser($query, User $user)
    {
        return $query->where('user_id', $user->id);
    }
}
