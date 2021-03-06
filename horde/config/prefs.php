<?php
/**
 * Preferences Information
 * =======================
 * Changes you make to the prefs.php file(s) will not be reflected until the
 * user logs out and logs in again.
 *
 * If you change these preferences in a production system, you will
 * need to delete these preference entries in your backend; entries in the
 * backend have priority over the default entry.
 *
 * IMPORTANT: DO NOT EDIT THIS FILE!
 * Local overrides MUST be placed in prefs.local.php or prefs.d/.
 * If the 'vhosts' setting has been enabled in Horde's configuration, you can
 * use prefs-servername.php.
 *
 * Example configuration file that locks a preference, sets a different default
 * value for another, and enables a preference hook for a third one:
 *
 * <code>
 * <?php
 * $_prefs['theme']['locked'] = true;
 * $_prefs['initial_application']['value'] = 'imp';
 * $_prefs['from_addr']['hook'] = true;
 * </code>
 *
 * $prefGroups
 * ===========
 * $prefGroups defines the preferences page in which a preference value will
 * appear in.
 *
 * Format:
 * -------
 * column - (string) Which column head this group will go under.
 * desc - (string) Description shown under label.
 * label - (string) Label for the group of settings.
 * members - (array) List of displayable preferences contained in this group.
 * type - (string) The prefGroup type.
 *        VALUES:
 *          'identities' - An identities screen. The identities screen will
 *                         always show all the identities prefs from Horde
 *                         along with the identity switching widget.
 *                         Additionally, applications can define additional
 *                         identity information in their prefs.php file that
 *                         will be displayed after the Horde-wide settings.
 *          Empty - The default preferences screen.
 *        DEFAULT: The default preferences screen.
 *
 * $_prefs
 * =======
 * $_prefs defines the preferences used within an application.  Each
 * preference is contained within a separate array entry, with the key being
 * the name of the preference.
 *
 * The following are OPTIONAL values for each entry:
 *
 * advanced - (boolean) Mark pref as advanced - will only be displayed if user
 *            switches to advanced preferences mode.
 *            VALUES:
 *              true: Advanced preference; hidden in basic preferences mode.
 *              false: Basic preference; shown regardless of preferences mode.
 *            DEFAULT: false
 *
 * help - (string) The help file identifier for this preference.
 *        VALUES:
 *          If present, a help icon will be displayed next to the preference.
 *          Clicking on this icon will open the entry in the help viewer in
 *          a popup window.
 *        DEFAULT: No help icon is displayed
 *
 * hook - (boolean) If true, the prefs_init hook will be run for this entry.
 *        VALUES: true/false
 *        DEFAULT: false
 *
 * locked - (boolean) Allow preference to be changed from the preferences
 *          screen?
 *          VALUES:
 *            true: Do not show this preference in the UI and don't allow
 *                  changing by any mechanism.
 *            false: Show this preference in the UI and allow changing.
 *          DEFAULT: false
 *
 * The UI display for a preference is controlled by the 'type' key. This key
 * controls how the preference is displayed on the preferences screen. If this
 * key is not present, the preference is treated as type 'implict'. The
 * following is the list of types, with a description of further keys used
 * for each type.
 *
 * 'checkbox'
 * ----------
 * Provides a checkbox (yes/no) entry.
 *
 * ADDITIONAL KEYS:
 *   'desc' - (string) The description text to use on the preferences page.
 *   'value' - (integer) 0 (or false) for unchecked, 1 (or true) for checked.
 *
 * 'enum'
 * ------
 * Provides an enumeration (a/k/a selection) list in the UI.
 *
 * ADDITIONAL KEYS:
 *   'desc' - (string) The description text to use on the preferences page.
 *   'escaped' - (boolean) If true, values in 'enum' are already escaped.
 *               DEFAULT: false
 *   'enum' - (array) [REQUIRED] The enumeration list. Keys will be used as
 *            the preference value; values are the text that will be displayed
 *            in the selection list.
 *   'value' - (mixed) The value of the preference. Will be used to
 *             auto-select the entry in the selection list.
 *
 * 'implicit'
 * ----------
 * Preference used in an application but never directly shown to the viewer
 * via the preferences screen.
 *
 * ADDITIONAL KEYS:
 *   'value' - (mixed) The value of the preference. Will be used to
 *             auto-select the entry in the selection list.
 *
 * 'link'
 * ------
 * Provides a clickable link.
 *
 * This pref is a UI placeholder only and will not be stored in the preference
 * backend.
 *
 * ADDITIONAL KEYS:
 *   'desc' - (string) The link text.
 *   'img' - (string) An image file to display before the link.
 *           DEFAULT: no image displayed
 *   'url' - (string) The URL to link to (unescaped). Only specify one of
 *           'url' or 'xurl'.
 *   'xurl' - (string) The URL to link to (escaped). Only specify one of 'url'
 *            or 'xurl'.
 *
 * 'multienum'
 * -----------
 * Provides an enumeration list in the UI that allows for multiple entries
 * to be selected.
 *
 * ADDITIONAL KEYS:
 *   'desc' - (string) The description text to use on the preferences page.
 *   'escaped' - (boolean) If true, values in 'enum' are already escaped.
 *               DEFAULT: false
 *   'enum' - (array) [REQUIRED] The enumeration list. Keys will be used as
 *            the preference value; values are the text that will be displayed
 *            in the selection list.
 *   'value' - (string) A serialized value containing the key(s) selected. All
 *             keys will be auto-selected in the selection area.
 *
 * 'number'
 * --------
 * Provides a small textbox to enter a natural number. Values entered for this
 * preference are automatically converted to a number value.
 *
 * ADDITIONAL KEYS:
 *   'desc' - (string) The description text to use on the preferences page.
 *   'value' - (number) The preference value.
 *   'zero' - (boolean) By default, a number must be non-zero. If this is
 *            true, zeros will be accepted as valid input.
 *
 * 'password'
 * ----------
 * Provides a textbox for password entry (input characters will not be
 * displayed to the screen).
 *
 * ADDITIONAL KEYS:
 *   'desc' - (string) The description text to use on the preferences page.
 *   'value' - (string) The preference value.
 *
 * 'prefslink'
 * -----------
 * Create a link to another preferences page.
 *
 * This pref is a UI placeholder only and will not be stored in the preference
 * backend.
 *
 * ADDITIONAL KEYS:
 *   'app' - (string) The application to link to.
 *           DEFAULT: current application.
 *   'desc' - (string) The link text.
 *   'group' - (string) The preferences group to link to.
 *   'img' - (string) An image file to display before the link.
 *           DEFAULT: no image displayed
 *
 * 'rawhtml'
 * ---------
 * Outputs the raw HTML string to the page.
 *
 * This pref is a UI placeholder only and will not be stored in the preference
 * backend.
 *
 * ADDITIONAL KEYS:
 *   'value' - (string) The raw (already escaped) HTML to output to the page.
 *
 * 'text'
 * ------
 * Provides a single-line textbox.
 *
 * ADDITIONAL KEYS:
 *   'desc' - (string) The description text to use on the preferences page.
 *   'value' - (string) The preference value.
 *
 * 'textarea'
 * ----------
 * Provides a multi-line textbox.
 *
 * ADDITIONAL KEYS:
 *   'desc' - (string) The description text to use on the preferences page.
 *   'value' - (string) The preference value. Lines should be separated
 *             with the "\n" character.
 *
 *
 * Placeholder types - these prefs are UI placeholders only and will not
 * be stored in the preference backend.
 *
 * 'container'
 * -----------
 * Used to indicate a list of preferences that MUST appear on the same page
 * for UI purposes.
 *
 * 'special'
 * ---------
 * Used as placeholder to indicate that the application will provide both the
 * UI display code and the subsequent preferences storage.
 */

