<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document_type extends Model
{
    use HasFactory;
    public function document_request(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Document_request::class);
    }
}
