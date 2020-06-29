<?php
// Module Info
// The name of this module
define('_MI_CONTACT_NAME', 'Kontakt zu uns?');
define('_MI_CONTACT_DESC', 'Modul für Kontaktformular (mit Speicherung in Datenbank)');
// Admin menu
define('_MI_CONTACT_MENU_HOME', 'Homepage');
define('_MI_CONTACT_MENU_HOME_DESC', 'Gehe zur Übersicht');
define('_MI_CONTACT_MENU_CONTACT', 'Kontakt');
define('_MI_CONTACT_MENU_CONTACT_DESC', 'Liste der Anfragen');
define('_MI_CONTACT_MENU_TOOLS', 'Bereinigen');
define('_MI_CONTACT_MENU_TOOLS_DESC', 'Modul-Werkzeuge');
define('_MI_CONTACT_MENU_LOGS', 'Logs');
define('_MI_CONTACT_MENU_LOGS_DESC', 'Logs anzeigen');
define('_MI_CONTACT_MENU_ABOUT', 'Über');
define('_MI_CONTACT_MENU_ABOUT_DESC', 'Über das Modul');
define('_MI_CONTACT_MENU_HELP', 'Hilfe');
define('_MI_CONTACT_MENU_HELP_DESC', 'Hilfe zum Modul');
// Module Settings
define('_MI_CONTACT_FORM_URL', 'URL abfragen');
define('_MI_CONTACT_FORM_URL_DESC', '');
define('_MI_CONTACT_FORM_ICQ', 'ICQ abfragen');
define('_MI_CONTACT_FORM_ICQ_DESC', '');
define('_MI_CONTACT_FORM_COMPANY', 'Firma abfragen');
define('_MI_CONTACT_FORM_COMPANY_DESC', '');
define('_MI_CONTACT_FORM_LOCATION', 'Ort abfragen');
define('_MI_CONTACT_FORM_LOCATION_DESC', '');
define('_MI_CONTACT_FORM_PHONE', 'Telefon abfragen');
define('_MI_CONTACT_FORM_PHONE_DESC', '');
define('_MI_CONTACT_FORM_ADDRESS', 'Adresse abfragen');
define('_MI_CONTACT_FORM_ADDRESS_DESC', '');
define('_MI_CONTACT_FORM_DEPT', 'Show select Departments');
define('_MI_CONTACT_FORM_DEPT_DESC', '');
define('_MI_CONTACT_DEPT', 'Departments/Receipients');
define('_MI_CONTACT_DEPT_DESC', 'Departments allow you to define a department/email combination.<br>'
                                . 'Users selecting from a defined department will have their contact information sent to the corresponding email address you define.<br><br>'
                                . 'Define each department/email as follows:<br><br>'
                                . 'dept1,email1|dept2,email2|dept3,email3 etc. - each department and email must be separated<br>'
                                . "by a comma ',', and each department email combination must be separated by a pipe '|'<br><br>"
                                . 'If no department/recipient is defined, than the mail will be sent to standard e-mail-address.');
define('_MI_CONTACT_PERPAGE', 'Nachrichten pro Seite');
define('_MI_CONTACT_PERPAGE_DESC', '');
define('_MI_CONTACT_TOPINFO', 'Überschrift des Kontaktformulars');
define('_MI_CONTACT_TOPINFO_DESC', 'Kann HTML Code beinhalten');
define('_MI_CONTACT_HEAD_OPTIONS', 'Formularoptionen');
define('_MI_CONTACT_HEAD_ADMIN', 'Administration');
define('_MI_CONTACT_HEAD_INFO', 'Informationen');
//1.81
define('_MI_CONTACT_MAP', 'Embed google maps');
define('_MI_CONTACT_MAP_DESC', "Embed Google Maps iframe <br> change iframe width to '100%'");
//2.1
define('_MI_CONTACT_FORM_SKYPE', 'Get Skype');
define('_MI_CONTACT_FORM_SKYPE_DESC', '');

define('_MI_CONTACT_SUBJECT_PREFIX', 'Add Department as Prefix?');
define('_MI_CONTACT_SUBJECT_PREFIX_DESC', 'If yes, the name of the Department will be used as Prefix for the email Subject');
define('_MI_CONTACT_PREFIX_TEXT', "Additional Email's Subject Prefix");
define('_MI_CONTACT_PREFIX_TEXT_DESC', "This text will be included before the Department in the email's subject prefix");
define('_MI_CONTACT_PREFIX_TEXT_DEFAULT', 'Kontakt');
//2.21
define('_MI_CONTACT_HEAD_CAPTCHA', 'Options for Captcha');
define('_MI_CONTACT_FORM_RECAPTCHA_USE', 'Use Google reCaptcha?');
define('_MI_CONTACT_FORM_RECAPTCHA_USE_DESC', 'Select <em>Yes</em> to use Google reCaptcha in the submit form.<br>Default: <em>No</em>');
define('_MI_CONTACT_FORM_RECAPTCHA_KEY', 'Your reCaptcha website key');
define('_MI_CONTACT_FORM_RECAPTCHA_KEY_DESC', "More info: <a href='https://www.google.com/recaptcha' target='_blank'>Google reCaptcha</a> under 'Resources'.<br>For localhost testing only you can use this key: 6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI");
define('_MI_CONTACT_HEAD_DEPT', 'Options for usage of departments/recipients');
define('_MI_CONTACT_HEAD_MISC', 'Misc options');
define('_MI_CONTACT_MAIL_CONFIRM', 'Send confirmation email?');
define('_MI_CONTACT_MAIL_CONFIRM_DESC', 'If yes, a short confirmation email with the basic information will be sent to given email-address.');
define('_MI_CONTACT_RECIPIENT_STD', 'Standard recipient');
define('_MI_CONTACT_RECIPIENT_STD_DESC', 'Each contact request will be sent to this e-mail-address');

//2.23
define('_MI_B_CONTACT_FORM', 'Contact form');
define('_MI_B_CONTACT_FORM_DESC', 'Show contact form as XOOPS block');
define('_MI_B_CONTACT_MAP', 'Wohnort');
define('_MI_B_CONTACT_MAP_DESC', 'Show defined location in Google Maps as XOOPS block');
define('_MI_B_CONTACT_FORM_MAP', 'Contact form and location');
define('_MI_B_CONTACT_FORM_MAP_DESC', 'Show contact form together with defined location in Google Maps as block');

define('_MI_CONTACT_DEFAULT', 'Default contact info');
define('_MI_CONTACT_DEFAULT_DESC', 'Here you can define additional information, which should be shown beside contact form (e.g name, address , phone number,...');
