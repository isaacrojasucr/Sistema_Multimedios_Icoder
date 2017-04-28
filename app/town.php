<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class town extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'towns';

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
    protected $fillable = ['name', 'enable', 'state_id'];

    
}
