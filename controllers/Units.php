<?php namespace Fiveupmedia\Myhome\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Units extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Fiveupmedia.Myhome', 'main-menu-item', 'side-menu-item3');
    }
	
	public function listExtendQuery($query, $definition = null){
      
        $query->whereNull('operation_id');
  
    }
}
