<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildPanel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'domain',
        'panel_name',
        'logo',
        'markup_percentage',
        'api_key',
        'status',
    ];
}