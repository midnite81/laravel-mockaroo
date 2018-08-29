<?php

namespace Midnite81\LaravelMockaroo\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'users';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = ['id'];

}
