<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resturant;


class Menu extends Model
{
    use HasFactory;

     public function menus()
    {
    	return $this->belongsTo(Resturant::class,'resturant_id','id');
    }
}
