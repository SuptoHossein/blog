<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $gurarded = ['created_at', 'updated_at', 'deleted_at'];
}
