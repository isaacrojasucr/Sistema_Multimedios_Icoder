<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inscriptionPeople extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inscriptionPeople';

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
    protected $fillable = ['id_inscription', 'id_people', 'paee_cantonal'];

}
