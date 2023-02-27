<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    const BAD_LETTERS = [' ', '_', '–', '-', '(', ')', '‒'];
    const BAD_URLS = ['http', 's://', '://'];

    protected $casts = [
        'created_at' => 'date:d.m.Y'
    ];
}
