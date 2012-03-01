<?php
function pre_install()
{
	require_once('include/utils.php');

	// Hook to check field level access
	check_logic_hook_file("", "after_retrieve",
		array(1, 'acl_fields', 'modules/acl_fields/fields_logic.php',
                                'acl_fields_logic', 'limit_views'));

	// Backup the original sugar templates
	copy("include/EditView/EditView.tpl","include/EditView/EditViewOriginal.tpl");
	copy("include/DetailView/DetailView.tpl","include/DetailView/DetailViewOriginal.tpl");
}
?>
