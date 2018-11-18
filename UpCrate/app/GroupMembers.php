<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMembers extends Model
{
        // table name
        public $table = 'group_members';

        // primary key
        public $primaryKey = 'group_id';
    
        public $timestamps = false;
}
