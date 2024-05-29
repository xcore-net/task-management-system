<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Assignee extends Model
{

    use HasFactory;
    protected $fillable = [
        'user_id'
    ];
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function taskTypes(): BelongsToMany
    {
        return $this->belongsToMany(TaskType::class, 'assignees_task_types');
    }
}
