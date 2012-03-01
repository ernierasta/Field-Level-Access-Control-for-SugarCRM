<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/Dashlets/DashletGeneric.php');
require_once('modules/acl_fields/acl_fields.php');

class acl_fieldsDashlet extends DashletGeneric { 
    function acl_fieldsDashlet($id, $def = null) {
		global $current_user, $app_strings;
		require('modules/acl_fields/metadata/dashletviewdefs.php');

        parent::DashletGeneric($id, $def);

        if(empty($def['title'])) $this->title = translate('LBL_HOMEPAGE_TITLE', 'acl_fields');

        $this->searchFields = $dashletData['acl_fieldsDashlet']['searchFields'];
        $this->columns = $dashletData['acl_fieldsDashlet']['columns'];

        $this->seedBean = new acl_fields();        
    }
}
