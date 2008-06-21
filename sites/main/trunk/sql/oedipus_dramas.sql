-- 
-- Table structure for table `oedipus_dramas`
-- 

CREATE TABLE `oedipus_dramas` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) character set utf8 collate utf8_roman_ci NOT NULL,
  `unique_name` varchar(255) character set utf8 collate utf8_roman_ci NOT NULL,
  `added` varchar(255) character set utf8 collate utf8_roman_ci NOT NULL,
  `created_by_user_id` int(10) unsigned NOT NULL,
  `status` enum('private','public') NOT NULL default 'private',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `unique_name` (`unique_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;

