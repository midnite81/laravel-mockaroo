<?php

namespace Midnite81\LaravelMockaroo\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    /**
     * Employee constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = mockaroo_prefix('genders');
    }

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = ['id'];

}