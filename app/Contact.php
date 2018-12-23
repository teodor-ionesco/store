<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /* Set table */
    protected $table = 'contact';

    /* Disable timestamps */
    public $timestamps = false;
}
