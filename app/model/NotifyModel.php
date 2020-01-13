<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class NotifyModel extends Model
{
    //


    protected $fillable = ['id_courrier','id_destinataire','vue'];
    protected  $table = "notify";
}
