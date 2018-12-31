<?php namespace Fiveupmedia\Myhome\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Config;

class Coords extends FormWidgetBase
{
    /**
     * @var string A unique alias to identify this widget.
     */
    protected $defaultAlias = 'coords';


	public function widgetDetails()
	{
		return [
			'name'=>'Coords',
			'description'=> 'Map for latitude and longitude field'
		];

	}

	public function loadAssets()
	{
		$this->addCss('leaflet.css');
		$this->addJs('leaflet.js');
	}


	public function render()
	{
	    $this->vars['id'] = $this->getId();
	//    $this->vars['name'] = $this->getFieldName();
	 //   $this->vars['value'] = $this->getLoadValue();

	    return $this->makePartial('widget');
	}

	public function getSaveValue($value)
	{
	     return \Backend\Classes\FormField::NO_SAVE_DATA;
	}

}

?>
