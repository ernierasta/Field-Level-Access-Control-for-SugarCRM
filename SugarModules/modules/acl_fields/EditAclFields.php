<?php
	global $app_list_strings, $db, $beanFiles, $beanList;

	require_once "include/Sugar_Smarty.php";

	if(isset($_REQUEST['role_name']))
	{
		// we were passed a role name
		foreach ($app_list_strings['roles_list'] as $role_id => $role_name)
			if ($role_name == $_REQUEST['role_name'])
				$_REQUEST['role'] = $role_id;
	}

	$smarty = new Sugar_Smarty();
	
	asort($app_list_strings['moduleList']);

	if (isset($_REQUEST['category']))
	{
		$category = $_REQUEST['category'];
		$role = $_REQUEST['role'];
		$beanName = $beanList[$category];
		require_once $beanFiles[$beanName];

		$focus = new $beanName();

		// Save new values if needed
		if (isset($_REQUEST['update']))
		{
			foreach ($focus->field_name_map as $field_name => $field)
			{
				$inputname = 'new_' . $field['name'];
				$prevname = 'prev_' . $field['name'];
				$idname = 'id_' . $field['name'];

				$acl_fields = new acl_fields();
				if (!empty($_REQUEST[$idname]))
					$acl_fields->retrieve($_REQUEST[$idname]);

				if ($_REQUEST[$inputname] != $_REQUEST[$prevname])
				{
					$acl_fields->name = $field['name'];
					$acl_fields->category = $category;
					$acl_fields->role_id = $role;
					$acl_fields->aclaccess = $_REQUEST[$inputname];
					$acl_fields->save();
				}
			}
			$smarty->assign('updated','- Updated!');
		}

		// Get existing values
		$values = array();
		$query = sprintf("SELECT * FROM acl_fields WHERE category='%s' AND role_id='%s' AND deleted=0 ORDER BY name", $_REQUEST['category'],$_REQUEST['role']);
		$res = $db->query($query);
		while ($row = $db->fetchByAssoc($res))
		{
			$values[$row['name']] = $row['aclaccess'];
			$ids[$row['name']] = $row['id'];
		}

		$i = 0;
		$acl_fields = array();
		foreach ($focus->field_name_map as $field)
		{
			$lbl = $field['vname'];
			if (!empty($lbl) && !ereg("subpanel",$field['name']))
			{
				$acl_fields[$i]['field'] = $field['name'];
				$acl_fields[$i]['label'] = translate($lbl,$category);
				$acl_fields[$i]['inputname'] = 'new_' . $field['name'];
				$acl_fields[$i]['prevname'] = 'prev_' . $field['name'];
				$acl_fields[$i]['idname'] = 'id_' . $field['name'];
				$acl_fields[$i]['value'] = $values[$field['name']];
				$acl_fields[$i]['id'] = $ids[$field['name']];
			}

			$i++;
		}
	}

	$smarty->assign('roles_list',$app_list_strings['roles_list']);
	$smarty->assign('moduleList',$app_list_strings['moduleList']);
	$smarty->assign('role',$_REQUEST['role']);
	$smarty->assign('roleName',$app_list_strings['roles_list'][$_REQUEST['role']]);
	$smarty->assign('category',$_REQUEST['category']);
	$smarty->assign('moduleName',$app_list_strings['moduleList'][$_REQUEST['category']]);
	$smarty->assign('fields_access_list',$app_list_strings['fields_access_list']);
	$smarty->assign('acl_fields',$acl_fields);

	$smarty->display("modules/acl_fields/templates/EditAclFields.tpl.html");
