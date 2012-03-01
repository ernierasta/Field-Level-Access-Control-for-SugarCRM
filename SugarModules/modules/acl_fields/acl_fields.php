<?PHP

class acl_fields extends Basic {
	var $new_schema = true;
	var $module_dir = 'acl_fields';
	var $object_name = 'acl_fields';
	var $table_name = 'acl_fields';
	var $importable = false;
		var $id;
		var $name;
		var $date_entered;
		var $date_modified;
		var $modified_user_id;
		var $modified_by_name;
		var $created_by;
		var $created_by_name;
		var $description;
		var $deleted;
		var $created_by_link;
		var $modified_user_link;
		var $assigned_user_id;
		var $assigned_user_name;
		var $assigned_user_link;
		var $category;
		var $aclaccess;
		var $team_id_c;
		var $role;
	


	function acl_fields()
	{	
		global $app_list_strings, $db, $moduleList;
		$app_list_strings['roles_list'] = array();
		$query = "SELECT id, name FROM acl_roles WHERE deleted=0 ORDER BY name";
		$res = $db->query($query);
		while ($row = $db->fetchByAssoc($res))
			$app_list_strings['roles_list'][$row['id']] = $row['name'];
		parent::Basic();
	}

	function bean_implements($interface){
		switch($interface){
			case 'ACL': return true;
		}
		return false;
}
		
}
?>
