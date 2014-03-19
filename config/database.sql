-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************


--
-- Table `tl_module`
--

CREATE TABLE `tl_module` (
 `cl_template` varchar(255) NOT NULL default '',
 `cl_substr` varchar(55) NOT NULL default '',
 `cl_css_file` varchar(255) NOT NULL default '',
 `cl_no_param` char(1) NOT NULL default '',
 `cl_delay` varchar(10) NOT NULL default '',
 `cl_content` text NULL,
 `cl_set_session` char(1) NOT NULL default '',
 `cl_set_cookie` char(1) NOT NULL default '',
 `cl_cookie_name` varchar(55) NOT NULL default '',
 `cl_cookie_dauer` varchar(55) NOT NULL default '',
 `cl_framework` varchar(55) NOT NULL default '',
 `cl_option_layerwidth` varchar(55) NOT NULL default '',
 `cl_option_layerheight` varchar(55) NOT NULL default '',
 `cl_hideOverlay` char(1) NOT NULL default '',
 `cl_set_jsoptions` char(1) NOT NULL default '',
 `cl_set_drawOverLay` char(1) NOT NULL default '',
 `cl_set_overLayID` varchar(55) NOT NULL default 'srl_overLay',
 `cl_set_drawLayer` char(1) NOT NULL default '',
 `cl_set_LayerID` varchar(55) NOT NULL default 'srl_layer',
 `cl_set_drawCloseBtn` char(1) NOT NULL default '',
 `cl_set_closeID` varchar(55) NOT NULL default 'srl_closeBtn',
 `cl_set_closeClass` varchar(55) NOT NULL default 'srl_closer',
 `cl_set_mkLinkEvents` char(1) NOT NULL default '',
 `cl_set_overLayOpacity` char(10) NOT NULL default '',
 `cl_set_duration` varchar(55) NOT NULL default '1000',
 `cl_set_closePerEsc` char(1) NOT NULL default '1',
 `cl_set_closePerLayerClick` char(1) NOT NULL default '1',
 `cl_set_drawLayerCenterX` char(1) NOT NULL default '1',
 `cl_set_drawLayerCenterY` char(1) NOT NULL default '1',
 `cl_option_other` text NULL,
 `cl_start` varchar(10) NOT NULL default '',
 `cl_stop` varchar(10) NOT NULL default '',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
