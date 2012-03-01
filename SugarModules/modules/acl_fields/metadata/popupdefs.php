<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$module_name = 'acl_fields';
$_module_name = 'acl_fields';
$popupMeta = array('moduleMain' => $module_name,
						'varName' => $module_name,
						'orderBy' => $_module_name.'.name',
						'whereClauses' => 
							array('name' => $_module_name . '.name', 
								),
						    'searchInputs'=> array($_module_name. '_number', 'name', 'priority','status'),
							'listview' => 'modules/' . $module_name. '/metadata/listviewdefs.php',
							'search'   => 'modules/' . $module_name . '/metadata/searchdefs.php',
							
						);
?>
 
 
