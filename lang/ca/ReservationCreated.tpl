Benvolguda / benvolgut:
<br/>
<br/>
La teva petició de reserva ha estat acceptada i s’ha tramitat de manera correcta.
<br/>
<br/>
Cordialment,
<br/>
<br/>
Laboratoris Audiovisuals
<br/>
<br/>

<p><strong>Detalls de la petici&oacute;:</strong></p>

<p>
	<strong>Comen&ccedil;a:</strong> {formatdate date=$StartDate key=reservation_email}<br/>
	<strong>Finalitza:</strong> {formatdate date=$EndDate key=reservation_email}<br/>
	<strong>T&iacute;tol:</strong> {$Title}<br/>
	<strong>Descripci&oacute;:</strong> {$Description|nl2br}
	{if $Attributes|default:array()|count > 0}
		<br/>
	    {foreach from=$Attributes item=attribute}
			<div>{control type="AttributeControl" attribute=$attribute readonly=true}</div>
	    {/foreach}
	{/if}
</p>

<p>
{if $ResourceNames|default:array()|count > 1}
    <strong>Recursos demanats ({$ResourceNames|default:array()|count}):</strong> <br />
    {foreach from=$ResourceNames item=resourceName}
        {$resourceName}<br/>
    {/foreach}
{else}
    <strong>Recurs demanat:</strong> {$ResourceName}<br/>
{/if}
</p>

{if $ResourceImage}
    <div class="resource-image"><img alt="{$ResourceName|escape}" src="{$ScriptUrl}/{$ResourceImage}"/></div>
{/if}

{if $RequiresApproval}
	<p>* Els recursos demanats requereixen l'aprovaci&oacute; per part dels Laboratoris. Aquesta petici&oacute; restar&agrave; pendent fins que sigui aprovada/rebutjada. *</p>
{/if}

{if $CheckInEnabled}
	<p>
    Almenys un dels recursos demanats requereixen que feu el registre d'entrada i sortida de la vostra reserva.
    {if $AutoReleaseMinutes != null}
        Aquesta reserva ser&agrave; cancel&middot;lada a no ser que efectueu el registre d'entrada en {$AutoReleaseMinutes} minuts despr&eacute;s de l'inici programat.
    {/if}
	</p>
{/if}

{if count($RepeatRanges) gt 0}
    <br/>
    <strong>La reserva s'efectua en les seg&uuml;ents dates ({$RepeatRanges|default:array()|count}):</strong>
    <br/>
	{foreach from=$RepeatRanges item=date name=dates}
	    {formatdate date=$date->GetBegin()}
	    {if !$date->IsSameDate()} - {formatdate date=$date->GetEnd()}{/if}
	    <br/>
	{/foreach}
{/if}

{if $Participants|default:array()|count >0}
    <br />
    <strong>Participants ({$Participants|default:array()|count + $ParticipatingGuests|default:array()|count}):</strong>
    <br />
    {foreach from=$Participants item=user}
        {$user->FullName()}
        <br/>
    {/foreach}
{/if}

{if $ParticipatingGuests|default:array()|count >0}
    {foreach from=$ParticipatingGuests item=email}
        {$email}
        <br/>
    {/foreach}
{/if}

{if $Invitees|default:array()|count >0}
    <br />
    <strong>Convidats ({$Invitees|default:array()|count + $InvitedGuests|default:array()|count}):</strong>
    <br />
    {foreach from=$Invitees item=user}
        {$user->FullName()}
        <br/>
    {/foreach}
{/if}

{if $InvitedGuests|default:array()|count >0}
    {foreach from=$InvitedGuests item=email}
        {$email}
        <br/>
    {/foreach}
{/if}

{if $Accessories|default:array()|count > 0}
    <br />
       <strong>Accessoris ({$Accessories|default:array()|count}):</strong>
       <br />
    {foreach from=$Accessories item=accessory}
        ({$accessory->QuantityReserved}) {$accessory->Name}
        <br/>
    {/foreach}
{/if}

{if $CreditsCurrent > 0}
	<br/>
	Aquesta reserva t&eacute; un cost de {$CreditsCurrent} cr&egrave;dits.
    {if $CreditsCurrent != $CreditsTotal}
		Aquesta s&egrave; complerta de reserves costa {$CreditsTotal} cr&egrave;dits.
    {/if}
{/if}


{if !empty($CreatedBy)}
	<p><strong>Creada per:</strong> {$CreatedBy}</p>
{/if}

{if !empty($ApprovedBy)}
	<p><strong>Aprovada per:</strong> {$ApprovedBy}</p>
{/if}

<p><strong>N&uacute;mero de refer&egrave;ncia:</strong> {$ReferenceNumber}</p>

{if !$Deleted}
	<a href="{$ScriptUrl}/{$ReservationUrl}">Veure aquesta reserva</a>
	|
	<a href="{$ScriptUrl}/{$ICalUrl}">Afegir al Calendari</a>
	|
	<a href="{$GoogleCalendarUrl}" target="_blank" rel="nofollow">Afegir a Google Calendar</a>
	|
{/if}
<a href="{$ScriptUrl}">Inicia sessi&oacute; a {$AppTitle}</a>

