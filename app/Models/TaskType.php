<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TaskType extends Model
{
    use HasFactory;
    protected $fillable = ['name','user_id','last_updated_by'];
    public function assignees(): BelongsToMany
    {
        return $this->belongsToMany(Assignee::class, 'assignees_task_types');
    }
 
    public function tasks(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