// *** Personal Information (Identities) Preferences ***

$prefGroups['identities'] = array(
    'column' => _("Your Information"),
    'label' => _("Personal Information"),
    'desc' => _("Change your personal information."),
    'members' => array('id', 'fullname', 'from_addr', 'location'),
    'type' => 'identities'
);

// identity name
// If you lock this preference, you must specify a value or a hook for it in
// horde/config/hooks.php.
$_prefs['id'] = array(
    'value' => '',
    'type' => 'text',
    'desc' => _("Identity's name:")
);

// user full name for From: line
// If you lock this preference, you must specify a value or a hook for it in
// horde/config/hooks.php.
$_prefs['fullname'] = array(
    'value' => '',
    'type' => 'text',
    'desc' => _("Your full name:")
);

// user preferred email address for From: line
// If you lock this preference, you must specify a value or a hook for it in
// horde/config/hooks.php.
$_prefs['from_addr'] = array(
    'value' => '',
    'type' => 'text',
    'desc' =>  _("The default e-mail address to use with this identity:")
);

// user location.
$_prefs['location'] = array(
    'value' => '',
    'type' => 'text',
    'desc' => _("Default location to use for location-aware features.")
);

// default identity
// Set locked to true if you don't want the users to have multiple identities.
$_prefs['default_identity'] = array(
    'value' => 0
);

