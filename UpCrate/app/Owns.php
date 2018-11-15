<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owns extends Model
{
    public $table = 'owns';
    public $primaryKey = 'file_id';
    public $timestamps = false;
}
