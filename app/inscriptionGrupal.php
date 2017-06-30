<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inscriptionGrupal extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inscriptionGrupal';

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
    protected $fillable = ['sport', 'category', 'proof', 'inscription', 'edition', 'stade'];

}
