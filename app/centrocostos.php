<?php

namespace mensajeria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class centrocostos extends Model
{
    //
  use SoftDeletes;
   protected $table= "centrocostos";
   protected $fillable =['nombre','contacto','direccion','cliente'];
   protected $dates = ['deleted_at'];
}
