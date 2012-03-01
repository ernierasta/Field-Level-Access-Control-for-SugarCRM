{*
/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004 - 2008 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/
*}
{{include file=$headerTpl}}
{sugar_include include=$includes}

{{* Loop through all top level panels first *}}
{{counter name="panelCount" print=false start=0 assign="panelCount"}}
{{foreach name=section from=$sectionPanels key=label item=panel}}
{{assign var='panel_id' value=$panelCount}}
<div id='{{$label}}'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
{{* Print out the panel title if one exists*}}

{{* Check to see if the panel variable is an array, if not, we'll attempt an include with type param php *}}
{{* See function.sugar_include.php *}}
{{if !is_array($panel)}}
    {sugar_include type='php' file='{{$panel}}'}
{{else}}
	
	{{if !empty($label) && !is_int($label) && $label != 'DEFAULT'}}
	<h4 class="dataLabel">{sugar_translate label='{{$label}}' module='{{$module}}'}</h4><br>
	{{/if}}
	{{* Print out the table data *}}
	<table width='100%' border='0' cellspacing='{$gridline}' cellpadding='0'  class='tabDetailView'>
	
	{{if $panelCount == 0}}
	    {{* Render tag for VCR control if SHOW_VCR_CONTROL is true *}}
		{{if $SHOW_VCR_CONTROL}}
			{$PAGINATION}
		{{/if}}
		{{counter name="panelCount" print=false}}
	{{/if}}
	
	{{foreach name=rowIteration from=$panel key=row item=rowData}}
	<tr>
		{{assign var='columnsInRow' value=$rowData|@count}}
		{{assign var='columnsUsed' value=0}}
	    {{foreach name=colIteration from=$rowData key=col item=colData}}



		{{if $colData.field.name != ''}}
		{if $bean->field_defs.{{$colData.field.name}}.acl < 1}
		{{/if}}


			<td width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].label}}%' class='tabDetailViewDL' NOWRAP>
				{{if isset($colData.field.customLabel)}}
			       {{$colData.field.customLabel}}
				{{elseif isset($colData.field.label) && strpos($colData.field.label, '$')}}
				   {capture name="label" assign="label"}
				   {{$colData.field.label}}
				   {/capture}
			       {$label|strip_semicolon}:
				{{elseif isset($colData.field.label)}}
				   {capture name="label" assign="label"}
				   {sugar_translate label='{{$colData.field.label}}' module='{{$module}}'}
				   {/capture}
			       {$label|strip_semicolon}:
				{{elseif isset($fields[$colData.field.name])}}
				   {capture name="label" assign="label"}
				   {sugar_translate label='{{$fields[$colData.field.name].vname}}' module='{{$module}}'}
				   {/capture}
			       {$label|strip_semicolon}:
				{{else}}
				   &nbsp;
				{{/if}}
			</td>
			<td width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].field}}%' class='tabDetailViewDF' {{if $colData.colspan}}colspan='{{$colData.colspan}}'{{/if}}>
				{{if $colData.field.customCode || $colData.field.assign}}
					{counter name="panelFieldCount"}
					{{sugar_evalcolumn var=$colData.field colData=$colData}}
				{{elseif $fields[$colData.field.name] && !empty($colData.field.fields) }}
				    {{foreach from=$colData.field.fields item=subField}}
				        {{if $fields[$subField]}}
				        	{counter name="panelFieldCount"}
				            {{sugar_field parentFieldArray='fields' tabindex=$tabIndex vardef=$fields[$subField] displayType='detailView'}}&nbsp;
				        {{else}}
				        	{counter name="panelFieldCount"}
				            {{$subField}}
				        {{/if}}
				    {{/foreach}}					    		
				{{elseif $fields[$colData.field.name]}}
					{counter name="panelFieldCount"}
					{{sugar_field parentFieldArray='fields' vardef=$fields[$colData.field.name] displayType='detailView' displayParams=$colData.field.displayParams typeOverride=$colData.field.type}}
				{{/if}}
				&nbsp;
			</td>


		{{if $colData.field.name != ''}}
		{else}
			<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
		{/if}
		{{/if}}




		{{/foreach}}
	</tr>
	{{/foreach}}
	</table>
{{/if}}
</div>
{if $panelFieldCount == 0}

<script>document.getElementById("panel_{{$panel_id}}").style.display='none';</script>
{/if}
<p>
{{/foreach}}
{{include file=$footerTpl}}
