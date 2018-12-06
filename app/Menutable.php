<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menutable extends Model
{
    //
    protected $table = 'menutable';
    public $primaryKey='id';
    public $timestamps=true;
}
