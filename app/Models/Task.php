<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Task extends Model
{
    use HasFactory;
    protected $fillable = ['client_id','document_request_id',
                        'task_type_id','assignee_id',
                              'parent_id','name'];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
    public function document_request(): BelongsTo
    {
        return $this->belongsTo(Document_request::class);
    }
    
    public function task_type(): BelongsTo
    {
        return $this->belongsTo(TaskType::class);
    }
    public function assignee(): BelongsTo
    {
        return $this->belongsTo(Assignee::class);
    }
    public function parent_id(): HasMany
    {
        return $this->HasMany(Task::class);
    }
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
