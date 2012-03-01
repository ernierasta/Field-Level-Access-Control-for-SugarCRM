<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

global $mod_strings, $app_strings, $sugar_config, $current_user;
 
if (is_admin($current_user))
{
	$module_menu[]=Array("index.php?module=acl_fields&action=EditAclFields&return_module=acl_fields&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateTeams");
	$module_menu[]=Array("index.php?module=acl_fields&action=index&return_module=acl_fields&return_action=DetailView", $mod_strings['LNK_LIST'],"Teams");
}