// identities data
$_prefs['identities'] = array(
    // default value = serialize(array())
    'value' => 'a:0:{}'
);

// identify email confirmation
$_prefs['confirm_email'] = array(
    // default value = serialize(array())
    'value' => 'a:0:{}'
);



// *** Authentication Preferences ***

$prefGroups['forgotpass'] = array(
    'column' => _("Your Information"),
    'label' => _("Account Password"),
    'desc' => _("Set preferences to allow you to reset your password if you ever forget it."),
    'members' => array(
        'security_question', 'security_answer', 'alternate_email'
    )
);

// user security question
$_prefs['security_question'] = array(
    'value' => '',
    'type' => 'text',
    'desc' => _("Enter a security question which you will be asked if you need to reset your password, e.g. 'what is the name of your pet?':")
);

// user security answer
$_prefs['security_answer'] = array(
    'value' => '',
    'type' => 'text',
    'desc' => _("Insert the required answer to the security question:")
);

// user alternate email
$_prefs['alternate_email'] = array(
    'value' => '',
    'type' => 'text',
    'desc' => _("Insert an email address to which you can receive the new password:")
);



// *** Locale/Time Preferences ***

$prefGroups['language'] = array(
    'column' => _("Your Information"),
    'label' => _("Locale and Time"),
    'desc' => _("Set your preferred language, timezone and date preferences."),
    'members' => array(
        'language', 'sending_charset', 'timezone', 'twentyFour', 'date_format',
        'date_format_mini', 'time_format', 'first_week_day'
    )
);

// user language
$_prefs['language'] = array(
    'value' => '',
    'type' => 'enum',
    // Language list is dynamically built when prefs screen is displayed
    'enum' => array(),
    'escaped' => true,
    'desc' => _("Select your preferred language:")
);

// Select widget for email charsets
$_prefs['sending_charset'] = array(
    'value' => '',
    'advanced' => true,
    'type' => 'enum',
    'enum' => array_merge(
        array('' => _("Default")),
        $GLOBALS['registry']->nlsconfig->encodings_sort
    ),
    'desc' => _("Default charset for sending e-mail messages:")
);

// user time zone
$_prefs['timezone'] = array(
    'value' => '',
    'type' => 'enum',
    // Timezone list is dynamically built when prefs screen is displayed
    'enum' => array(),
    'desc' => _("Your current time zone:")
);

// time format
$_prefs['twentyFour'] = array(
    'value' => false,
    'type' => 'checkbox',
    'desc' => _("Display 24-hour times?")
);

// date format
$_prefs['date_format'] = array(
    'value' => '%x',
    'type' => 'enum',
    'enum' => array(
        '%x' => strftime('%x'),
        '%Y-%m-%d' => strftime('%Y-%m-%d'),
        '%d/%m/%Y' => strftime('%d/%m/%Y'),
        '%A, %B %d, %Y' => strftime('%A, %B %d, %Y'),
        '%A, %d. %B %Y' => strftime('%A, %d. %B %Y'),
        '%A, %d %B %Y' => strftime('%A, %d %B %Y'),
        '%a, %b %e, %Y' => strftime('%a, %b %e, %Y'),
        '%a, %b %e, %y' => strftime('%a, %b %e, %y'),
        '%a, %b %e' => strftime('%a, %b %e'),
        '%a, %e %b %Y' => strftime('%a, %e %b %Y'),
        '%a, %e %b %y' => strftime('%a, %e %b %y'),
        '%a %d %b %Y' => strftime ('%a %d %b %Y'),
        '%a %x' => strftime ('%a %x'),
        '%a %Y-%m-%d' => strftime ('%a %Y-%m-%d'),
        '%e %b %Y' => strftime('%e %b %Y'),
        '%e. %b %Y' => strftime('%e. %b %Y'),
        '%e. %m %Y' => strftime('%e %m %Y'),
        '%e. %m.' => strftime('%e. %m.'),
        '%e. %B' => strftime('%e. %B'),
        '%e. %B %Y' => strftime('%e. %B %Y'),
        '%e. %B %y' => strftime('%e. %B %y'),
        '%B %e, %Y' => strftime('%B %e, %Y'),
    ),
    'desc' => _("Choose how to display dates (full format):"),
);

