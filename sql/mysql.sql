# SQL Dump for wgtransifex module
# PhpMyAdmin Version: 4.0.4
# http://www.phpmyadmin.net
#
# Host: localhost
# Generated on: Sun Jun 14, 2020 to 12:35:41
# Server version: 5.5.5-10.4.10-MariaDB
# PHP Version: 7.3.12

#
# Structure table for `wgtransifex_projects` 8
#

CREATE TABLE `wgtransifex_projects` (
    `pro_id`                   INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `pro_description`          VARCHAR(255)    NOT NULL DEFAULT '',
    `pro_source_language_code` VARCHAR(255)    NOT NULL DEFAULT '',
    `pro_slug`                 VARCHAR(255)    NOT NULL DEFAULT '',
    `pro_name`                 VARCHAR(255)    NOT NULL DEFAULT '',
    `pro_txresources`          INT(10)         NOT NULL DEFAULT '0',
    `pro_last_updated`         INT(10)         NOT NULL DEFAULT '0',
    `pro_teams`                TEXT            NOT NULL,
    `pro_resources`            INT(10)         NOT NULL DEFAULT '0',
    `pro_translations`         INT(10)         NOT NULL DEFAULT '0',
    `pro_archived`             INT(1)          NOT NULL DEFAULT '0',
    `pro_status`               INT(1)          NOT NULL DEFAULT '0',
    `pro_type`                 INT(1)          NOT NULL DEFAULT '0',
    `pro_logo`                 VARCHAR(255)    NOT NULL DEFAULT '',
    `pro_date`                 INT(11)         NOT NULL DEFAULT '0',
    `pro_submitter`            INT(10)         NOT NULL DEFAULT '0',
    PRIMARY KEY (`pro_id`)
)
    ENGINE = InnoDB;

#
# Structure table for `wgtransifex_resources` 12
#

CREATE TABLE `wgtransifex_resources` (
    `res_id`                   INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `res_source_language_code` VARCHAR(255)    NOT NULL DEFAULT '',
    `res_name`                 VARCHAR(255)    NOT NULL DEFAULT '',
    `res_i18n_type`            VARCHAR(255)    NOT NULL DEFAULT '',
    `res_priority`             VARCHAR(255)    NOT NULL DEFAULT '',
    `res_slug`                 VARCHAR(255)    NOT NULL DEFAULT '',
    `res_categories`           VARCHAR(255)    NOT NULL DEFAULT '',
    `res_metadata`             TEXT            NOT NULL,
    `res_translations`         INT(11)         NOT NULL DEFAULT '0',
    `res_date`                 INT(11)         NOT NULL DEFAULT '0',
    `res_submitter`            INT(10)         NOT NULL DEFAULT '0',
    `res_status`               INT(1)          NOT NULL DEFAULT '0',
    `res_pro_id`               INT(10)         NOT NULL DEFAULT '0',
    PRIMARY KEY (`res_id`)
)
    ENGINE = InnoDB;

#
# Structure table for `wgtransifex_translations` 8
#

CREATE TABLE `wgtransifex_translations` (
    `tra_id`                    INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `tra_pro_id`                INT(10)         NOT NULL DEFAULT '0',
    `tra_res_id`                INT(10)         NOT NULL DEFAULT '0',
    `tra_lang_id`               INT(10)         NOT NULL DEFAULT '0',
    `tra_content`               TEXT            NOT NULL,
    `tra_mimetype`              VARCHAR(100)    NOT NULL DEFAULT '',
    `tra_proofread`             INT(10)         NOT NULL DEFAULT '0',
    `tra_proofread_percentage`  INT(10)         NOT NULL DEFAULT '0',
    `tra_reviewed_percentage`   INT(10)         NOT NULL DEFAULT '0',
    `tra_completed`             INT(10)         NOT NULL DEFAULT '0',
    `tra_untranslated_words`    INT(10)         NOT NULL DEFAULT '0',
    `tra_last_commiter`         INT(10)         NOT NULL DEFAULT '0',
    `tra_reviewed`              INT(10)         NOT NULL DEFAULT '0',
    `tra_translated_entities`   INT(10)         NOT NULL DEFAULT '0',
    `tra_translated_words`      INT(10)         NOT NULL DEFAULT '0',
    `tra_untranslated_entities` INT(10)         NOT NULL DEFAULT '0',
    `tra_last_update`           INT(10)         NOT NULL DEFAULT '0',
    `tra_local`                 VARCHAR(255)    NOT NULL DEFAULT '',
    `tra_status`                INT(1)          NOT NULL DEFAULT '0',
    `tra_date`                  INT(11)         NOT NULL DEFAULT '0',
    `tra_submitter`             INT(10)         NOT NULL DEFAULT '0',
    PRIMARY KEY (`tra_id`)
)
    ENGINE = InnoDB;

#
# Structure table for `wgtransifex_settings` 7
#

