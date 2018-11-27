<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
class Category extends Model
{
    //
    public function types()
    {
        return $this->belongsToMany(Product::class);
    }
}
