-- The create script for the database of ODM
-- (c) Robert Impey, 2010-08-22

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `odm_dev_rob`
--

-- --------------------------------------------------------

--
-- Table structure for table `hc_admin_users`
--

DROP TABLE IF EXISTS `hc_admin_users`;
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

-- --------------------------------------------------------

--
-- Table structure for table `hc_logging_ignored_hosts`
--

DROP TABLE IF EXISTS `hc_logging_ignored_hosts`;
CREATE TABLE IF NOT EXISTS `hc_logging_ignored_hosts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `referer_domain_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hc_logging_referer_domains`
--

DROP TABLE IF EXISTS `hc_logging_referer_domains`;
CREATE TABLE IF NOT EXISTS `hc_logging_referer_domains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `domain` (`domain`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hc_logging_server_logs`
--

DROP TABLE IF EXISTS `hc_logging_server_logs`;
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

-- --------------------------------------------------------

--
-- Table structure for table `hpi_db_pages_edits`
--

DROP TABLE IF EXISTS `hpi_db_pages_edits`;
CREATE TABLE IF NOT EXISTS `hpi_db_pages_edits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned NOT NULL,
  `text_id` int(10) unsigned NOT NULL,
  `submitted` datetime NOT NULL,
  `current` enum('Yes','No') CHARACTER SET ascii COLLATE ascii_bin NOT NULL DEFAULT 'No',
  `deleted` enum('Yes','No') CHARACTER SET ascii COLLATE ascii_bin NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hpi_db_pages_filter_functions`
--

DROP TABLE IF EXISTS `hpi_db_pages_filter_functions`;
CREATE TABLE IF NOT EXISTS `hpi_db_pages_filter_functions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `human_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hpi_db_pages_pages`
--

DROP TABLE IF EXISTS `hpi_db_pages_pages`;
CREATE TABLE IF NOT EXISTS `hpi_db_pages_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hpi_db_pages_sections`
--

DROP TABLE IF EXISTS `hpi_db_pages_sections`;
CREATE TABLE IF NOT EXISTS `hpi_db_pages_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hpi_db_pages_texts`
--

DROP TABLE IF EXISTS `hpi_db_pages_texts`;
CREATE TABLE IF NOT EXISTS `hpi_db_pages_texts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `checksum` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `filter_function_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hpi_db_pages_text_section_links`
--

DROP TABLE IF EXISTS `hpi_db_pages_text_section_links`;
CREATE TABLE IF NOT EXISTS `hpi_db_pages_text_section_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text_id` int(10) unsigned NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hpi_mailing_list_people`
--

DROP TABLE IF EXISTS `hpi_mailing_list_people`;
CREATE TABLE IF NOT EXISTS `hpi_mailing_list_people` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `added` datetime NOT NULL,
  `status` enum('new','moderation','spam','accepted') CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL DEFAULT 'new',
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hpi_navigation_nodes`
--

DROP TABLE IF EXISTS `hpi_navigation_nodes`;
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

-- --------------------------------------------------------

--
-- Table structure for table `hpi_navigation_trees`
--

DROP TABLE IF EXISTS `hpi_navigation_trees`;
CREATE TABLE IF NOT EXISTS `hpi_navigation_trees` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `added` datetime NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hpi_navigation_urls`
--

DROP TABLE IF EXISTS `hpi_navigation_urls`;
CREATE TABLE IF NOT EXISTS `hpi_navigation_urls` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `href` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `href` (`href`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hpi_news_items`
--

DROP TABLE IF EXISTS `hpi_news_items`;
CREATE TABLE IF NOT EXISTS `hpi_news_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `submitted` datetime NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oedipus_acts`
--

DROP TABLE IF EXISTS `oedipus_acts`;
CREATE TABLE IF NOT EXISTS `oedipus_acts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `added` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `drama_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oedipus_dramas`
--

DROP TABLE IF EXISTS `oedipus_dramas`;
CREATE TABLE IF NOT EXISTS `oedipus_dramas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `unique_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `added` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `created_by_user_id` int(10) unsigned NOT NULL,
  `status` enum('private','public') NOT NULL DEFAULT 'private',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_name` (`unique_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oedipus_frame_to_note_links`
--

DROP TABLE IF EXISTS `oedipus_frame_to_note_links`;
CREATE TABLE IF NOT EXISTS `oedipus_frame_to_note_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `frame_id` int(10) unsigned NOT NULL,
  `note_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oedipus_frame_trees`
--

DROP TABLE IF EXISTS `oedipus_frame_trees`;
CREATE TABLE IF NOT EXISTS `oedipus_frame_trees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_frame_id` int(10) unsigned NOT NULL,
  `lft` int(10) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `scene_id` int(10) unsigned NOT NULL,
  `frame_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oedipus_notes`
--

DROP TABLE IF EXISTS `oedipus_notes`;
CREATE TABLE IF NOT EXISTS `oedipus_notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `added` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `note_text` text CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oedipus_options`
--

DROP TABLE IF EXISTS `oedipus_options`;
CREATE TABLE IF NOT EXISTS `oedipus_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `added` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `character_id` int(10) unsigned NOT NULL,
  `stated_intention_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oedipus_positions`
--

DROP TABLE IF EXISTS `oedipus_positions`;
CREATE TABLE IF NOT EXISTS `oedipus_positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `doubt` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `option_id` int(10) unsigned NOT NULL,
  `character_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oedipus_scenes`
--

DROP TABLE IF EXISTS `oedipus_scenes`;
CREATE TABLE IF NOT EXISTS `oedipus_scenes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `added` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `act_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oedipus_scene_to_note_links`
--

DROP TABLE IF EXISTS `oedipus_scene_to_note_links`;
CREATE TABLE IF NOT EXISTS `oedipus_scene_to_note_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `scene_id` int(10) unsigned NOT NULL,
  `note_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oedipus_stated_intentions`
--

DROP TABLE IF EXISTS `oedipus_stated_intentions`;
CREATE TABLE IF NOT EXISTS `oedipus_stated_intentions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `doubt` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oedipus_users`
--

DROP TABLE IF EXISTS `oedipus_users`;
CREATE TABLE IF NOT EXISTS `oedipus_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `joined` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `last_logged_in` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oedipus_users_allowed_to_view_drama_links`
--

DROP TABLE IF EXISTS `oedipus_users_allowed_to_view_drama_links`;
CREATE TABLE IF NOT EXISTS `oedipus_users_allowed_to_view_drama_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `drama_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oedipus_frames`
--

DROP TABLE IF EXISTS `oedipus_characters`;
DROP TABLE IF EXISTS `oedipus_frames`;

CREATE TABLE IF NOT EXISTS `oedipus_frames` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `added` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `scene_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oedipus_characters`
--

CREATE TABLE IF NOT EXISTS `oedipus_characters` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`added` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`color` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`frame_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
	, INDEX frame_id (frame_id)
	, FOREIGN KEY (frame_id) REFERENCES oedipus_frames(id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

