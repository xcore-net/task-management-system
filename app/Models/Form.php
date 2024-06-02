<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Form extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description','user_id','last_updated_by'];
    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(Field::class, 'form_fields');
    }
    public function documentTypes(): HasMany
    {
        return $this->hasMany(DocumentType::class);
    }
    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class, 'filled_forms');
    }
}
