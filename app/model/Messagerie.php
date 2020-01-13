<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Messagerie extends Model
{

    protected $fillable = ['message','vue','vue-a','id_recepteur'];
    protected  $table = "messagerie";



}
