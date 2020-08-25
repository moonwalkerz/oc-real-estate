<?php namespace Fiveupmedia\Myhome\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use FiveUpMedia\Myhome\Models\Unit;

class Grid extends ComponentBase
{
    public $units;
    public $number = 0;
    public $frontPageOnly = false;

    public function componentDetails()
    {
        return [
            'name'        => 'Griglia',
            'description' => 'Griglia Appartamenti / Unità'
        ];
    }

    public function defineProperties()
    {
        return [
             'titolo' => [
                'title'        => 'Titolo',
                'description'  => 'Titolo della griglia',
                'type'         => 'string',
                'default'      => 'Opportunità',
                'showExternalParam' => false
            ],
            'number' => [
                'title'        => 'Numero',
                'description'  => 'Numero di elementi, 0 tutti',
                'type'         => 'string',
                'default'      => '0',
            ],
            'frontPageOnly' => [
                'title'        => 'Front Page only',
                'description'  => 'Mostra solo ciò che è marcato come frontpage',
                'type'         => 'checkbox',
                'default'      => '0',
            ],
            'noUnitsMessage' => [
                'title'        => 'Nessuna Unità',
                'description'  => 'Messaggio in caso di nessuna unità',
                'type'         => 'string',
                'default'      => 'No units found',
                'showExternalParam' => false
            ],
            'sortOrder' => [
                'title'       => 'Ordinamento',
                'description' => 'Ordinamento delle unità',
                'type'        => 'dropdown',
                'default'     => 'published_at desc'
            ],
            'source' => [
                'title'       => 'Visualizza',
                'description' => 'Unità o appartamenti',
                'type'        => 'dropdown',
                'options'     => ['unita'=> 'Unità','appartamento'=>'Appartamenti'],
                'default'     => 'published_at desc'
            ],

            'unitPage' => [
                'title'       => 'Pagina unità',
                'description' => 'Pagina delle unità correlate',
                'type'        => 'dropdown',
                'default'     => 'complesso',
                'group'       => 'Links',
            ],


        ];
    }

   public function getSortOrderOptions()
    {
        return Unit::$allowedSortingOptions;
    }

   public function getUnitPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

   public function onRun()
    {
        $this->prepareVars();
        /*
        if ($this->number>0) {
            $this->units = $this->page['units'] = Unit::orderBy('name')->isPublished()->notOperation()->take($this->number)->get();
        } else {
            $this->units = $this->page['units'] = Unit::orderBy('name')->isPublished()->notOperation()->get();
        }
*/
        $this->units= $this->page['units']=$this->listUnits();

    }

     protected function prepareVars()
    {
        
      

        /*
         * Page links
         */
        $this->unitPage = $this->page['unitPage'] = $this->property('unitPage');
        $this->number=$this->page['number'] = $this->property('number');
        $this->fontPageOnly=$this->page['frontPageOnly'] = $this->property('frontPageOnly');
      
    }

    protected function listUnits()
    {
     

        $units = Unit::listFrontEnd([
            'sort'       => $this->property('sortOrder'),
            'frontPageOnly' =>  $this->property('frontPageOnly'),
            'sort' => $this->property('sortOrder'),
            'number'=> $this->property('number'),
            'notOperation' => true
        ]);

        
        return $units;
    }



}
