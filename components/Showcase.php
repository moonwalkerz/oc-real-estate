<?php namespace FiveUpMedia\Myhome\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use FiveUpMedia\Myhome\Models\Operation;

use Log;
class Showcase extends ComponentBase
{
    var $operations;
    var $slides;
    var $operationPage;
    
    public function componentDetails()
    {
        return [
            'name'        => 'Vetrina',
            'description' => 'Vetrina prima pagina'
        ];
    }

    public function defineProperties()
    {
         return [
            'slides' => [
                'title'       => 'N° di slides',
                'description' => 'n° di slides totali',
                'type'        => 'string',
            ],
             'titolo' => [
                'title'        => 'Titolo',
                'description'  => 'Titolo dello showcase',
                'type'         => 'string',
                'default'      => 'Vetrina',
                'showExternalParam' => false
            ],
            'operationsPerPage' => [
                'title'             => 'Operazioni per pagina',
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'Deve essere un numero',
                'default'           => '12',
            ],
            'showPagination' => [
                'title'       => 'Mostra Paginazione?',
                'description' => 'mostra la paginazione',
                'type'        => 'checkbox',
                'default'     => 1
            ],

            'noOperationsMessage' => [
                'title'        => 'Nessuna Operazione',
                'description'  => 'Messaggio in caso di nessuna operazione',
                'type'         => 'string',
                'default'      => 'No articles found',
                'showExternalParam' => false
            ],
            'sortOrder' => [
                'title'       => 'Ordinamento',
                'description' => 'Ordinamento delle operazioni',
                'type'        => 'dropdown',
                'default'     => 'published_at desc'
            ],

            'operationPage' => [
                'title'       => 'Pagina complesso',
                'description' => 'Pagina del singolo complesso',
                'type'        => 'dropdown',
                'default'     => 'blog/post',
                'group'       => 'Links',
            ],


        ];
    }


    public function getOperationPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function getSortOrderOptions()
    {
        return Operation::$allowedSortingOptions;
    }

   public function onRun()
    {
       

//        $this->operations = $this->page['operations'] = Operation::orderBy('name')->where('frontpage',1)->get();


    }
    public function onRender()
    {
        $this->prepareVars();
        $this->operations = $this->page['operations'] = $this->listOperations();
    }
    protected function prepareVars()
    {
        $this->pageParam = $this->page['pageParam'] = $this->paramName('pageNumber');
        $this->noArticlesMessage = $this->page['noOperationsMessage'] = $this->property('noOperationsMessage');

        
        $this->showPagination = $this->property('showPagination');
   
        /*
         * Page links
         */
        $this->operationPage = $this->page['operationPage'] = $this->property('operationPage');


        if ($pageNumberParam = $this->paramName('pageNumber')) {
            $currentPage = $this->property('pageNumber');

            if ($currentPage > ($lastPage = $this->operations->lastPage()) && $currentPage > 1)
                return Redirect::to($this->currentPageUrl([$pageNumberParam => $lastPage]));
        }
      
    }

    protected function listOperations()
    {
     

        $operations = Operation::listFrontPage([
            'page'       => $this->property('pageNumber'),
            'sort'       => $this->property('sortOrder'),
            'perPage'    => $this->property('operationsPerPage'),
            'search'     => trim(input('search'))
        ]);
        
        $operations->each(function($operation) 
        {
            $operation->setUrl($this->operationPage, $this->controller);
        });
        
        return $operations;
    }


}
