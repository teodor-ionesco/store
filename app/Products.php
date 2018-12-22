<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	/* Specify table name */
    protected $table = 'products';

    /* Disable timestamps */
    public $timestamps = false;
}
