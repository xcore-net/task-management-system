<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    protected $fillable = ['name', 'email', 'phone'];
}
