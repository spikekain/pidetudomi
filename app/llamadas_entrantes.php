<?php

namespace mensajeria;

use Illuminate\Database\Eloquent\Model;

class llamadas_entrantes extends Model
{
    //
    protected $table= "llamadas_entrantes";
    protected $fillable =['numero','linea','status'];
}
