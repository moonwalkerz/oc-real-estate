<?php namespace Fiveupmedia\Myhome\Models;

use Model;
use Log;
/**
 * Model
 */
class Operation extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'fiveupmedia_myhome_operations';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
	
	
    public $hasMany = [
        'units' => 'FiveUpMedia\Myhome\Models\Unit'
    ];

    public $attachMany = [
        'images' => 'System\Models\File',
        'videos' => 'System\Models\File',
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

     /**
     * Lists posts for the front end
     * @param  array $options Display options
     * @return self
     */
    public function scopeListFrontPage($query, $options)
    {
        /*
         * Default options
         */
        extract(array_merge([
            'page'       => 1,
            'perPage'    => 12,
            'sort'       => 'created_at',
            'search'     => '',
            'published'  => true,
            'exceptPost' => null,
            'singleReview' => null,
        ], $options));

        $searchableFields = ['name'];

     
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
    public function setUrl($pageName, $controller)
    {
        $params = [
            'id'   => $this->id,
            'slug' => $this->slug,
        ];

        Log::info("url:".$controller->pageUrl($pageName, $params));
        return $this->url = $controller->pageUrl($pageName, $params);
    }


}
