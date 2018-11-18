<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupFile extends Model
{
    public $table = 'groupFile';
    protected $primaryKey = ['group_id', 'file_id'];
    public $incrementing = false;
    public $timestamps = false;
}
