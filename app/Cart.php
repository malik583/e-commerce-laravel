<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['user_id','product_id','product_title','product_description','product_price','product_logo','no_of_items','delete_flag'];
}
