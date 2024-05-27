<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email','phone'
    ];
    public function documentTypes(): BelongsToMany
    {
        return $this->belongsToMany(DocumentType::class,'document_requests');
    }
}
