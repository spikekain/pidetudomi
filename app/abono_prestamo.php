<?php

namespace mensajeria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class abono_prestamo extends Model
{
  protected $table= "abono_prestamo";
  protected $fillable =['contratista','fecha','monto'];
  protected $dates = ['deleted_at'];
}