// date format (miniature)
$_prefs['date_format_mini'] = array(
    'value' => '%x',
    'type' => 'enum',
    'enum' => array(
        '%x' => strftime('%x'),
        '%Y-%m-%d' => strftime('%Y-%m-%d'),
        '%d/%m/%Y' => strftime('%d/%m/%Y'),
        '%a, %b %e, %Y' => strftime('%a, %b %e, %Y'),
        '%a, %b %e, %y' => strftime('%a, %b %e, %y'),
        '%a, %b %e' => strftime('%a, %b %e'),
        '%a, %e %b %Y' => strftime('%a, %e %b %Y'),
        '%a, %e %b %y' => strftime('%a, %e %b %y'),
        '%a %d %b %Y' => strftime ('%a %d %b %Y'),
        '%a %x' => strftime ('%a %x'),
        '%a %Y-%m-%d' => strftime ('%a %Y-%m-%d'),
        '%e %b %Y' => strftime('%e %b %Y'),
        '%e. %b %Y' => strftime('%e. %b %Y'),
        '%e. %m %Y' => strftime('%e %m %Y'),
        '%e. %m.' => strftime('%e. %m.'),
        '%b %e, %Y' => strftime('%b %e, %Y'),
    ),
    'desc' => _("Choose how to display dates (abbreviated format):"),
);

// Time format
$_prefs['time_format'] = array(
    'value' => '%X',
    'type' => 'enum',
    'enum' => array(
        '%X' => strftime('%X') . ' (' . _("Default") . ')',
        '%H:%M:%S' => strftime('%H:%M:%S') . ' (' . _("24-hour format") . ')',
        '%l:%M:%S %p' => strftime('%l:%M:%S %p'),
        '%R' => strftime('%R') . ' (' . _("24-hour format") . ')',
        '%l:%M %p' => strftime('%l:%M %p'),
    ),
    'desc' => _("Choose how to display times:")
);

// what day should be displayed as the first day of the week?
$_prefs['first_week_day'] = array(
    'value' => '0',
    'type' => 'enum',
    'enum' => array(
        '0' => _("Sunday"),
        '1' => _("Monday")
    ),
    'desc' => _("Which day would you like to be displayed as the first day of the week?")
);



// *** Categories/Labels Preferences ***

$prefGroups['categories'] = array(
    'column' => _("Your Information"),
    'label' => _("Categories and Labels"),
    'desc' => _("Manage the list of categories you have to label items with, and colors associated with those categories."),
    'members' => array('categorymanagement')
);

// UI for category management.
$_prefs['categorymanagement'] = array(
    'type' => 'special'
);

// categories
$_prefs['categories'] = array(
    'value' => ''
);

// category colors
$_prefs['category_colors'] = array(
    'value' => ''
);



// *** Display Preferences ***

$prefGroups['display'] = array(
    'column' => _("Other Information"),
    'label' => _("Display Preferences"),
    'desc' => _("Set your startup application, color scheme, page refreshing, and other display preferences."),
    'members' => array(
        'initial_application', 'show_last_login', 'theme',
        'summary_refresh_time', 'show_sidebar', 'sidebar_width',
        'menu_view', 'menu_refresh_time', 'widget_accesskey'
    )
);

// what application should we go to after login?
$_prefs['initial_application'] = array(
    'value' => 'horde',
    'type' => 'enum',
    // Application list is dynamically built when prefs screen is displayed
    'enum' => array(),
    'desc' => sprintf(_("What application should %s display after login?"), $GLOBALS['registry']->get('name'))
);

// show the last login time of user
$_prefs['show_last_login'] = array(
    'value' => true,
    'type' => 'checkbox',
    'desc' => _("Show last login time when logging in?")
);

// last login time of user
// value is a serialized array of the UNIX timestamp of the last
// login, and the host that the last login was from.
$_prefs['last_login'] = array(
    // value = serialize(array())
    'value' => 'a:0:{}'
);

// UI theme
$_prefs['theme'] = array(
    'value' => 'silver',
    'type' => 'enum',
    // Theme list is dynamically built when prefs screen is displayed
    'enum' => array(),
    'desc' => _("Select your color scheme.")
);

$_prefs['summary_refresh_time'] = array(
    'value' => 300,
    'type' => 'enum',
    'enum' => array(
        0 => _("Never"),
        30 => _("Every 30 seconds"),
        60 => _("Every minute"),
        300 => _("Every 5 minutes"),
        900 => _("Every 15 minutes"),
        1800 => _("Every half hour")
    ),
    'desc' => _("Refresh Portal View:")
);

