<?php

/**
 * Class ModuleVouchersLatest
 *
 * @copyright  sr-tag.de 2011-2014
 * @author     Sven Rhinow <support@sr-tag.de>
 * @package    CampainLayer
 */
class ModuleCampainLayer extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'cl_layer';

	/**
	 * Target pages
	 * @var array
	 */
	protected $arrTargets = array();

	/**
	 * Options for JS
	 * @var array
	 */
	protected $optionsArr = array();

        /**
        * show files and layer
        * @var bool
        */
        protected $show = false;


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### KAMPAGNEN-LAYER ('.$this->cl_substr.') ###';

			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'typolight/main.php?do=modules&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}
		if($this->cl_template != '') $strTemplate = $this->cl_template;

		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile()
	{

        //sucht in den Get-Keys nach einer bestimmten Teil-Zeichenkette
        $pos = false;

        if(count($_GET)>0)
	   	{

		    foreach($_GET AS $k => $v)
			{
				$k = strip_tags(trim($k));
				$getPos = strcmp($k,$this->cl_substr)==0 ? true : false;
            }
        }

		//test Start-Date
		if(strlen($this->cl_start) && ($this->cl_start > time()))
		{
			return false;
		}

		//test Stop-Date
		if(strlen($this->cl_stop) && ($this->cl_stop < time()))
		{
			return false;
		}

		//Modul-Flag fuer "keine Parameter notwendig" pruefen
		if($this->cl_no_param || $getPos)
		{
			$this->optionsArr[] = 'showNow: true';
			$this->show = true;
		}


		//Modul-Flag fuer "Layer per Link öffnen" pruefen
		if($this->cl_set_mkLinkEvents)
		{
			$this->optionsArr[] = 'mkLinkEvents: true';
			$this->show = true;
		}

		//Cookie
		if($this->cl_set_cookie && $this->show)
		{

			//Name des Cookies
			if(!$this->cl_cookie_name) $this->cl_cookie_name = 'LAYER_'.$this->id.'_COOKIE';

			if(!$this->Input->cookie($this->cl_cookie_name))
			{
				if(!$this->cl_cookie_dauer) $this->cl_cookie_dauer = 3600;
				$this->setCookie($this->cl_cookie_name,1,time()+$this->cl_cookie_dauer);

			}else $this->show = false;
		}

		//Session
		if($this->cl_set_session && $this->show)
		{
			$this->import('Session');
			$this->cl_session_name = 'LAYER_'.$this->id.'_SESSION';

			if(!$this->Session->get($this->cl_session_name))
			{
				$this->Session->set($this->cl_session_name,'1');
			}else $this->show = false;

		}

		// nur wenn Fund dann CSS, JS und HTML einfuegen
		if($this->show)
		{
			$layerName = $this->cl_substr;

			if(is_numeric($this->cl_option_layerwidth)) $this->optionsArr[] = 'layerWidth:'.$this->cl_option_layerwidth;
			if(is_numeric($this->cl_option_layerheight)) $this->optionsArr[] = 'layerHeight:'.$this->cl_option_layerheight;

			//expert options
			if($this->cl_set_expertoptions == 1)
			{
				if(strlen($this->cl_set_overLayID)) $this->optionsArr[] = "overLayID:'".$this->cl_set_overLayID."'";
				if(strlen($this->cl_set_layerID)) $this->optionsArr[] = "overLayID:'".$this->cl_set_layerID."'";
				if(strlen($this->cl_set_closeID)) $this->optionsArr[] = "closeID:'".$this->cl_set_closeID."'";
				if(strlen($this->cl_set_closeClass)) $this->optionsArr[] = "closeClass:'".$this->cl_set_closeClass."'";
				if(strlen($this->cl_set_overLayOpacity)) $this->optionsArr[] = 'overLayOpacity:'.$this->cl_set_overLayOpacity;
				if(strlen($this->cl_set_duration)) $this->optionsArr[] = 'duration:'.$this->cl_set_duration;
				if(!$this->cl_set_closePerEsc) $this->optionsArr[] = 'closePerEsc:false';
		        if(!$this->cl_set_closePerLayerClick) $this->optionsArr[] = 'closePerLayerClick:false';
		        if(!$this->cl_set_drawLayerCenterX) $this->optionsArr[] = 'drawLayerCenterX:false';
		        if(!$this->cl_set_drawLayerCenterY) $this->optionsArr[] = 'drawLayerCenterY:false';

			}

	        $jsOptions = implode(', ',$this->optionsArr);

			//eigene CSS-Auszeichnungen aus CSS-Datei
			if($this->cl_css_file) $GLOBALS['TL_CSS'][] = $this->cl_css_file;
			else $GLOBALS['TL_CSS'][] =  $GLOBALS['CL_CSS'].'?'.time();

			foreach($GLOBALS['CL_JS']['mootools'] as $jsSource)
			{
				$GLOBALS['TL_JAVASCRIPT'][] = $jsSource.'?'.time();
			}

			if((int) $this->cl_delay > 0) $GLOBALS['TL_MOOTOOLS'][] = '<script type="text/javascript"> window.addEvent(\'domready\', function() { var ml = new  myLayer( { '.$jsOptions.', '.$this->cl_option_other.' } ); }.delay('.$this->cl_delay.'));</script>';
			else $GLOBALS['TL_MOOTOOLS'][] = '<script type="text/javascript"> window.addEvent(\'domready\', function() { var ml = new  myLayer( { '.$jsOptions.', '.$this->cl_option_other.' } ); });</script>';

			$this->Template->content = $this->cl_content;
			$this->Template->showLayerHtml = $this->show;
	   }

	}

}

