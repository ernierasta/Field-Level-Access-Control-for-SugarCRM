<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
 
global $app_strings;

$dashletMeta['acl_fieldsDashlet'] = array('module'		=> 'acl_fields',
										  'title'       => translate('LBL_HOMEPAGE_TITLE', 'acl_fields'), 
                                          'description' => 'A customizable view into acl_fields',
                                          'icon'        => 'themes/default/images/icon_acl_fields_32.gif',
                                          'category'    => 'Module Views');
