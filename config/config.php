<?php

mysqli_report(MYSQLI_REPORT_OFF);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

/**
 * Application configuration
 */
$conf['settings']['app.title'] = getenv('LIBREBOOKING_SETTINGS_APP_TITLE');                // application title
$conf['settings']['default.timezone'] = getenv('LIBREBOOKING_SETTINGS_DEFAULT_TIMEZONE');      // look up here http://php.net/manual/en/timezones.php
$conf['settings']['allow.self.registration'] = getenv('LIBREBOOKING_SETTINGS_ALLOW_SELF_REGISTRATION');         	// if users can register themselves
$conf['settings']['admin.email'] = getenv('LIBREBOOKING_SETTINGS_ADMIN_EMAIL');         // email address of admin user
$conf['settings']['admin.email.name'] = getenv('LIBREBOOKING_SETTINGS_ADMIN_EMAIL_NAME');	// name to be used in From: field when sending automatic emails
$conf['settings']['company.name'] = getenv('LIBREBOOKING_SETTINGS_COMPANY_NAME');                         // name of company, if applicable
$conf['settings']['company.url'] = getenv('LIBREBOOKING_SETTINGS_COMPANY_URL');                          // URL of company, if applicable
$conf['settings']['default.page.size'] = getenv('LIBREBOOKING_SETTINGS_DEFAULT_PAGE_SIZE');                  // number of records per page
$conf['settings']['enable.email'] = getenv('LIBREBOOKING_SETTINGS_ENABLE_EMAIL');                     // global configuration to enable if any emails will be sent
$conf['settings']['default.language'] = getenv('LIBREBOOKING_SETTINGS_DEFAULT_LANGUAGE');                // find your language in the lang directory
$conf['settings']['script.url'] = getenv('LIBREBOOKING_SETTINGS_SCRIPT_URL');   	// public URL to the Web directory of this instance. this is the URL that appears when you are logging in. leave http: or https: off to auto-detect
$conf['settings']['image.upload.directory'] = getenv('LIBREBOOKING_SETTINGS_IMAGE_UPLOAD_DIRECTORY'); // full or relative path to where images will be stored
$conf['settings']['image.upload.url'] = getenv('LIBREBOOKING_SETTINGS_IMAGE_UPLOAD_URL');       // full or relative path to show uploaded images from
$conf['settings']['cache.templates'] = getenv('LIBREBOOKING_SETTINGS_CACHE_TEMPLATES');                  // true recommended, caching template files helps web pages render faster
$conf['settings']['use.local.js.libs'] = getenv('LIBREBOOKING_SETTINGS_USE_LOCAL_JS_LIBS');                // false recommended, delivers jQuery from Google CDN, uses less bandwidth
$conf['settings']['registration.captcha.enabled'] = getenv('LIBREBOOKING_SETTINGS_REGISTRATION_CAPTCHA_ENABLED');     // recommended. unless using recaptcha this requires php_gd2 enabled in php.ini
$conf['settings']['registration.require.email.activation'] = getenv('LIBREBOOKING_SETTINGS_REGISTRATION_REQUIRE_EMAIL_ACTIVATION');		// requires enable.email = true
$conf['settings']['registration.auto.subscribe.email'] = getenv('LIBREBOOKING_SETTINGS_REGISTRATION_AUTO_SUBSCRIBE_EMAIL');			// requires enable.email = true
$conf['settings']['registration.notify.admin'] = getenv('LIBREBOOKING_SETTINGS_REGISTRATION_NOTIFY_ADMIN');		// whether the registration of a new user sends an email to the admin (ala phpScheduleIt 1.2)
$conf['settings']['inactivity.timeout'] = getenv('LIBREBOOKING_SETTINGS_INACTIVITY_TIMEOUT');     			// minutes before the user is automatically logged out
$conf['settings']['name.format'] = getenv('LIBREBOOKING_SETTINGS_NAME_FORMAT');     		// display format when showing user names
$conf['settings']['css.extension.file'] = getenv('LIBREBOOKING_SETTINGS_CSS_EXTENSION_FILE'); 			      	// full or relative url to an additional css file to include. this can be used to override the default style
$conf['settings']['disable.password.reset'] = getenv('LIBREBOOKING_SETTINGS_DISABLE_PASSWORD_RESET'); 	      	// if the password reset functionality should be disabled
$conf['settings']['home.url'] = getenv('LIBREBOOKING_SETTINGS_HOME_URL'); 	      					// the url to open when the logo is clicked
$conf['settings']['logout.url'] = getenv('LIBREBOOKING_SETTINGS_LOGOUT_URL'); 	      					// the url to be directed to after logging out
$conf['settings']['default.homepage'] = getenv('LIBREBOOKING_SETTINGS_DEFAULT_HOMEPAGE'); 	      			// the default homepage to use when new users register (1 = Dashboard, 2 = Schedule, 3 = My Calendar, 4 = Resource Calendar)

