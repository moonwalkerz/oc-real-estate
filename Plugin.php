<?php namespace Fiveupmedia\Myhome;

use System\Classes\PluginBase;
use Backend;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    	return [
    		'FiveUpMedia\Myhome\Components\Showcase' => 'showcase',
            'FiveUpMedia\Myhome\Components\Details' => 'details',
            'FiveUpMedia\Myhome\Components\OperationDetails' => 'operationDetails',
    		'FiveUpMedia\Myhome\Components\Grid' => 'grid'
    	];
    }

    public function registerFormWidgets()
    {
        return [
            'Fiveupmedia\Myhome\FormWidgets\Coords' => [
                'label' => 'Coord Map',
                'code' => 'coords'
            ]
        ];

    }


}
