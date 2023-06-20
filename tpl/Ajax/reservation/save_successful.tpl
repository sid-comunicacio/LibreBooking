<div id="{$divId|default:'reservation-created'}" class="reservationResponseMessage">
	<div id="reservation-response-image">
	{if $RequiresApproval}
		<span class="fa fa-flag fa-5x warning"></span>
	{else}
		<span class="fa fa-check fa-5x success"></span>
	{/if}
	</div>

	<div id="created-message" class="reservation-message">{translate key=$messageKey|default:"ReservationCreated"}</div>

	<div class="dates" style="max-height: 15em;display: block;overflow-y: auto;margin: 0.5em 0;">
		<span class="bold">{translate key=Dates}:</span>
		{foreach from=$Instances item=instance name=date_list}
			<span class="date">{format_date date=$instance->StartDate() timezone=$Timezone}{if !$smarty.foreach.date_list.last}, {/if}</span>
		{/foreach}
	</div>

	<div class="resources">
		<span class="bold">{translate key=Resources}:</span>
		{$total_value = 0}
		{foreach from=$Resources item=resource name=resource_list}
			<span class="resource">{$resource->GetName()}{if !$smarty.foreach.resource_list.last}, {/if}</span>
			{$total_value = $total_value + $resource->GetAttributeValue(9)}
		{/foreach}
	</div>
	
	<div id ="value_of_resources" class="reservation-message">{translate key=ValueOfResources}: {$total_value} {translate key=Currency}</div>
	
	{if $RequiresApproval}
		<div id="approval-message">{translate key=ReservationRequiresApproval}</div>
	{/if}

	<input type="button" id="btnSaveSuccessful" value="{translate key='Close'}" class="btn btn-success" />
</div>
