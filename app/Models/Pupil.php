<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pupil extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pupils';

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
    protected $fillable = ['user_code', 'first_name', 'last_name', 'phone_number', 'status'];

    
}
