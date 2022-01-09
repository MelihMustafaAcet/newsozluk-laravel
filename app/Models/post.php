<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    public $timestamps = true;
    const CREATED_AT = 'post_date';
    const UPDATED_AT = 'post_modified';
}
