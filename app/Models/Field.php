<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'label'
    ];
    public function forms(){

    return $this->belongsToMany(Form::class,'form_fields');
    }
}
