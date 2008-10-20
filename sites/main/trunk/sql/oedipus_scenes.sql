-- 
-- Table structure for table `oedipus_scenes`
-- 

CREATE TABLE `oedipus_scenes` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) character set utf8 collate utf8_roman_ci NOT NULL,
  `added` varchar(255) character set utf8 collate utf8_roman_ci NOT NULL,
  `act_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

