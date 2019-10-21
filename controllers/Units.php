<?php namespace Fiveupmedia\Myhome\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Redirect;
use Fiveupmedia\Myhome\Models\Unit;

class Units extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\ReorderController'
    ];
    
    public  $listConfig = [
        'list' => 'config_list.yaml',
        'trashed' => 'config_list_trashed.yaml'
    ];
    
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Fiveupmedia.Myhome', 'main-menu-item', 'side-menu-item3');
    }
	
	public function listExtendQuery($query, $definition = null){
      
        if ($definition == 'trashed')
        {
            $query->onlyTrashed();
        } else {
            $query->whereNull('operation_id')->orWhere('operation_id','=',0);
        }
    }

    public function restore($id=null) {
        Unit::where('id','=',$id)->restore();
        return Redirect::back();
    }

    public function trashcan()
    {
        $this->makeLists();
    }
}
