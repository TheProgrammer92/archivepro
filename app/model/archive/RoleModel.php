<?php

namespace App\model\archive;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    //
    protected  $table ="role_archive";


    protected  $fillable = ['name','role'];
}
