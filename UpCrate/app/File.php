<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    // table name
    public $table = 'file';
    
    // primary key
    public $primaryKey = 'id';

    public $timestamps = false;
}
