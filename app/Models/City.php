<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $slug
 * @property string $name
 */

class City extends Model
{
    use HasFactory;

    protected $guarded = [];
}
