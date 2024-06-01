<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UploadedFiles extends Model
{
    use HasFactory;
    protected $fillable = ['client_id','filled_form_id'];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
