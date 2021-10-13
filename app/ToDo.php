<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    protected $table = 'to_do';

    protected $fillable = [
        'name'
    ];
}
