-- The create script for the database of ODM
-- (c) Robert Impey, 2010-08-22

DROP TABLE IF EXISTS `oedipus_users_allowed_to_view_drama_links`;

DROP TABLE IF EXISTS `oedipus_frame_to_note_links`;
DROP TABLE IF EXISTS `oedipus_scene_to_note_links`;
DROP TABLE IF EXISTS `oedipus_notes`;

DROP TABLE IF EXISTS `oedipus_frame_trees`;

DROP TABLE IF EXISTS `oedipus_positions`;
DROP TABLE IF EXISTS `oedipus_options`;
DROP TABLE IF EXISTS `oedipus_stated_intentions`;

DROP TABLE IF EXISTS `oedipus_characters`;
DROP TABLE IF EXISTS `oedipus_frames`;
DROP TABLE IF EXISTS `oedipus_scenes`;
DROP TABLE IF EXISTS `oedipus_acts`;
DROP TABLE IF EXISTS `oedipus_dramas`;
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

CREATE TABLE IF NOT EXISTS `oedipus_dramas` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`unique_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`added` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`created_by_user_id` int(10) unsigned NOT NULL,
	`status` enum('private','public') NOT NULL DEFAULT 'private',
	PRIMARY KEY (`id`),
	UNIQUE KEY `unique_name` (`unique_name`)
	, INDEX created_by_user_id (created_by_user_id)
	, FOREIGN KEY (created_by_user_id) REFERENCES oedipus_users(id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `oedipus_acts` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`added` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`drama_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
	, INDEX drama_id (drama_id)
	, FOREIGN KEY (drama_id) REFERENCES oedipus_dramas(id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `oedipus_scenes` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`added` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`act_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
	, INDEX act_id (act_id)
	, FOREIGN KEY (act_id) REFERENCES oedipus_acts(id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `oedipus_frames` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`added` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`scene_id` int(10) unsigned NOT NULL,
	`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	PRIMARY KEY (`id`)
	, INDEX scene_id (scene_id)
	, FOREIGN KEY (scene_id) REFERENCES oedipus_scenes(id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

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

CREATE TABLE IF NOT EXISTS `oedipus_stated_intentions` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`position` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`doubt` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `oedipus_options` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`added` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`character_id` int(10) unsigned NOT NULL,
	`stated_intention_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
	, INDEX character_id (character_id)
	, FOREIGN KEY (character_id) REFERENCES oedipus_characters(id)
	, INDEX stated_intention_id (stated_intention_id)
	, FOREIGN KEY (stated_intention_id) REFERENCES oedipus_stated_intentions(id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `oedipus_positions` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`position` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`doubt` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`option_id` int(10) unsigned NOT NULL,
	`character_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
	, INDEX option_id (option_id)
	, FOREIGN KEY (option_id) REFERENCES oedipus_options(id)
	, INDEX character_id (character_id)
	, FOREIGN KEY (character_id) REFERENCES oedipus_characters(id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `oedipus_users_allowed_to_view_drama_links` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(10) unsigned NOT NULL,
	`drama_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
	, INDEX user_id (user_id)
	, FOREIGN KEY (user_id) REFERENCES oedipus_users(id)
	, INDEX drama_id (drama_id)
	, FOREIGN KEY (drama_id) REFERENCES oedipus_dramas(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# The data in this table is duplicated.
# The sort order of frames within a scene should be stored as part of the
# frame.
CREATE TABLE IF NOT EXISTS `oedipus_frame_trees` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`parent_frame_id` int(10) unsigned NOT NULL,
	`lft` int(10) unsigned NOT NULL,
	`rgt` int(10) unsigned NOT NULL,
	`scene_id` int(10) unsigned NOT NULL,
	`frame_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

# This looks like a one-true look up table
# http://www.projectdmx.com/dbdesign/lookup.aspx
# Let's move these to the relevant tables as nullable fields.
CREATE TABLE IF NOT EXISTS `oedipus_notes` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`added` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	`note_text` text CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `oedipus_frame_to_note_links` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`frame_id` int(10) unsigned NOT NULL,
	`note_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `oedipus_scene_to_note_links` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`scene_id` int(10) unsigned NOT NULL,
	`note_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

