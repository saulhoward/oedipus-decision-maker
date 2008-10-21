-- 
-- Table structure for frame `oedipus_frames`
-- 

CREATE TABLE `oedipus_frames` (
  `id` int(11) NOT NULL auto_increment,
  `added` varchar(255) character set utf8 collate utf8_roman_ci NOT NULL,
  `scene_id` int(11) NOT NULL,
  `name` varchar(255) character set utf8 collate utf8_roman_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ;

