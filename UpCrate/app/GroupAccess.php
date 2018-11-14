<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupAccess extends Model
{
    // table name
    public $table = 'groupAccess';

    // primary key
    public $primaryKey = 'group_id';

    public $timestamps = false;
}
