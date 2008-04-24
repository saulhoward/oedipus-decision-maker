CREATE TABLE `oedipus_positions` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `position` varchar(255) character set utf8 collate utf8_roman_ci NOT NULL,
  `doubt` varchar(255) character set utf8 collate utf8_roman_ci NOT NULL,
  `option_id` int(10) unsigned NOT NULL,
  `actor_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

