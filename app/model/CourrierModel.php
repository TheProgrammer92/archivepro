<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CourrierModel extends Model
{

    protected $fillable = ['numero','id_expediteur','id_destinataire','type','delivered'];
    protected  $table = "courrier";
}
