<?php
$module_name = 'acl_fields';
$listViewDefs [$module_name] = 
array (
  'ROLE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_ROLE',
    'default' => true,
  ),
  'CATEGORY' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CATEGORY',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ACLACCESS' => 
  array (
    'width' => '10%',
    'label' => 'LBL_ACLACCESS',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => false,
  ),
);
?>
