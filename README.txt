Field Level Access

This module adds field level access control to SugarCRM CE.

Since it is a beta module these instructions assume you have a working knowledge
of the SugarCRM framework.

To use:
1) Install the zipped module
2) Go to Admin->Field Level Access (in the Users section) and add a couple of field level restrictions to your existing roles
	You have to select the role, the module and the level of access for each field
3) Run a quick Repair on the target module(s)
4) Open records in the target module and the fields in 2 will be hidden for users assigned the selected roles

Note that limitiations are cumalitive - ie the most restrictive will apply if a user has more than one role restricting the same field.


TODO:
Use ajax to select field once module is selected



Marnus van Niekerk
2010/04/05
