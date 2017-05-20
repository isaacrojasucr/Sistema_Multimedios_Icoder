<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class person extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'people';

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
    protected $fillable = ['name', 'middlename', 'lastname','gender', 'id_card', 'mail', 'phone', 'height', 'width', 'blood', 'country', 'birthday', 'state', 'town', 'address', 'role', 'image', 'id_card_front', 'id_card_back'];

    
}
