<?php

namespace mensajeria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class frecuente extends Model
{
  protected $table= "frecuentes";
  protected $fillable =['descripcion','cliente'];
  protected $dates = ['deleted_at'];
}
