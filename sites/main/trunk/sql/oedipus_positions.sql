CREATE TABLE `oedipus_positions` (
`id` INT( 10 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`position` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL ,
`doubt` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL ,
`option_id` INT( 10 ) UNSIGNED NOT NULL
) ENGINE = MYISAM ;

