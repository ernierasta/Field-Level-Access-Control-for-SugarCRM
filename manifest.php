<?php
	$manifest = array (
		 'acceptable_sugar_versions' => 
		  array (
	     	
		  ),
		  'acceptable_sugar_flavors' =>
		  array(
		  	'CE',
		  ),
		  'readme'=>'README.txt',
		  'key'=>'acl',
		  'author' => 'Marnus_van_Niekerk',
		  'description' => 'Package to add field level access control to SugarCRM CE',
		  'icon' => '',
		  'is_uninstallable' => true,
		  'name' => 'FieldLevelAccess',
		  'published_date' => '2012-03-02 20:49:00',
		  'type' => 'module',
		  'version' => '0.73',
		  'remove_tables' => 'prompt',
		  );
$installdefs = array (
  'id' => 'FieldLevelAccess',
  'beans' => 
  array (
    0 => 
    array (
      'module' => 'acl_fields',
      'class' => 'acl_fields',
      'path' => 'modules/acl_fields/acl_fields.php',
      'tab' => false,
    ),
  ),
  'layoutdefs' => 
  array (
  ),
  'relationships' => 
  array (
  ),
  'image_dir' => '<basepath>/icons',
  'administration' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/administration/FieldsACLAdmin.menu.php',
    ),
  ),
  'copy' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/modules/acl_fields',
      'to' => 'modules/acl_fields',
    ),
    1 => 
    array (
      'from' => 'include/EditView/EditView.tpl',
      'to' => 'include/EditView/EditView.tpl.orig',
    ),
    2 => 
    array (
      'from' => '<basepath>/SugarModules/custom/include/EditView/EditView.tpl',
      'to' => 'include/EditView/EditView.tpl',
    ),
    3 => 
    array (
      'from' => '<basepath>/SugarModules/custom/include/EditView/EditView.tpl',
      'to' => 'custom/include/EditView/EditView.tpl',
    ),
    4 => 
    array (
      'from' => '<basepath>/SugarModules/custom/include/EditView/EditView2.php',
      'to' => 'custom/include/EditView/EditView2.php',
    ),
    5 => 
    array (
      'from' => 'include/DetailView/DetailView.tpl',
      'to' => 'include/DetailView/DetailView.tpl.orig',
    ),
    6 => 
    array (
      'from' => '<basepath>/SugarModules/custom/include/DetailView/DetailView.tpl',
      'to' => 'include/DetailView/DetailView.tpl',
    ),
    7 => 
    array (
      'from' => '<basepath>/SugarModules/custom/include/DetailView/DetailView.tpl',
      'to' => 'custom/include/DetailView/DetailView.tpl',
    ),
    8 => 
    array (
      'from' => '<basepath>/SugarModules/custom/modules/AOS_Products/views/view.detail.php',
      'to' => 'custom/modules/AOS_Products/views/view.detail.php',
    ),
    9 => 
    array (
      'from' => '<basepath>/SugarModules/custom/modules/AOS_Products/views/DetailView.tpl',
      'to' => 'custom/modules/AOS_Products/views/DetailView.tpl',
    ),
    10 => 
    array (
      'from' => 'include/ListView/ListViewGeneric.tpl',
      'to' => 'include/ListView/ListViewGeneric.tpl.orig',
    ),
    11 => 
    array (
      'from' => '<basepath>/SugarModules/custom/include/ListView/ListViewGeneric.tpl',
      'to' => 'include/ListView/ListViewGeneric.tpl',
    ),
    12 => 
    array (
      'from' => '<basepath>/SugarModules/custom/include/ListView/ListViewGeneric.tpl',
      'to' => 'custom/include/ListView/ListViewGeneric.tpl',
    ),
    13 => 
    array (
      'from' => '<basepath>/SugarModules/custom/include/ListView/ListViewFacade.php',
      'to' => 'custom/include/ListView/ListViewFacade.php',
    ),
    14 => 
    array (
      'from' => 'include/ListView/ListViewData.php',
      'to' => 'include/ListView/ListViewData.php.orig',
    ),
    15 => 
    array (
      'from' => '<basepath>/SugarModules/custom/include/ListView/ListViewData.php',
      'to' => 'include/ListView/ListViewData.php',
    ),
    16 => 
    array (
      'from' => '<basepath>/SugarModules/custom/include/ListView/ListViewData.php',
      'to' => 'custom/include/ListView/ListViewData.php',
    ),
  ),
  'language' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/language/application/en_us.lang.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),
    1 => 
    array (
	'from'=> '<basepath>/language/en_us.FieldsACLAdmin.php',
	'to_module'=> 'Administration',
	'language'=>'en_us'
    ),
  ),
);
