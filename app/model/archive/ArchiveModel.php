<?php

namespace App\model\archive;

use Illuminate\Database\Eloquent\Model;

class ArchiveModel extends Model
{
    //

    protected $table= "archive";

    protected  $fillable = ['id_service','id_categorie','etat','fichier', 'id_user'];

}
