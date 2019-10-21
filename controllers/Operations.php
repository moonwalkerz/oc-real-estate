<?php namespace Fiveupmedia\Myhome\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Fiveupmedia\Myhome\Models\Operation;
use Redirect;

class Operations extends Controller
{
    public $implement = [ 
	'Backend\Behaviors\ListController',
	'Backend\Behaviors\FormController',
	'Backend\Behaviors\RelationController', 
	'Backend\Behaviors\ReorderController'    ];
    
    public  $listConfig = [
        'list' => 'config_list.yaml',
        'trashed' => 'config_list_trashed.yaml'
    ];
    public $formConfig = 'config_form.yaml';
	public $relationConfig = 'config_relation.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Fiveupmedia.Myhome', 'main-menu-item');
    }

    
    public function listExtendQuery($query, $definition)
    {
        if ($definition == 'trashed')
        {
            $query->onlyTrashed();
        }
    }

    public function restore($id=null) {
        Operation::where('id','=',$id)->restore();
        return Redirect::back();
    }
    public function trashcan()
    {
        $this->makeLists();
    }
}
