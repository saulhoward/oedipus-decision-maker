CREATE TABLE `oedipus_users_allowed_to_view_drama_links` (
`id` INT( 10 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`user_id` INT( 10 ) UNSIGNED NOT NULL ,
`drama_id` INT( 10 ) UNSIGNED NOT NULL
) ENGINE = MYISAM ;

