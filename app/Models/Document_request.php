<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\BSON\Document;

class Document_request extends Model
{
    use HasFactory;
    protected $fillable = ['client_id','document_id'];
    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(clients::class);
    }
    public function document_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Document_type::class);
    }
}
