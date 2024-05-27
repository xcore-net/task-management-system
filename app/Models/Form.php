<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Form extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description'];
    public function fields()
    {
        return $this->belongsToMany(Field::class, 'form_fields');
    }
    public function documentTypes(): HasMany
    {
        return $this->hasMany(DocumentType::class);
    }
}
