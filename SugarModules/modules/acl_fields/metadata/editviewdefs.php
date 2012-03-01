<?php
$module_name = 'acl_fields';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'role_id',
            'label' => 'LBL_ROLE',
		'type' => 'enum',
          ),
          1 => 
          array (
            'name' => 'category',
            'label' => 'LBL_CATEGORY',
		'type' => 'enum',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'aclaccess',
            'label' => 'LBL_ACLACCESS',
		'type' => 'enum',
          ),
        ),
      ),
    ),
  ),
);
?>
