<?php
class acl_fields_logic
{
	function get_user_limits(&$bean, $event, $arguments=null)
	{
		global $db, $current_user, $mod_strings, $app_strings, $sugar_config;

		if ($bean->id != $current_user->id)
			return;


		if (isset($_SESSION['current_user_acl_fields']) && !$sugar_config['developerMode'])
			$current_user->acl_fields = $_SESSION['current_user_acl_fields'];
		else
		{
			$current_user->acl_fields = array();
			$query = "SELECT * FROM acl_roles_users LEFT JOIN acl_fields USING (role_id) WHERE acl_roles_users.deleted=0 AND acl_fields.deleted=0 AND user_id='".$current_user->id."' ORDER BY category, name";
			$res = $db->query($query);
			while ($row = $db->fetchByAssoc($res))
			{
				$module = $row['category'];
				$field  = $row['name'];
				$limit  = $row['aclaccess'];
				if (!isset($current_user->acl_fields[$module][$field]))
					$current_user->acl_fields[$module][$field] = $limit;
				else
					$current_user->acl_fields[$module][$field] = 
						($current_user->acl_fields[$module][$field] | $limit);
			}	
			$_SESSION['current_user_acl_fields'] = $current_user->acl_fields;
		}
	}

	function limit_views(&$bean, $event, $arguments=null)
	{
		global $current_user, $mod_strings, $app_strings;
		//if (empty($current_user->acl_fields))
			$this->get_user_limits($bean, $event);

		$view = $_REQUEST['action'];

		if (is_array($current_user->acl_fields[$bean->module_dir]))
			foreach ($current_user->acl_fields[$bean->module_dir] as $fieldname => $limit)
			{
				$vname = $bean->field_name_map[$fieldname]['vname'];
				if (  (eregi('detail',$view) && $limit > 1) ||
				     /* (eregi('list',$view)   && $limit > 0) ||
				      (eregi('index',$view)  && $limit > 0) || */
				      (eregi('edit',$view) && $limit > 0)   )
				{
					//unset($bean->field_name_map[$fieldname]);
					//unset($bean->field_defs[$fieldname]);
					$bean->field_defs[$fieldname][acl] = $limit;
					//$mod_strings[$vname] = '';
				}
			}
	}
}
?>
