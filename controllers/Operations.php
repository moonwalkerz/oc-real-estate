<?php namespace Fiveupmedia\Myhome\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Operations extends Controller
{
    public $implement = [ 
	'Backend\Behaviors\ListController',
	'Backend\Behaviors\FormController',
	'Backend\Behaviors\RelationController', 
	'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
	public $relationConfig = 'config_relation.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Fiveupmedia.Myhome', 'main-menu-item');
    }
}
