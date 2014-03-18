<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 *
 * The TYPOlight webCMS is an accessible web content management system that
 * specializes in accessibility and generates W3C-compliant HTML code. It
 * provides a wide range of functionality to develop professional websites
 * including a built-in search engine, form generator, file and user manager,
 * CSS engine, multi-language support and many more. For more information and
 * additional TYPOlight applications like the TYPOlight MVC Framework please
 * visit the project website http://www.typolight.org.
 *
 * This file modifies the data container array of table tl_module.
 *
 * @copyright  Sven Rhinow 2011
 * @author     Sven Rhinow <sven@sr-tag.de>
 * @package    CampainLayer
 * @license    LGPL
 * @filesource

 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'] = array_merge( $GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'], array('cl_set_cookie', 'cl_set_expertoptions'));

// $GLOBALS['TL_DCA']['tl_module']['palettes']['campain_layer']  = 'name,type;cl_content,cl_option_layerwidth,cl_option_layerheight,cl_template,cl_css_file;cl_no_param,cl_substr,cl_set_mkLinkEvents,cl_start,cl_stop;cl_set_session;cl_set_cookie,cl_cookie_name,cl_cookie_dauer;
// {expert_legend:hide},cl_set_drawOverLay,cl_set_overLayID,cl_set_drawLayer,cl_set_LayerID,cl_set_drawCloseBtn,cl_set_closeID,cl_set_closeClass,cl_set_overLayOpacity,cl_set_closePerEsc,cl_set_closePerLayerClick,cl_set_drawLayerCenterX,cl_set_drawLayerCenterY,cl_option_other';

$GLOBALS['TL_DCA']['tl_module']['palettes']['campain_layer']  = 'name,type;{layer_legend},cl_content,cl_option_layerwidth,cl_option_layerheight;{htmlcss_legend},cl_template,cl_css_file;{show_legend},cl_no_param,cl_set_mkLinkEvents,cl_substr,cl_delay,cl_start,cl_stop;{session_legend},cl_set_session;{cookie_legend},cl_set_cookie;{expert_legend:hide},cl_set_expertoptions';

$GLOBALS['TL_DCA']['tl_module']['subpalettes'] = array_merge($GLOBALS['TL_DCA']['tl_module']['subpalettes'], 
	array(
		'cl_set_cookie' => 'cl_cookie_name,cl_cookie_dauer',
		'cl_set_expertoptions' => 'cl_set_overLayID,cl_set_LayerID,cl_set_closeID,cl_set_closeClass,cl_set_overLayOpacity,cl_set_duration,cl_set_closePerEsc,cl_set_closePerLayerClick,cl_set_drawLayerCenterX,cl_set_drawLayerCenterY,cl_option_other'
	)
);

