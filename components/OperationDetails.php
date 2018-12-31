<?php namespace Fiveupmedia\Myhome\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use FiveUpMedia\Myhome\Models\Operation;
use FiveUpMedia\Myhome\Models\Unit;

use Log;

class OperationDetails extends ComponentBase
{

    var  $operation;
    var  $units;
    var $complesso;

    public function componentDetails()
    {
        return [
            'name'        => 'Dettaglio Operazione',
            'description' => 'Dettaglio Operazione'
        ];
    }

    public function defineProperties()
    {
        return [
         'slug' => [
                'title'       => 'url alias',
                'description' => 'url alias della pagina',
                'default'     => '{{ :slug }}',
                'type'        => 'string'
         ],
         'complesso' => [
            'title'       => 'url alias',
            'description' => 'url alias della pagina',
            'default'     => '{{ :complesso }}',
            'type'        => 'string'
     ],
     'unita' => [
        'title'       => 'url alias',
        'description' => 'url alias della pagina',
        'default'     => '{{ :unita }}',
        'type'        => 'string'
 ],
         'unitPage' => [
            'title'       => 'Pagina unità',
            'description' => 'Pagina della singola unità',
            'type'        => 'dropdown',
            'default'     => 'blog/post',
            'group'       => 'Links',
        ],
        ];
    }


    public function getUnitPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }


  public function onRun()
    {
        $this->prepareVars();

        $this->operation = $this->page['operation'] = Operation::where('slug','=',$this->property('slug'))->get()->first();
     //   dd($this->operation->get()->first()->id);
       $units= Unit::where('operation_id','=',$this->operation->id)->get();

        $this->complesso = $this->operation->slug;

        $units->each(function($unit)
        {
            Log::info('zio garu /complesso/'.$this->complesso.'/'.$unit->slug);
            $unit->setComplexUrl($this->complesso, $unit->slug, $this->controller);
        });
    //    dd($this->units);
   
    $this->units = $this->page['units'] =$units;

}

     protected function prepareVars()
    {
        
      


      
    }


}


