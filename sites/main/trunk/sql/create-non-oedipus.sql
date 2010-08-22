-- Create the tables that are used by the project indirectly.

DROP TABLE IF EXISTS `hc_admin_users`;
DROP TABLE IF EXISTS `hc_logging_ignored_hosts`;
DROP TABLE IF EXISTS `hc_logging_referer_domains`;
DROP TABLE IF EXISTS `hc_logging_server_logs`;
DROP TABLE IF EXISTS `hpi_db_pages_edits`;
DROP TABLE IF EXISTS `hpi_db_pages_filter_functions`;
DROP TABLE IF EXISTS `hpi_db_pages_pages`;
DROP TABLE IF EXISTS `hpi_db_pages_sections`;
DROP TABLE IF EXISTS `hpi_db_pages_texts`;
DROP TABLE IF EXISTS `hpi_db_pages_text_section_links`;
DROP TABLE IF EXISTS `hpi_mailing_list_people`;
DROP TABLE IF EXISTS `hpi_navigation_nodes`;
DROP TABLE IF EXISTS `hpi_navigation_trees`;
DROP TABLE IF EXISTS `hpi_navigation_urls`;
DROP TABLE IF EXISTS `hpi_news_items`;

CREATE TABLE IF NOT EXISTS `hc_admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `real_name` varchar(255) NOT NULL,
  `type` enum('Developer','Admin','User') NOT NULL DEFAULT 'User',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `hc_logging_ignored_hosts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `referer_domain_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `hc_logging_referer_domains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `domain` (`domain`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `hc_logging_server_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `remote_addr` varchar(255) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `visited` datetime NOT NULL,
  `request_uri` text NOT NULL,
  `http_referer` text NOT NULL,
  `http_user_agent` text NOT NULL,
  `referer_domain_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `hpi_db_pages_edits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned NOT NULL,
  `text_id` int(10) unsigned NOT NULL,
  `submitted` datetime NOT NULL,
  `current` enum('Yes','No') CHARACTER SET ascii COLLATE ascii_bin NOT NULL DEFAULT 'No',
  `deleted` enum('Yes','No') CHARACTER SET ascii COLLATE ascii_bin NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `hpi_db_pages_filter_functions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `human_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `hpi_db_pages_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `hpi_db_pages_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `hpi_db_pages_texts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `checksum` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `filter_function_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `hpi_db_pages_text_section_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text_id` int(10) unsigned NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `hpi_mailing_list_people` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `added` datetime NOT NULL,
  `status` enum('new','moderation','spam','accepted') CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL DEFAULT 'new',
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `hpi_navigation_nodes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url_id` int(11) unsigned NOT NULL,
  `tree_id` int(11) unsigned NOT NULL,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `sort_order` int(11) unsigned NOT NULL,
  `added` datetime NOT NULL,
  `open_in_new_window` enum('Yes','No') CHARACTER SET ascii COLLATE ascii_bin NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `hpi_navigation_trees` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `added` datetime NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `hpi_navigation_urls` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `href` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `href` (`href`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `hpi_news_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `submitted` datetime NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
