<?php

namespace mensajeria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class prestamos extends Model
{
    //
    //  use SoftDeletes;
   protected $table= "prestamos";
   protected $fillable =['contratista','fecha','descripcion','monto','saldo'];
   protected $dates = ['deleted_at'];
    //
}
