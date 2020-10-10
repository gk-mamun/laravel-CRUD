<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = array('name', 'code', 'price', 'item_image', 'stock');

    use HasFactory;


}
