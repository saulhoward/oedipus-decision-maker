-- 
-- Table structure for table `oedipus_notes`
-- 

CREATE TABLE `oedipus_notes` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `added` varchar(255) character set utf8 collate utf8_roman_ci NOT NULL,
  `note_text` text character set utf8 collate utf8_roman_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

