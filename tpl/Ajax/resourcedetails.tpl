<div id="resourceDetailsPopup">
    {assign var=h4Style value=""}
    {if !empty($color)}
        {assign var=h4Style value=" style=\"background-color:{$color};color:{$textColor};padding:5px 3px;\""}
    {/if}
    <div class="resourceNameTitle">
        <h4 {$h4Style}>{$resourceName}</h4>
        <a href="#" class="visible-sm-inline-block hideResourceDetailsPopup">{translate key=Close}</a>
        <div class="clearfix"></div>
    </div>
    {assign var=class value='col-xs-6'}

    {if $imageUrl neq ''}
        {assign var=class value='col-xs-8'}

        <div class="resourceImage col-xs-5">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <img src="{resource_image image=$imageUrl}" alt="{$resourceName|escape}" class="image" />
                </div>
                {foreach from=$images item=image}
                    <div class="item">
                        <img src="{resource_image image=$image}" alt="{$resourceName|escape}" class="image" />
                    </div>
                {/foreach}
            </div>
        </div>
    {/if}
    <div class="description {$class}">
        <span class="bold">{translate key=Description}</span>
        {if $description neq ''}
            {$description|html_entity_decode|url2link|nl2br}
        {else}
            {translate key=NoDescriptionLabel}
        {/if}
        <br/>
        <span class="bold">{translate key=Notes}</span>
        {if $notes neq ''}
            {$notes|html_entity_decode|url2link|nl2br}
        {else}
            {translate key=NoNotesLabel}
        {/if}
        <br/>
    </div>
    <div style="clearfix">&nbsp;</div>
</div>
