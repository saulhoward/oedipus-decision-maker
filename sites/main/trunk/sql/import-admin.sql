TRUNCATE TABLE hc_admin_users;

-- This user's password is '123456'
INSERT INTO `hc_admin_users` (`id`, `name`, `email`, `password`, `real_name`, `type`) VALUES
(1, 'foo_bar', 'foo.bar@example.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Foo Bar', 'Developer');
