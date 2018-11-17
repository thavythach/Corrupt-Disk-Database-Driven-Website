<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualAccess extends Model
{
    public $table = 'individualAccess';
    protected $primaryKey = ['user_id', 'file_id'];
    public $incrementing = false;
    public $timestamps = false;
}
