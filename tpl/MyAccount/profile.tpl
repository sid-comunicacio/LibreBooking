{include file='globalheader.tpl' Validator=true}

<div class="page-profile">

    <div class="hidden col-xs-12 col-sm-8 col-sm-offset-2 alert alert-success" role="alert" id="profileUpdatedMessage">
        <span class="glyphicon glyphicon-ok-sign"></span> {translate key=YourProfileWasUpdated}
    </div>


    <div id="profile-box" class="default-box col-xs-12 col-sm-8 col-sm-offset-2">


        <form method="post" ajaxAction="{ProfileActions::Update}" id="form-profile"
              action="{$smarty.server.SCRIPT_NAME}"
              role="form"
              data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
              data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
              data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"
              data-bv-feedbackicons-required="glyphicon glyphicon-asterisk"
              data-bv-submitbuttons='button[type="submit"]'
              data-bv-onerror="enableButton"
              data-bv-onsuccess="enableButton"
              data-bv-live="enabled">

            <h1>{translate key=EditProfile}</h1>

            <div class="validationSummary alert alert-danger no-show" id="validationErrors">
                <ul>
                    {async_validator id="fname" key="FirstNameRequired"}
                    {async_validator id="lname" key="LastNameRequired"}
                    {async_validator id="username" key="UserNameRequired"}
                    {async_validator id="emailformat" key="ValidEmailRequired"}
                    {async_validator id="uniqueemail" key="UniqueEmailRequired"}
                    {async_validator id="uniqueusername" key="UniqueUsernameRequired"}
                    {async_validator id="phoneRequired" key="PhoneRequired"}
                    {async_validator id="positionRequired" key="PositionRequired"}
                    {async_validator id="organizationRequired" key="OrganizationRequired"}
                    {async_validator id="additionalattributes" key=""}
                </ul>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label class="reg" for="username">{translate key="Username"}</label>
                        {if $AllowUsernameChange}
                            {textbox name="USERNAME" value="Username" required="required"
                            data-bv-notempty="true" autofocus="autofocus"
                            data-bv-notempty-message="{translate key=UserNameRequired}"}
                        {else}
                            <span>{$Username}</span>
                            <input type="hidden" {formname key=USERNAME} value="{$Username}"/>
                        {/if}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label class="reg" for="email">{translate key="Email"}</label>
                            {textbox type="email" name="EMAIL" class="input" value="Email" required="required"
                            data-bv-notempty="true"
                            data-bv-notempty-message="{translate key=ValidEmailRequired}"
                            data-bv-emailaddress="true"
                            data-bv-emailaddress-message="{translate key=ValidEmailRequired}" }
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label class="reg" for="fname">{translate key="FirstName"}</label>
                        {if $AllowNameChange}
                            {textbox name="FIRST_NAME" class="input" value="FirstName" required="required"
                            data-bv-notempty="true"
                            data-bv-notempty-message="{translate key=FirstNameRequired}"}
                        {else}
                            <span>{$FirstName}</span>
                            <input type="hidden" {formname key=FIRST_NAME} value="{$FirstName}"/>
                        {/if}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label class="reg" for="lname">{translate key="LastName"}</label>
                        {if $AllowNameChange}
                            {textbox name="LAST_NAME" class="input" value="LastName" required="required" data-bv-notempty="true"
                            data-bv-notempty-message="{translate key=LastNameRequired}"}
                        {else}
                            <span>{$LastName}</span>
                            <input type="hidden" {formname key=LAST_NAME} value="{$LastName}"/>
                        {/if}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label class="reg" for="homepage">{translate key="DefaultPage"}</label>
                        <select {formname key='DEFAULT_HOMEPAGE'} id="homepage" class="form-control">
                            {html_options values=$HomepageValues output=$HomepageOutput selected=$Homepage}
                        </select>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label class="reg" for="timezoneDropDown">{translate key="Timezone"}</label>
                        <select {formname key='TIMEZONE'} class="form-control" id="timezoneDropDown">
                            {html_options values=$TimezoneValues output=$TimezoneOutput selected=$Timezone}
                        </select>
                    </div>
                </div>
            </div>

            {if $Attributes|default:array()|count > 1}
                {for $i=1 to $Attributes|default:array()|count-1}
                    {if $i%2==1}
                        <div class="row">
                    {/if}
                    <div class="col-xs-12 col-sm-6">
                        {control type="AttributeControl" attribute=$Attributes[$i]}
                    </div>
                    {if $i%2==0 || $i==$Attributes|default:array()|count-1}
                        </div>
                    {/if}
                {/for}
            {/if}

            <div>
                <button type="submit" class="update btn btn-primary col-xs-12" name="{Actions::SAVE}" id="btnUpdate">
                    {translate key='Update'}
                </button>
            </div>
            {csrf_token}
        </form>
    </div>
    {setfocus key='FIRST_NAME'}

    {include file="javascript-includes.tpl" Validator=true}
    {jsfile src="ajax-helpers.js"}
    {jsfile src="autocomplete.js"}
    {jsfile src="profile.js"}

    <script type="text/javascript">

        function enableButton() {
            $('#form-profile').find('button').removeAttr('disabled');
        }

        $(document).ready(function () {
            var profilePage = new Profile();
            profilePage.init();

            var profileForm = $('#form-profile');

            profileForm
                .on('init.field.bv', function (e, data) {
                    var $parent = data.element.parents('.form-group');
                    var $icon = $parent.find('.form-control-feedback[data-bv-icon-for="' + data.field + '"]');
                    var validators = data.bv.getOptions(data.field).validators;

                    if (validators.notEmpty) {
                        $icon.addClass('glyphicon glyphicon-asterisk').show();
                    }
                })
                .off('success.form.bv')
                .on('success.form.bv', function (e) {
                    e.preventDefault();
                });

            profileForm.bootstrapValidator();

            $('#txtOrganization').orgAutoComplete("ajax/autocomplete.php?type={AutoCompleteType::Organization}");
        });
    </script>

    <div id="wait-box" class="wait-box">
        <h3>{translate key=Working}</h3>
        {html_image src="reservation_submitting.gif"}
    </div>

</div>
{include file='globalfooter.tpl'}