$conf['settings']['schedule']['use.per.user.colors'] = getenv('LIBREBOOKING_SETTINGS_SCHEDULE_USE_PER_USER_COLORS'); 		// color reservations by user
$conf['settings']['schedule']['show.inaccessible.resources'] = getenv('LIBREBOOKING_SETTINGS_SCHEDULE_SHOW_INACCESSIBLE_RESOURCES');  // whether or not resources that are inaccessible to the user are visible
$conf['settings']['schedule']['reservation.label'] = getenv('LIBREBOOKING_SETTINGS_SCHEDULE_RESERVATION_LABEL');    		// format for what to display on the reservation slot label.  Available properties are: {name}, {title}, {description}, {email}, {phone}, {organization}, {position}, {startdate}, {enddate} {resourcename} {participants} {invitees} {reservationAttributes}. Custom attributes can be added using att with the attribute id. For example {att1}
$conf['settings']['schedule']['hide.blocked.periods'] = getenv('LIBREBOOKING_SETTINGS_SCHEDULE_HIDE_BLOCKED_PERIODS');    	// if blocked periods should be hidden or shown
$conf['settings']['schedule']['update.highlight.minutes'] = getenv('LIBREBOOKING_SETTINGS_SCHEDULE_UPDATE_HIGHLIGHT_MINUTES');    // if set, will show reservations as 'updated' for a certain amount of time
$conf['settings']['schedule']['show.week.numbers'] = getenv('LIBREBOOKING_SETTINGS_SCHEDULE_SHOW_WEEK_NUMBERS');
/**
 * ical integration configuration
 */
$conf['settings']['ics']['subscription.key'] = getenv('LIBREBOOKING_SETTINGS_ICS_SUBSCRIPTION_KEY');              // must be set to allow webcal subscriptions
$conf['settings']['ics']['future.days'] = getenv('LIBREBOOKING_SETTINGS_ICS_FUTURE_DAYS');
$conf['settings']['ics']['past.days'] = getenv('LIBREBOOKING_SETTINGS_ICS_PAST_DAYS');
/**
 * Privacy configuration
 */
$conf['settings']['privacy']['view.schedules'] = getenv('LIBREBOOKING_SETTINGS_PRIVACY_VIEW_SCHEDULES');       			// if unauthenticated users can view schedules
$conf['settings']['privacy']['view.reservations'] = getenv('LIBREBOOKING_SETTINGS_PRIVACY_VIEW_RESERVATIONS');    			// if unauthenticated users can view reservations
$conf['settings']['privacy']['hide.user.details'] = getenv('LIBREBOOKING_SETTINGS_PRIVACY_HIDE_USER_DETAILS');    			// if personal user details should be displayed to non-administrators
$conf['settings']['privacy']['hide.reservation.details'] = getenv('LIBREBOOKING_SETTINGS_PRIVACY_HIDE_RESERVATION_DETAILS');			// if reservation details should be displayed to non-administrators. options are true, false, current, future, past
$conf['settings']['privacy']['allow.guest.reservations'] = getenv('LIBREBOOKING_SETTINGS_PRIVACY_ALLOW_GUEST_RESERVATIONS');			// if reservations can be made by users without a Booked account, if true this overrides schedule and resource visibility
/**
 * Reservation specific configuration
 */
