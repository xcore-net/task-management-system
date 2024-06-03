<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function forms(): BelongsToMany
    {
        return $this->belongsToMany(Form::class,'filled_forms');
    }
    public function uploaded_files(): HasMany{
        return $this->hasMany(UploadedFiles::class);
    }
}
