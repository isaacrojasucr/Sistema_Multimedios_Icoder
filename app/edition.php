<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class edition extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'editions';

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
    protected $fillable = ['name', 'enable', 'year', 'place', 'initial_date', 'final_date'];

    
}