$conf['settings']['reservation']['start.time.constraint'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_START_TIME_CONSTRAINT');		// when reservations can be created or edited. options are future, current, none
$conf['settings']['reservation']['updates.require.approval'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_UPDATES_REQUIRE_APPROVAL');		// if updates to previously approved reservations require approval again
$conf['settings']['reservation']['prevent.participation'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_PREVENT_PARTICIPATION');		// if participation and invitation options should be removed
$conf['settings']['reservation']['prevent.recurrence'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_PREVENT_RECURRENCE');			// if recurring reservations are disabled for non-administrators
$conf['settings']['reservation']['enable.reminders'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_ENABLE_REMINDERS');				// if reminders are enabled. this requires email to be enabled and the reminder job to be configured
$conf['settings']['reservation']['allow.guest.participation'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_ALLOW_GUEST_PARTICIPATION');
$conf['settings']['reservation']['allow.wait.list'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_ALLOW_WAIT_LIST');
$conf['settings']['reservation']['checkin.minutes.prior'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_CHECKIN_MINUTES_PRIOR');
$conf['settings']['reservation']['default.start.reminder'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_DEFAULT_START_REMINDER');			// the default start reservation reminder. format is ## interval. for example, 10 minutes, 2 hours, 6 days.
$conf['settings']['reservation']['default.end.reminder'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_DEFAULT_END_REMINDER');				// the default end reservation reminder. format is ## interval. for example, 10 minutes, 2 hours, 6 days.
$conf['settings']['reservation']['title.required'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_TITLE_REQUIRED');
$conf['settings']['reservation']['description.required'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_DESCRIPTION_REQUIRED');
$conf['settings']['reservation']['checkin.admin.only'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_CHECKIN_ADMIN_ONLY');			// restrict check-in to administrators only
$conf['settings']['reservation']['checkout.admin.only'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_CHECKOUT_ADMIN_ONLY');			// restrict check-out to administrators only
/**
 * Email notification configuration
 */
$conf['settings']['reservation.notify']['resource.admin.add'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_NOTIFY_RESOURCE_ADMIN_ADD');
$conf['settings']['reservation.notify']['resource.admin.update'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_NOTIFY_RESOURCE_ADMIN_UPDATE');
$conf['settings']['reservation.notify']['resource.admin.delete'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_NOTIFY_RESOURCE_ADMIN_DELETE');
$conf['settings']['reservation.notify']['resource.admin.approval'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_NOTIFY_RESOURCE_ADMIN_APPROVAL');
$conf['settings']['reservation.notify']['application.admin.add'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_NOTIFY_APPLICATION_ADMIN_ADD');
$conf['settings']['reservation.notify']['application.admin.update'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_NOTIFY_APPLICATION_ADMIN_UPDATE');
$conf['settings']['reservation.notify']['application.admin.delete'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_NOTIFY_APPLICATION_ADMIN_DELETE');
$conf['settings']['reservation.notify']['application.admin.approval'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_NOTIFY_APPLICATION_ADMIN_APPROVAL');
$conf['settings']['reservation.notify']['group.admin.add'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_NOTIFY_GROUP_ADMIN_ADD');
$conf['settings']['reservation.notify']['group.admin.update'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_NOTIFY_GROUP_ADMIN_UPDATE');
$conf['settings']['reservation.notify']['group.admin.delete'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_NOTIFY_GROUP_ADMIN_DELETE');
$conf['settings']['reservation.notify']['group.admin.approval'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_NOTIFY_GROUP_ADMIN_APPROVAL');
/**
 * File upload configuration
 */
$conf['settings']['uploads']['enable.reservation.attachments'] = getenv('LIBREBOOKING_SETTINGS_UPLOADS_ENABLE_RESERVATION_ATTACHMENTS'); 	// if reservation attachments can be uploaded
$conf['settings']['uploads']['reservation.attachment.path'] = getenv('LIBREBOOKING_SETTINGS_UPLOADS_RESERVATION_ATTACHMENT_PATH'); 	// full or relative (to the root of your installation) filesystem path to store reservation attachments
$conf['settings']['uploads']['reservation.attachment.extensions'] = getenv('LIBREBOOKING_SETTINGS_UPLOADS_RESERVATION_ATTACHMENT_EXTENSIONS'); 	// comma separated list of file extensions that users are allowed to attach. leave empty to allow all extensions
/**
 * Database configuration
 */
$conf['settings']['database']['type'] = getenv('LIBREBOOKING_SETTINGS_DATABASE_TYPE');
$conf['settings']['database']['user'] = getenv('LIBREBOOKING_SETTINGS_DATABASE_USER');        // database user with permission to the booked database
$conf['settings']['database']['password'] = getenv('LIBREBOOKING_SETTINGS_DATABASE_PASSWORD');
$conf['settings']['database']['hostspec'] = getenv('LIBREBOOKING_SETTINGS_DATABASE_HOSTSPEC');        // ip, dns or named pipe
$conf['settings']['database']['name'] = getenv('LIBREBOOKING_SETTINGS_DATABASE_NAME');
/**
 * Mail server configuration
 */
$conf['settings']['phpmailer']['mailer'] = getenv('LIBREBOOKING_SETTINGS_PHPMAILER_MAILER');              // options are 'mail', 'smtp' or 'sendmail'
$conf['settings']['phpmailer']['smtp.host'] = getenv('LIBREBOOKING_SETTINGS_PHPMAILER_SMTP_HOST');  //'smtp.gmail.com';
$conf['settings']['phpmailer']['smtp.port'] = getenv('LIBREBOOKING_SETTINGS_PHPMAILER_SMTP_PORT');
$conf['settings']['phpmailer']['smtp.secure'] = getenv('LIBREBOOKING_SETTINGS_PHPMAILER_SMTP_SECURE');             // options are '', 'ssl' or 'tls'
$conf['settings']['phpmailer']['smtp.auth'] = getenv('LIBREBOOKING_SETTINGS_PHPMAILER_SMTP_AUTH');           // options are 'true' or 'false'
$conf['settings']['phpmailer']['smtp.username'] = getenv('LIBREBOOKING_SETTINGS_PHPMAILER_SMTP_USERNAME');
$conf['settings']['phpmailer']['smtp.password'] = getenv('LIBREBOOKING_SETTINGS_PHPMAILER_SMTP_PASSWORD');
$conf['settings']['phpmailer']['sendmail.path'] = getenv('LIBREBOOKING_SETTINGS_PHPMAILER_SENDMAIL_PATH');
$conf['settings']['phpmailer']['smtp.debug'] = getenv('LIBREBOOKING_SETTINGS_PHPMAILER_SMTP_DEBUG');
/**
 * Plugin configuration.  For more on plugins, see readme_installation.html
 */
$conf['settings']['plugins']['Authentication'] = getenv('LIBREBOOKING_SETTINGS_PLUGINS_AUTHENTICATION');
$conf['settings']['plugins']['Authorization'] = getenv('LIBREBOOKING_SETTINGS_PLUGINS_AUTHORIZATION');
$conf['settings']['plugins']['Permission'] = getenv('LIBREBOOKING_SETTINGS_PLUGINS_PERMISSION');
$conf['settings']['plugins']['PostRegistration'] = getenv('LIBREBOOKING_SETTINGS_PLUGINS_POSTREGISTRATION');
$conf['settings']['plugins']['PreReservation'] = getenv('LIBREBOOKING_SETTINGS_PLUGINS_PRERESERVATION');
$conf['settings']['plugins']['PostReservation'] = getenv('LIBREBOOKING_SETTINGS_PLUGINS_POSTRESERVATION');
/**
 * Installation settings
 */
$conf['settings']['install.password'] = getenv('LIBREBOOKING_SETTINGS_INSTALL_PASSWORD');
/**
 * Pages
 */
$conf['settings']['pages']['enable.configuration'] = getenv('LIBREBOOKING_SETTINGS_PAGES_ENABLE_CONFIGURATION');
/**
 * API
 */
$conf['settings']['api']['enabled'] = getenv('LIBREBOOKING_SETTINGS_API_ENABLED');
$conf['settings']['api']['allow.self.registration'] = getenv('LIBREBOOKING_SETTINGS_API_ALLOW_SELF_REGISTRATION');
/**
 * ReCaptcha
 */
$conf['settings']['recaptcha']['enabled'] = getenv('LIBREBOOKING_SETTINGS_RECAPTCHA_ENABLED');
$conf['settings']['recaptcha']['public.key'] = getenv('LIBREBOOKING_SETTINGS_RECAPTCHA_PUBLIC_KEY');
$conf['settings']['recaptcha']['private.key'] = getenv('LIBREBOOKING_SETTINGS_RECAPTCHA_PRIVATE_KEY');
/**
 * Email
 */
$conf['settings']['email']['default.from.address'] = getenv('LIBREBOOKING_SETTINGS_EMAIL_DEFAULT_FROM_ADDRESS');
$conf['settings']['email']['default.from.name'] = getenv('LIBREBOOKING_SETTINGS_EMAIL_DEFAULT_FROM_NAME');
/**
 * Reports
 */
$conf['settings']['reports']['allow.all.users'] = getenv('LIBREBOOKING_SETTINGS_REPORTS_ALLOW_ALL_USERS');
/**
 * Account Password Rules
 */
$conf['settings']['password']['minimum.letters'] = getenv('LIBREBOOKING_SETTINGS_PASSWORD_MINIMUM_LETTERS');
$conf['settings']['password']['minimum.numbers'] = getenv('LIBREBOOKING_SETTINGS_PASSWORD_MINIMUM_NUMBERS');
$conf['settings']['password']['upper.and.lower'] = getenv('LIBREBOOKING_SETTINGS_PASSWORD_UPPER_AND_LOWER');
/**
 * Label display settings
 */
$conf['settings']['reservation.labels']['ics.summary'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_LABELS_ICS_SUMMARY');
$conf['settings']['reservation.labels']['ics.my.summary'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_LABELS_ICS_MY_SUMMARY');
$conf['settings']['reservation.labels']['rss.description'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_LABELS_RSS_DESCRIPTION');
$conf['settings']['reservation.labels']['my.calendar'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_LABELS_MY_CALENDAR');
$conf['settings']['reservation.labels']['resource.calendar'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_LABELS_RESOURCE_CALENDAR');
$conf['settings']['reservation.labels']['reservation.popup'] = getenv('LIBREBOOKING_SETTINGS_RESERVATION_LABELS_RESERVATION_POPUP'); // Format for what to display in reservation popups. Possible values: {name} {dates} {title} {resources} {participants} {accessories} {description} {attributes} {pending} {duration}. Custom attributes can be added using att with the attribute id. For example {att1}
/**
 * Security header settings
 */
$conf['settings']['security']['security.headers'] = getenv('LIBREBOOKING_SETTINGS_SECURITY_SECURITY_HEADERS'); // Enable the following options
$conf['settings']['security']['security.strict-transport'] = getenv('LIBREBOOKING_SETTINGS_SECURITY_SECURITY_STRICT_TRANSPORT');
$conf['settings']['security']['security.x-frame'] = getenv('LIBREBOOKING_SETTINGS_SECURITY_SECURITY_X_FRAME');
$conf['settings']['security']['security.x-xss'] = getenv('LIBREBOOKING_SETTINGS_SECURITY_SECURITY_X_XSS');
$conf['settings']['security']['security.x-content-type'] = getenv('LIBREBOOKING_SETTINGS_SECURITY_SECURITY_X_CONTENT_TYPE');
$conf['settings']['security']['security.content-security-policy'] = getenv('LIBREBOOKING_SETTINGS_SECURITY_SECURITY_CONTENT_SECURITY_POLICY'); // Requires careful tuning (know what your doing)
/**
 * Google Analytics settings
 */
$conf['settings']['google.analytics']['tracking.id'] = getenv('LIBREBOOKING_SETTINGS_GOOGLE_ANALYTICS_TRACKING_ID'); // if set, Google Analytics tracking code will be added to every page in Booked

$conf['settings']['authentication']['allow.facebook.login'] = getenv('LIBREBOOKING_SETTINGS_AUTHENTICATION_ALLOW_FACEBOOK_LOGIN');
$conf['settings']['authentication']['allow.google.login'] = getenv('LIBREBOOKING_SETTINGS_AUTHENTICATION_ALLOW_GOOGLE_LOGIN');
$conf['settings']['authentication']['required.email.domains'] = getenv('LIBREBOOKING_SETTINGS_AUTHENTICATION_REQUIRED_EMAIL_DOMAINS');
$conf['settings']['authentication']['hide.booked.login.prompt'] = getenv('LIBREBOOKING_SETTINGS_AUTHENTICATION_HIDE_LIBREBOOKING_LOGIN_PROMPT');
$conf['settings']['authentication']['captcha.on.login'] = getenv('LIBREBOOKING_SETTINGS_AUTHENTICATION_CAPTCHA_ON_LOGIN');
/**
 * Credits
 */
$conf['settings']['credits']['enabled'] = getenv('LIBREBOOKING_SETTINGS_CREDITS_ENABLED');
$conf['settings']['credits']['allow.purchase'] = getenv('LIBREBOOKING_SETTINGS_CREDITS_ALLOW_PURCHASE');
/**
 * Slack integration
 */
$conf['settings']['slack']['token'] = getenv('LIBREBOOKING_SETTINGS_SLACK_TOKEN');
/**
 * Tablet view
 */
$conf['settings']['tablet.view']['allow.guest.reservations'] = getenv('LIBREBOOKING_SETTINGS_TABLET_VIEW_ALLOW_GUEST_RESERVATIONS');
$conf['settings']['tablet.view']['auto.suggest.emails'] = getenv('LIBREBOOKING_SETTINGS_TABLET_VIEW_AUTO_SUGGEST_EMAILS');
/**
 * Registration
 */
$conf['settings']['registration']['require.phone'] = getenv('LIBREBOOKING_SETTINGS_REGISTRATION_REQUIRE_PHONE');
$conf['settings']['registration']['require.position'] = getenv('LIBREBOOKING_SETTINGS_REGISTRATION_REQUIRE_POSITION');
$conf['settings']['registration']['require.organization'] = getenv('LIBREBOOKING_SETTINGS_REGISTRATION_REQUIRE_ORGANIZATION');
/**
 * Error logging
 */
$conf['settings']['logging']['folder'] = getenv('LIBREBOOKING_SETTINGS_LOGGING_FOLDER'); //Absolute path to folder were the log will be written, writing permissions to the folder are required
$conf['settings']['logging']['level'] = getenv('LIBREBOOKING_SETTINGS_LOGGING_LEVEL'); //Set to none disable logs, error to only log errors or debug to log all messages to the app.log file 
$conf['settings']['logging']['sql'] = getenv('LIBREBOOKING_SETTINGS_LOGGING_SQL'); //Set to true no enable the creation of and sql.log file