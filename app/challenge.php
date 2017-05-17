<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class challenge extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'challenges';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'cat_id'];

    
}
