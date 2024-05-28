<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentType extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'form_id'];
    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class, 'document_requests');
    }
 
    public function forms(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }
}