CREATE TABLE `wgtransifex_settings` (
    `set_id`        INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `set_username`  VARCHAR(255)    NOT NULL DEFAULT '',
    `set_password`  VARCHAR(50)     NOT NULL DEFAULT '',
    `set_primary`   INT(1)          NOT NULL DEFAULT '0',
    `set_request`   INT(1)          NOT NULL DEFAULT '0',
    `set_date`      INT(11)         NOT NULL DEFAULT '0',
    `set_submitter` INT(10)         NOT NULL DEFAULT '0',
    PRIMARY KEY (`set_id`)
)
    ENGINE = InnoDB;

#
# Structure table for `wgtransifex_languages` 8
#

CREATE TABLE `wgtransifex_languages` (
    `lang_id`        INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `lang_name`      VARCHAR(255)    NOT NULL DEFAULT '',
    `lang_code`      VARCHAR(10)     NOT NULL DEFAULT '',
    `lang_folder`    VARCHAR(100)    NOT NULL DEFAULT '',
    `lang_iso_639_1` VARCHAR(2)      NOT NULL DEFAULT '',
    `lang_iso_639_2` VARCHAR(3)      NOT NULL DEFAULT '',
    `lang_flag`      VARCHAR(255)    NOT NULL DEFAULT '',
    `lang_primary`   INT(1)         NOT NULL DEFAULT '0',
    `lang_online`    INT(1)         NOT NULL DEFAULT '0',
    `lang_date`      INT(11)         NOT NULL DEFAULT '0',
    `lang_submitter` INT(10)         NOT NULL DEFAULT '0',
    PRIMARY KEY (`lang_id`)
)
    ENGINE = InnoDB;

INSERT INTO `wgtransifex_languages` (`lang_id`, `lang_name`, `lang_code`, `lang_folder`, `lang_iso_639_1`, `lang_iso_639_2`, `lang_flag`, `lang_primary`, `lang_online`, `lang_date`, `lang_submitter`) VALUES
(1, 'English', 'en_GB', 'english', 'en', 'eng', 'gb.png', 1, 1, 1592123375, 1),
(2, 'German', 'de_DE', 'german', 'de', 'deu', 'de.png', 0, 1, 1592123462, 1),
(3, 'French', 'fr_FR', 'french_fr', 'fr', '', 'fr.png', 0, 1, 1592127249, 1),
(4, 'Spanish', 'es_ES', 'spanish', 'es', 'spa', 'es.png', 0, 1, 1593419501, 1),
(5, 'Slovak', 'sk_SK', 'slovak', 'sk', 'slo', 'sk.png', 0, 1, 1593419520, 1),
(6, 'Portuguese (Brasil)', 'pt_BR', 'brasil', 'pt', 'por', 'br.png', 0, 1, 1593419536, 1),
(7, 'Italian', 'it_IT', 'italian', 'it', 'ita', 'it.png', 0, 1, 1593419556, 1),
(8, 'Russian (Russia)', 'ru_RU', 'russian', 'ru', '', 'ru.png', 0, 1, 1593423949, 1),
(9, 'Dutch', 'nl_NL', 'dutch', 'nl', 'nld', 'nl.png', 0, 1, 1593419586, 1),
(10, 'Danish', 'da_DK', 'danish', 'da', 'dan', 'dk.png', 0, 1, 1593419599, 1),
(11, 'Turkish', 'tr_TR', 'turkish', 'tr', 'tur', 'tr.png', 0, 1, 1593419615, 1),
(12, 'Chinese (Taiwan)', 'zh_TW', 'chinese_tw', '', '', 'tw.png', 0, 1, 1593417604, 1),
(13, 'Polish', 'pl_PL', 'Polish', 'pl', 'pol', 'pl.png', 0, 1, 1593419651, 1),
(14, 'Persian (Iran)', 'fa_IR', 'persian_ir', 'fa', '', 'ir.png', 0, 1, 1593417746, 1),
(15, 'Arabic', 'ar', 'persian_ar', 'ar', '', 'blank.png', 0, 1, 1593417720, 1),
(16, 'Japanese', 'ja_JP', 'japanese', 'ja', 'jpn', 'jp.png', 0, 1, 1593421597, 1),
(17, 'Greek', 'el_GR', 'greek', 'el', '', 'gr.png', 0, 1, 1593430124, 1),
(18, 'Bulgarian', 'bg_BG', 'bulgarian', 'bg', 'bul', 'bg.png', 0, 1, 1593421764, 1),
(19, 'Arabic (Saudi Arabia)', 'ar_SA', 'arabic', 'ar', '', 'sa.png', 0, 1, 1593421899, 1),
(20, 'Chinese (China)', 'zh_CN', 'chinese_cn', '', '', 'cn.png', 0, 1, 1593417592, 1),
(21, 'Croatian', 'hr_HR', 'croatian', 'hr', '', 'hr.png', 0, 1, 1593422043, 1),
(22, 'Swedish', 'sv_SE', 'swedish', 'sv', '', 'se.png', 0, 1, 1593422107, 1),
(23, 'Czech', 'cs_CZ', 'czech', 'cs', '', 'cz.png', 0, 1, 1593422315, 1),
(24, 'Portuguese', 'pt_PT', 'portuguese', 'pt', '', 'pt.png', 0, 1, 1593423332, 1),
(25, 'Slovenian', 'sl_SI', 'slovenian', 'sl', '', 'si.png', 0, 1, 1593422461, 1),
(26, 'English (Canada)', 'en_CA', 'english_ca', '', '', 'ca.png', 0, 1, 1593417640, 1),
(27, 'Korean (Korea)', 'ko_KR', 'korean', 'ko', '', 'kr.png', 0, 1, 1593422655, 1),
(28, 'Vietnamese', 'vi_VN', 'vietnamese', 'vi', '', 'vn.png', 0, 1, 1593422731, 1),
(29, 'Malay (Malaysia)', 'ms_MY', 'malay', 'ms', '', 'my.png', 0, 1, 1593422796, 1),
(30, 'Hungarian', 'hu_HU', 'hungarian', 'hu', '', 'hu.png', 0, 1, 1593422861, 1),
(31, 'Thai', 'th_TH', 'thai', 'th', '', 'th.png', 0, 1, 1593422907, 1),
(32, 'Bosnian (Bosnia Herzegovina)', 'bs_BA', 'bosnian_ba', 'bs', '', 'ba.png', 0, 1, 1593423993, 1),
(33, 'Hebrew (Israel)', 'he_IL', 'hebrew', 'he', '', 'il.png', 0, 1, 1593423047, 1),
(34, 'Romanian', 'ro_RO', 'romanian', 'ro', '', 'ro.png', 0, 1, 1593430158, 1),
(35, 'Serbian (Serbia)', 'sr_RS', 'serbian', 'sr', '', 'rs.png', 0, 1, 1593423125, 1),
(36, 'Burmese (Myanmar)', 'my_MM', 'burmese', 'my', '', 'mm.png', 0, 1, 1593423182, 1),
(37, 'Catalan (Spain)', 'ca_ES', 'catalan', '', '', 'blank.png', 0, 1, 1593420941, 1),
(38, 'English (United States)', 'en_US', 'english_us', '', '', 'us.png', 0, 1, 1593417650, 1),
(39, 'French (Canada)', 'fr_CA', 'french_ca', '', '', 'ca.png', 0, 1, 1593417664, 1),
(40, 'Indonesian', 'id_ID', 'indonesian', 'id', '', 'id.png', 0, 1, 1593430138, 1),
(41, 'Norwegian', 'no_NO', 'norwegian', 'no', '', 'no.png', 0, 1, 1593423465, 1),
(42, 'Tagalog (Philippines)', 'tl_PH', 'tagalog', 'tl', '', 'ph.png', 0, 1, 1593423522, 1),
(43, 'Ukrainian', 'uk_UA', 'ukrainian', 'uk', '', 'ua.png', 0, 1, 1593430174, 1),
(44, 'Urdu (Pakistan)', 'ur_PK', 'urdu', 'ur', '', 'pk.png', 0, 1, 1593423595, 1),
(45, 'Bosnian', 'bs', 'bosnian', '', '', 'bs.png', 0, 1, 1606987753, 1),
(46, 'French', 'fr', 'french', '', '', 'fr.png', 0, 1, 1606988036, 1),
(47, 'Russian', 'ru', 'russian', '', '', 'ru.png', 0, 1, 1606988728, 1);

