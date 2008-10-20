-- 
-- Table structure for table `oedipus_acts`
-- 

CREATE TABLE `oedipus_acts` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `added` varchar(255) character set utf8 collate utf8_roman_ci NOT NULL,
  `name` varchar(255) character set utf8 collate utf8_roman_ci NOT NULL,
  `drama_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

