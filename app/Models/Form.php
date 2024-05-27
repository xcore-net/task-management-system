<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description'
    ];
    public function document_type(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Document_type::class);
    }
}