#
# Structure table for `wgtransifex_packages` 6
#

CREATE TABLE `wgtransifex_packages` (
    `pkg_id`        INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `pkg_name`      VARCHAR(255)    NOT NULL DEFAULT '',
    `pkg_desc`      TEXT            NULL,
    `pkg_pro_id`    VARCHAR(10)     NOT NULL DEFAULT '',
    `pkg_lang_id`   VARCHAR(10)     NOT NULL DEFAULT '',
    `pkg_status`    INT(11)         NOT NULL DEFAULT '0',
    `pkg_zip`       VARCHAR(255)    NOT NULL DEFAULT '',
    `pkg_logo`      VARCHAR(255)    NOT NULL DEFAULT '',
    `pkg_traperc`   INT(11)         NOT NULL DEFAULT '0',
    `pkg_date`      INT(11)         NOT NULL DEFAULT '0',
    `pkg_submitter` INT(10)         NOT NULL DEFAULT '0',
    PRIMARY KEY (`pkg_id`)
)
    ENGINE = InnoDB;

#
# Structure table for `wgtransifex_requests` 8
#

CREATE TABLE `wgtransifex_requests` (
  `req_id`         INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `req_pro_id`     INT(0)          NOT NULL DEFAULT '0',
  `req_lang_id`    INT(0)          NOT NULL DEFAULT '0',
  `req_info`       VARCHAR(255)    NOT NULL DEFAULT '',
  `req_date`       INT(11)         NOT NULL DEFAULT '0',
  `req_submitter`  INT(10)         NOT NULL DEFAULT '0',
  `req_status`     INT(1)          NOT NULL DEFAULT '0',
  `req_statusdate` INT(11)         NOT NULL DEFAULT '0',
  `req_statusuid`  INT(10)         NOT NULL DEFAULT '0',
  PRIMARY KEY (`req_id`)
) ENGINE=InnoDB;
