<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DocumentType extends Model
{
    use HasFactory;
    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class,'document_requests');
    }
}
