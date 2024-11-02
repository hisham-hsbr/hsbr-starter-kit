<?php

namespace App\Models\AppModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestDemo extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];
}
