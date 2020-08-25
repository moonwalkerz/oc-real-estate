<?php namespace Fiveupmedia\Myhome\Components;

use Cms\Classes\ComponentBase;
use FiveUpMedia\Myhome\Models\Unit;
use FiveUpMedia\Myhome\Models\Operation;


class Details extends ComponentBase
{

    var  $unit;
    var $operation;

    public function componentDetails()
    {
        return [
            'name'        => 'vista dettaglio',
            'description' => 'Dettaglio Unità'
        ];
    }

    public function defineProperties()
    {
        return [
         'complesso' => [
                'title'       => 'url alias complesso',
                'description' => 'url alias della pagina',
                'default'     => '{{ :complesso }}',
                'type'        => 'string'
         ],
         'unita' => [
            'title'       => 'url alias unita',
            'description' => 'url alias della pagina',
            'default'     => '{{ :unita }}',
            'type'        => 'string'
        ]
        ];
    }



  public function onRun()
    {
        $this->prepareVars();

        if (!empty($this->property('complesso'))) {

        
        $this->operation = $this->page['operation'] = Operation::where('slug','=',$this->property('complesso'))->get()->first();

        $this->unit = $this->page['unit'] = Unit::where('slug','=',$this->property('unita'))->where('operation_id','=',$this->operation->id)->get()->first();

        } else {
            $this->unit = $this->page['unit'] = Unit::notOperation()->where('slug','=',$this->property('unita'))->get()->first();
        }


    }

     protected function prepareVars()
    {
        
      


      
    }


}


