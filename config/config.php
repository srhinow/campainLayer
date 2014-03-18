<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * PHP version 5
 * @copyright  sr-tag.de 2011-2014
 * @author     Sven Rhinow
 * @package    campainLayer
 * @license    LGPL
 * @filesource
 */

/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['campain_layer'] = array('campain_layer' => 'ModuleCampainLayer');

/**
 * Paths of CSS and JS - Resources
 */
 $GLOBALS['CL_CSS'] = 'system/modules/campainLayer/html/css/campain_layer.css';
 $GLOBALS['CL_JS']['mootools'][] = 'system/modules/campainLayer/html/js/campainLayer_mootools.js';

