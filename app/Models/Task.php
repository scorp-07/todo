<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'goal_id',
        'task',
        'status',
        'author_id'
    ];

    const STATUSES = [
        'new' => 'Новый',
        'in-progress' => 'В процессе',
        'done' => 'Выполнено',
        'confirmed' => 'Подтверждено',
    ];

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
