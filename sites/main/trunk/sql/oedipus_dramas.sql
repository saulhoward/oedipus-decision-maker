CREATE TABLE `oedipus_dramas` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) character set utf8 collate utf8_roman_ci NOT NULL,
  `unique_name` varchar(255) character set utf8 collate utf8_roman_ci NOT NULL,
  `added` varchar(255) character set utf8 collate utf8_roman_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `unique_name` (`unique_name`)
) ENGINE=MyISAM  ;
