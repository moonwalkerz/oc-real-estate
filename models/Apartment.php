<?php namespace Fiveupmedia\Myhome\Models;

use Model;

/**
 * Model
 */
class Apartment extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'fiveupmedia_myhome_apartments';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
