<?php namespace Fiveupmedia\Myhome\Models;

use Model;

/**
 * Model
 */
class Unit extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'fiveupmedia_myhome_units';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
	
	    public $hasOne = [
        'operation' => ['FiveUpMedia\Myhome\Models\Operation', 'key' => 'operation_id']
    ];

    public $hasMany = [
        'apartments' => 'FiveUpMedia\Myhome\Models\Apartment'
    ];

    public $attachMany = [
    'images' => 'System\Models\File',
    'attachments' => 'System\Models\File'
    ];

     public static $allowedSortingOptions = [
        'name asc' => 'Name (ascending)',
        'name desc' => 'Name (descending)',
        'created_at asc' => 'Created (ascending)',
        'created_at desc' => 'Created (descending)',
        'updated_at asc' => 'Updated (ascending)',
        'updated_at desc' => 'Updated (descending)',
        'sort_order desc' => 'Ordinamento',
        'random' => 'Random'
    ];

    public function getContractOptions()
    {
        return [
            'sell'=>'Vendita',
            'rent'=>'Affitto'
        ];
    }


    public function scopeNotOperation($query)
    {
         return $query->whereNull('operation_id');
    }

      /**
     * Lists posts for the front end
     * @param  array $options Display options
     * @return self
     */
    public function scopeListFrontEnd($query, $options)
    {
        /*
         * Default options
         */
        extract(array_merge([
            'page'       => 1,
            'perPage'    => 30,
            'sort'       => 'created_at',
            'search'     => '',
        ], $options));

        $searchableFields = ['title'];
        /*
         * Sorting
         */
        if (!is_array($sort)) {
            $sort = [$sort];
        }

        foreach ($sort as $_sort) {

            if (in_array($_sort, array_keys(self::$allowedSortingOptions))) {
                $parts = explode(' ', $_sort);
                if (count($parts) < 2) {
                    array_push($parts, 'desc');
                }
                list($sortField, $sortDirection) = $parts;
                if ($sortField == 'random') {
                    $sortField = Db::raw('RAND()');
                }
                $query->orderBy($sortField, $sortDirection);
            }
        }


        /*
         * Search
         */
        $search = trim($search);
        if (strlen($search)) {
            $query->searchWhere($search, $searchableFields);
        }

        return $query->paginate($perPage, $page);
    }


    
  /**
     * Sets the "url" attribute with a URL to this object
     * @param string $pageName
     * @param Cms\Classes\Controller $controller
     */
    public function setComplexUrl($complesso,$unita, $controller)
    {
        $params = [
            'id'   => $this->id,
            'complesso' => $complesso,
            'unita' => $unita,
        ];

        Log::info("this url:".$this->url);
 //       return $this->url = $controller->pageUrl($pageName, $params);
        return $this->complexurl  = "/complesso/".$complesso."/".$unita;

      //  return;// $this->url = "/complesso/".$complesso."/".$unita;

    //   return  $this->url = $controller->pageUrl('unita', $params);
}

}
