<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    protected $fillable = ['name', 'email', 'phone'];
    public function Document_request(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Document_request::class);
    }

}
