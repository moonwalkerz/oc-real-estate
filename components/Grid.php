<?php namespace Fiveupmedia\Myhome\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use FiveUpMedia\Myhome\Models\Unit;

class Grid extends ComponentBase
{
    public $units;


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

        $this->units = $this->page['units'] = Unit::orderBy('name')->notOperation()->get();


    }

     protected function prepareVars()
    {
        
      

        /*
         * Page links
         */
        $this->unitPage = $this->page['unitPage'] = $this->property('unitPage');

      
    }

    protected function listOperations()
    {
     

        $offers = Unit::listFrontPage([
            'sort'       => $this->property('sortOrder')
        ]);

        
        return $offers;
    }



}
