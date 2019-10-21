<?php namespace Fiveupmedia\Myhome;
use App;
use Event;
use System\Classes\PluginBase;
use Backend;


class Plugin extends PluginBase
{
    public function boot()
    {
        if (!App::runningInBackend()) {
            return;
        }

        Event::listen('backend.page.beforeDisplay', function($controller, $action, $params) {
            $controller->addCss('/plugins/fiveupmedia/myhome/assets/color.css');
        });
    }

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