$_prefs['show_sidebar'] = array(
    'value' => true,
    'type' => 'checkbox',
    'desc' => sprintf(_("Show the %s Menu on the left?"), $GLOBALS['registry']->get('name', 'horde'))
);

$_prefs['sidebar_width'] = array(
    'value' => 150,
    'type' => 'number',
    'desc' => sprintf(_("Width of the %s menu on the left:"), $GLOBALS['registry']->get('name', 'horde'))
);

$_prefs['menu_view'] = array(
    'value' => 'both',
    'type' => 'enum',
    'enum' => array(
        'text' => _("Text Only"),
        'icon' => _("Icons Only"),
        'both' => _("Icons with text")
    ),
    'desc' => _("Menu mode:")
);

$_prefs['menu_refresh_time'] = array(
    'value' => 300,
    'type' => 'enum',
    'enum' => array(
        0 => _("Never"),
        30 => _("Every 30 seconds"),
        60 => _("Every minute"),
        120 => _("Every 2 minutes"),
        300 => _("Every 5 minutes")
    ),
    'desc' => _("Refresh Dynamic Menu Elements:")
);

// should we create access keys?
$_prefs['widget_accesskey'] = array(
    'value' => true,
    'type' => 'checkbox',
    'desc' => _("Should access keys be defined for most links?")
);

// the layout of the portal page.
$_prefs['portal_layout'] = array(
    // value = serialize(array())
    'value' => 'a:0:{}'
);



// *** Remote Servers Preferences ***

$prefGroups['remote'] = array(
    'column' => _("Other Information"),
    'label' => _("Remote Servers"),
    'desc' => _("Set up remote servers that you want to access from your portal."),
    'members' => array('remotemanagement')
);

$_prefs['remotemanagement'] = array(
    'type' => 'special'
);

// the remote servers.
$_prefs['remote_summaries'] = array(
    // value = serialize(array())
    'value' => 'a:0:{}'
);



// *** Facebook Integration Preferences ***

$prefGroups['facebook'] = array(
    'column' => _("Other Information"),
    'label' => _("Facebook Integration"),
    'desc' => _("Set up integration with your Facebook account."),
    'members' => array('facebookmanagement')
);

$_prefs['facebookmanagement'] = array(
    'type' => 'special'
);

$_prefs['facebook'] = array(
    // value = serialize(array())
    'value' => 'a:0:{}'
);



// *** Twitter Intergration Preferences ***

$prefGroups['twitter'] = array(
    'column' => _("Other Information"),
    'label' => _("Twitter Integration"),
    'desc' => _("Set up integration with your Twitter account."),
    'members' => array('twittermanagement')
);

$_prefs['twittermanagement'] = array(
    'type' => 'special'
);

$_prefs['twitter'] = array(
    // value = serialize(array())
    'value' => 'a:0:{}'
);



// *** IMSP Intergration Preferences ***
$prefGroups['imspauth'] = array(
    'column' => _("Other Information"),
    'label' => _("Alternate IMSP Login"),
    'desc' => _("Use if name/password is different for IMSP server."),
    'members' => array('imsp_auth_user', 'imsp_auth_pass')
);

$_prefs['imsp_auth_user'] = array(
    'value' => '',
    'type' => 'text',
    'desc' => _("Alternate IMSP Username")
);

$_prefs['imsp_auth_pass'] = array(
    'value' => '',
    'type' => 'password',
    'desc' => _("Alternate IMSP Password")
);



// *** SyncML Preferences ***
$prefGroups['syncml'] = array(
    'column' => _("Other Information"),
    'label' => _("SyncML"),
    'desc' => _("Configuration for syncing with PDAs, Smartphones and Outlook."),
    'members' => array('syncmlmanagement')
);

$_prefs['syncmlmanagement'] = array(
    'type' => 'special'
);

// *** ActiveSync Preferences ***
$prefGroups['activesync'] = array(
    'column' => _("Other Information"),
    'label' => _("ActiveSync"),
    'desc' => _("Manage your ActiveSync devices."),
    'members' => array('activesyncmanagement')
);

$_prefs['activesyncmanagement'] = array(
    'type' => 'special'
);



// *** Internal Preferences ***

// last time login tasks were run.
$_prefs['last_logintasks'] = array(
    // value = serialize(array())
    'value' => 'a:0:{}'
);

// Track login upgrade tasks.
$_prefs['upgrade_tasks'] = array(
    // value = serialize(array())
    'value' => 'a:0:{}'
);
