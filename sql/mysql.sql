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
    `pkg_date`      INT(11)         NOT NULL DEFAULT '0',
    `pkg_submitter` INT(10)         NOT NULL DEFAULT '0',
    PRIMARY KEY (`pkg_id`)
)
    ENGINE = InnoDB;

#
# Structure table for `wgtransifex_requests` 8
#

CREATE TABLE `wgtransifex_requests` (
  `req_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `req_pro_id` INT(0) NOT NULL DEFAULT '0',
  `req_lang_id` INT(0) NOT NULL DEFAULT '0',
  `req_date` INT(11) NOT NULL DEFAULT '0',
  `req_submitter` INT(10) NOT NULL DEFAULT '0',
  `req_status` INT(1) NOT NULL DEFAULT '0',
  `req_statusdate` INT(11) NOT NULL DEFAULT '0',
  `req_statusuid` INT(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`req_id`)
) ENGINE=InnoDB;
