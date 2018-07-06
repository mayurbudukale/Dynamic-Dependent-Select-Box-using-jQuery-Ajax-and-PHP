# Dynamic-Dependent-Select-Box-using-jQuery-Ajax-and-PHP
Reference  : https://www.codexworld.com/dynamic-dependent-select-box-using-jquery-ajax-php/

DB Queries


CREATE TABLE `countries` (
 `country_id` int(11) NOT NULL AUTO_INCREMENT,
 `country_name` varchar(50) CHARACTER SET utf8 NOT NULL,
 `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active',
 PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `states` (
 `state_id` int(11) NOT NULL AUTO_INCREMENT,
 `state_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `country_id` int(11) NOT NULL,
 `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active',
 PRIMARY KEY (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `cities` (
 `city_id` int(11) NOT NULL AUTO_INCREMENT,
 `city_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `state_id` int(11) NOT NULL,
 `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active',
 PRIMARY KEY (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
