<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assignee extends Model
{

    use HasFactory;
    protected $fillable = [
        'user_id'
    ];
    public function forms(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