array_insert($GLOBALS['TL_DCA']['tl_module']['fields'] , 2, array
(
	'cl_template' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['cl_template'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options_callback'	  => array('campain_layer','get_Template'),
		'eval'			=> array('tl_class'=>'clr')
	),
	'cl_css_file' => array
	(
	    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['cl_css_file'],
	    'exclude'                 => true,
	    'inputType'               => 'fileTree',
	    'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'mandatory'=>false,'extensions'=>'css','tl_class'=>'clr')
	),
	'cl_content'=> array
	(
	    'label' => &$GLOBALS['TL_LANG']['tl_module']['cl_content'],
	    'exclude' => true,
	    'inputType'  => 'textarea',
	    'eval' => array('mandatory'=>false,'rte'=>false,'allowHtml'=>true,'tl_class'=>'clr'),
	),
	'cl_no_param' => array
	(
	    'label'         => &$GLOBALS['TL_LANG']['tl_module']['cl_no_param'],
	    'exclude'       => true,
	    'inputType'     => 'checkbox',
	   	'eval' 			=> array('tl_class'=>'w50'),
	),
	'cl_set_mkLinkEvents' => array
	(
	    'label'       => &$GLOBALS['TL_LANG']['tl_module']['cl_set_mkLinkEvents'],
	    'exclude'     => true,
	    'default'	  => '',
	    'inputType'   => 'checkbox',
	    'eval' 			=> array('tl_class'=>'w50'),
	),
	'cl_substr'=> array
	(
	    'label' => &$GLOBALS['TL_LANG']['tl_module']['cl_substr'],
	    'exclude' => true,
	    'inputType' => 'text',
	    'eval' => array('mandatory'=>false,'maxlength'=>55,'tl_class'=>'w50'),
	),

	'cl_delay'			=> array
	(
	    'label' 		=> &$GLOBALS['TL_LANG']['tl_module']['cl_delay'],
	    'exclude' 		=> true,
	    'inputType' 	=> 'text',
	    'eval' 			=> array('mandatory'=>false,'maxlength'=>10, 'rgxp'=>'digit', 'tl_class'=>'w50'),
		'sql'			=> "varchar(10) NOT NULL default ''"
	),

	'cl_set_session' => array
	(
	    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['cl_set_session'],
	    'exclude'                 => true,
	    'inputType'               => 'checkbox',
	),
	'cl_set_cookie' => array
	(
	    'label'         => &$GLOBALS['TL_LANG']['tl_module']['cl_set_cookie'],
	    'exclude'       => true,
	    'eval'          => array('submitOnChange'=>true),
	    'inputType'     => 'checkbox',
	),
	'cl_cookie_name'=> array
	(
	    'label' => &$GLOBALS['TL_LANG']['tl_module']['cl_cookie_name'],
	    'exclude' => true,
	    'inputType' => 'text',
	    'eval' => array('mandatory'=>false,'maxlength'=>55,'tl_class'=>'w50'),
	),
	'cl_cookie_dauer'=> array
	(
	    'label' => &$GLOBALS['TL_LANG']['tl_module']['cl_cookie_dauer'],
	    'default' => 3600,
	    'exclude' => true,
	    'inputType' => 'text',
	    'eval' => array('mandatory'=>false,'maxlength'=>55,'rgxp'=>'digit','tl_class'=>'w50'),
	),
	'cl_option_layerwidth'=> array
	(
	    'label' => &$GLOBALS['TL_LANG']['tl_module']['cl_layer_width'],
	    'default' => '600',
	    'exclude' => true,
	    'inputType' => 'text',
	    'eval' => array('mandatory'=>true,'maxlength'=>55,'tl_class'=>'w50','rgxp'=>'digit'),
	),
	'cl_option_layerheight'=> array
	(
	    'label' => &$GLOBALS['TL_LANG']['tl_module']['cl_layer_height'],
	    'default' => '450',
	    'exclude' => true,
	    'inputType' => 'text',
	    'eval' => array('mandatory'=>true,'maxlength'=>55,'tl_class'=>'w50','rgxp'=>'digit'),
	),
	'cl_set_expertoptions' 	=> array
	(
	    'label'         => &$GLOBALS['TL_LANG']['tl_module']['cl_set_expertoptions'],
	    'exclude'       => true,
	    'inputType'     => 'checkbox',
	    'eval'          => array('submitOnChange'=>true),
		'sql'			=> "char(1) NOT NULL default ''"
	),
	'cl_set_overLayID'=> array
	(
	    'label' => &$GLOBALS['TL_LANG']['tl_module']['cl_set_overLayID'],
	    'default' => 'srl_overLay',
	    'exclude' => true,
	    'inputType' => 'text',
	    'eval' => array('tl_class'=>'w50'),
	),

	'cl_set_LayerID'=> array
	(
	    'label' => &$GLOBALS['TL_LANG']['tl_module']['cl_set_LayerID'],
	    'default' => 'srl_layer',
	    'exclude' => true,
	    'inputType' => 'text',
	    'eval' => array('tl_class'=>'w50'),
	),
	'cl_set_drawCloseBtn' => array
	(
	    'label'       => &$GLOBALS['TL_LANG']['tl_module']['cl_set_drawCloseBtn'],
	    'exclude'     => true,
	    'default'	  => '',
	    'inputType'   => 'checkbox',
	    'eval' => array('tl_class'=>'w50'),
	),
	'cl_set_closeID'=> array
	(
	    'label' => &$GLOBALS['TL_LANG']['tl_module']['cl_set_closeID'],
	    'default' => 'srl_closeBtn',
	    'exclude' => true,
	    'inputType' => 'text',
	    'eval' => array('tl_class'=>'w50'),
	),
	'cl_set_closeClass'=> array
	(
	    'label' => &$GLOBALS['TL_LANG']['tl_module']['cl_set_closeClass'],
	    'default' => 'srl_closer',
	    'exclude' => true,
	    'inputType' => 'text',
	    'eval' => array('tl_class'=>'w50'),
	),
	'cl_set_overLayOpacity' => array
	(
		'label'                 => &$GLOBALS['TL_LANG']['tl_module']['cl_set_overLayOpacity'],
		'exclude'               => true,
		'filter'                => true,
        'default' 		=> 0.7,
		'inputType'             => 'select',
		'options'               => array('0.0'=>'0.0','0.1'=>'0.1','0.2'=>'0.2','0.3'=>'0.3','0.4'=>'0.4','0.5'=>'0.5','0.6'=>'0.6','0.7'=>'0.7','0.8'=>'0.8','0.9'=>'0.9','1.0'=>'1.0'),
		'eval'			=> array('tl_class'=>'w50')
	),
	'cl_set_duration'	=> array
	(
	    'label' 		=> &$GLOBALS['TL_LANG']['tl_module']['cl_set_duration'],
	    'default' 		=> '1000',
	    'exclude' 		=> true,
	    'inputType' 	=> 'text',
	    'eval' 			=> array('tl_class'=>'w50'),
		'sql'			=> "varchar(55) NOT NULL default '1000'"
	),
	'cl_set_closePerEsc' => array
	(
	    'label'       => &$GLOBALS['TL_LANG']['tl_module']['cl_set_closePerEsc'],
	    'exclude'     => true,
	    'default'	  => '1',
	    'inputType'   => 'checkbox',
	    'eval' => array('tl_class'=>'w50'),
	),
	'cl_set_closePerLayerClick' => array
	(
	    'label'       => &$GLOBALS['TL_LANG']['tl_module']['cl_set_closePerLayerClick'],
	    'exclude'     => true,
	    'default'	  => '1',
	    'inputType'   => 'checkbox',
	    'eval' => array('tl_class'=>'w50'),
	),
	'cl_set_drawLayerCenterX' => array
	(
	    'label'       => &$GLOBALS['TL_LANG']['tl_module']['cl_set_drawLayerCenterX'],
	    'exclude'     => true,
	    'default'	  => '1',
	    'inputType'   => 'checkbox',
	    'eval' => array('tl_class'=>'w50'),
	),
	'cl_set_drawLayerCenterY' => array
	(
	    'label'       => &$GLOBALS['TL_LANG']['tl_module']['cl_set_drawLayerCenterY'],
	    'exclude'     => true,
	    'default'	  => '1',
	    'inputType'   => 'checkbox',
	    'eval' => array('tl_class'=>'w50'),
	),
	'cl_option_other'=> array
	(
	    'label' => &$GLOBALS['TL_LANG']['tl_module']['cl_option_other'],
	    'exclude' => true,
	    'default' => '',
	    'inputType'  => 'textarea',
	    'eval' => array('mandatory'=>false,'rte'=>false,'allowHtml'=>true,'tl_class'=>'clr'),
	),
	'cl_start' => array
	(
		'exclude'                 => true,
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['cl_start'],
		'inputType'               => 'text',
		'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard')
	),
	'cl_stop' => array
	(
		'exclude'                 => true,
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['cl_stop'],
		'inputType'               => 'text',
		'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard')
	)

));
/**
 * Class campain_layer
 * Provide miscellaneous methods that are used by the data configuration array.
 */
class campain_layer extends Backend
{
    public function get_Template(DataContainer $dc)
    {
		if(version_compare(VERSION.BUILD, '2.9.0','>='))
		{
			return $this->getTemplateGroup('cl_', $dc->activeRecord->pid);
		}
		else
		{
			return $this->getTemplateGroup('cl_');
		}
    }

 }
?>
