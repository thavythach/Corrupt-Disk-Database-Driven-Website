<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMembers extends Model
{
        // table name
        public $table = 'group_members';

        // primary key
        public $primaryKey = ['user_id', 'group_id'];
        public $incrementing = false;
    
        public $timestamps = false;
}
