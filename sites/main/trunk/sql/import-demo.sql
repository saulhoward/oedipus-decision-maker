-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 22, 2010 at 09:54 AM
-- Server version: 5.1.50
-- PHP Version: 5.2.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `odm_dev_rob`
--

--
-- Dumping data for table `hc_admin_users`
--

INSERT INTO `hc_admin_users` (`id`, `name`, `email`, `password`, `real_name`, `type`) VALUES
(1, 'foo_bar', 'foo.bar@example.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Foo Bar', 'Developer');

--
-- Dumping data for table `hpi_db_pages_edits`
--

INSERT INTO `hpi_db_pages_edits` (`id`, `page_id`, `text_id`, `submitted`, `current`, `deleted`) VALUES
(1, 1, 1, '2008-03-30 18:44:20', 'No', 'No'),
(2, 1, 2, '2008-04-02 22:10:47', 'No', 'No'),
(3, 1, 3, '2008-04-02 22:12:13', 'No', 'No'),
(4, 1, 4, '2008-04-02 22:18:52', 'No', 'No'),
(5, 1, 5, '2008-04-02 22:19:59', 'No', 'No'),
(6, 1, 6, '2008-04-06 02:02:01', 'No', 'No'),
(7, 2, 7, '2008-04-06 18:19:40', 'No', 'No'),
(8, 2, 8, '2008-04-06 18:20:40', 'No', 'No'),
(9, 1, 9, '2008-04-06 18:28:12', 'No', 'No'),
(10, 2, 10, '2008-04-06 18:28:23', 'No', 'Yes'),
(11, 1, 11, '2008-04-06 18:43:32', 'No', 'No'),
(12, 3, 12, '2008-04-11 23:24:28', 'No', 'No'),
(13, 3, 13, '2008-04-11 23:29:14', 'No', 'No'),
(14, 3, 14, '2008-04-11 23:30:00', 'No', 'No'),
(15, 3, 15, '2008-04-11 23:30:05', 'Yes', 'No'),
(16, 3, 16, '2008-04-12 03:09:49', 'No', 'Yes'),
(17, 1, 17, '2008-04-24 16:02:12', 'No', 'No'),
(18, 3, 18, '2008-04-24 19:09:15', 'Yes', 'No'),
(19, 1, 19, '2008-04-27 14:19:30', 'Yes', 'No'),
(20, 4, 20, '2008-04-27 14:19:56', 'No', 'No'),
(21, 4, 21, '2008-04-27 14:20:19', 'No', 'Yes'),
(22, 5, 22, '2008-05-05 01:11:14', 'Yes', 'No'),
(23, 6, 23, '2008-05-27 16:46:12', 'No', 'No'),
(24, 1, 24, '2008-05-29 01:21:39', 'No', 'No'),
(25, 1, 25, '2008-05-29 01:28:06', 'No', 'No'),
(26, 1, 26, '2008-05-29 01:28:47', 'Yes', 'No'),
(27, 6, 27, '2008-06-10 00:40:45', 'No', 'No'),
(28, 6, 28, '2008-06-10 00:41:53', 'No', 'No'),
(29, 6, 29, '2008-06-10 00:44:45', 'No', 'No'),
(30, 6, 30, '2008-06-10 00:50:02', 'Yes', 'No'),
(31, 4, 31, '2008-06-14 23:53:50', 'Yes', 'No'),
(32, 4, 32, '2008-06-14 23:54:36', 'Yes', 'No'),
(33, 7, 33, '2008-06-15 00:26:18', 'Yes', 'No'),
(34, 4, 34, '2008-06-15 02:41:00', 'Yes', 'No'),
(35, 8, 35, '2008-11-03 15:10:10', 'Yes', 'No'),
(36, 8, 36, '2008-11-03 15:10:56', 'Yes', 'No'),
(37, 8, 37, '2008-11-03 15:11:11', 'Yes', 'No');

--
-- Dumping data for table `hpi_db_pages_filter_functions`
--

INSERT INTO `hpi_db_pages_filter_functions` (`id`, `name`, `human_name`) VALUES
(1, 'DBPages_FilterHelper::blank_line_delimited_paragraphs', 'Blank Line Delimited Paragraphs'),
(2, 'stripcslashes', 'Strip Slashes');

--
-- Dumping data for table `hpi_db_pages_pages`
--

INSERT INTO `hpi_db_pages_pages` (`id`, `name`) VALUES
(1, 'home'),
(2, 'table-creator'),
(3, 'drama-editor'),
(4, 'drama'),
(5, 'table-editor'),
(6, 'all'),
(7, 'my-dramas'),
(8, 'edit-frame');

--
-- Dumping data for table `hpi_db_pages_sections`
--

INSERT INTO `hpi_db_pages_sections` (`id`, `name`) VALUES
(1, 'content'),
(2, 'instructions'),
(3, 'title'),
(4, 'no-drama-set'),
(5, 'footer'),
(6, 'welcome'),
(7, 'drama-unavailable'),
(8, 'no-frame-set');

--
-- Dumping data for table `hpi_db_pages_texts`
--

INSERT INTO `hpi_db_pages_texts` (`id`, `text`, `checksum`, `filter_function_id`) VALUES
(1, '<h2>Drama Theory for Making Decisions</h2>', '4ab32feac3a4da1dc50909cc03369c48', 1),
(2, '<h2>Drama Theory for Making Decisions</h2>\r\n\r\nExample Oedipus Table HTML:\r\n\r\n		<table>\r\n			<caption>\r\n				Drama Theory Example Table\r\n			</caption>\r\n\r\n			<!-- colgroup defines columns for css -->\r\n			<colgroup class=\\"options-column\\" span=\\"1\\">\r\n			</colgroup>\r\n			<colgroup class=\\"actor-column\\" id=\\"actor1\\" span=\\"1\\">\r\n			</colgroup>\r\n\r\n			<thead>\r\n				<tr>\r\n					<th>\r\n					</th>\r\n					<th>\r\n						Actor 1\r\n					</th>\r\n					<th>\r\n						Actor 2\r\n					</th>\r\n				</tr>\r\n			</thead>\r\n			<tbody>\r\n				<tr>\r\n					<th>\r\n						Actor 1\r\n					</th>\r\n					<td>\r\n					</td>\r\n					<td>\r\n					</td>\r\n					<td>\r\n					</td>\r\n					<td>\r\n					</td>\r\n				</tr>	\r\n				<tr>\r\n					<th>\r\n						option 1	\r\n					</th>\r\n					<td>\r\n						<a href=\\"#\\" class=\\"position-card\\" id=\\"actor1-option1\\">0</a>\r\n					</td>\r\n					<td>\r\n						<a href=\\"#\\" class=\\"position-card\\" id=\\"actor2-option1\\">1</a>\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<th>\r\n						option 2	\r\n					</th>\r\n					<td>\r\n						<a href=\\"#\\" class=\\"position-card\\" id=\\"actor1-option2\\">0</a>\r\n					</td>\r\n					<td>\r\n						<a href=\\"#\\" class=\\"position-card\\" id=\\"actor2-option2\\">1</a>\r\n					</td>\r\n				</tr>\r\n			</tbody>\r\n			<tfoot>\r\n				<tr>\r\n					<td>\r\n					</td>\r\n\r\n					<td>\r\n					</td>\r\n\r\n					<td>\r\n					</td>\r\n\r\n					<td>\r\n					</td>\r\n				</tr>\r\n			</tfoot>\r\n		</table>', '3acf2690111657275bd919cc525db2cd', 1),
(3, '<h2>Drama Theory for Making Decisions</h2>\r\n\r\nExample Oedipus Table HTML:\r\n\r\n		<table>\r\n			<caption>\r\n				Drama Theory Example Table\r\n			</caption>\r\n\r\n			<!-- colgroup defines columns for css -->\r\n			<colgroup class=\\"options-column\\" span=\\"1\\">\r\n			</colgroup>\r\n			<colgroup class=\\"actor-column\\" id=\\"actor1\\" span=\\"1\\">\r\n			</colgroup>\r\n\r\n			<thead>\r\n				<tr>\r\n					<th>\r\n					</th>\r\n					<th>\r\n						Actor 1\r\n					</th>\r\n					<th>\r\n						Actor 2\r\n					</th>\r\n				</tr>\r\n			</thead>\r\n			<tbody>\r\n				<tr>\r\n					<th>\r\n						Actor 1\r\n					</th>\r\n					<td>\r\n					</td>\r\n					<td>\r\n					</td>\r\n					<td>\r\n					</td>\r\n					<td>\r\n					</td>\r\n				</tr>	\r\n				<tr>\r\n					<th>\r\n						option 1	\r\n					</th>\r\n					<td>\r\n						<a href=\\"#\\" class=\\"position-card\\" id=\\"actor1-option1\\">0</a>\r\n					</td>\r\n					<td>\r\n						<a href=\\"#\\" class=\\"position-card\\" id=\\"actor2-option1\\">1</a>\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<th>\r\n						option 2	\r\n					</th>\r\n					<td>\r\n						<a href=\\"#\\" class=\\"position-card\\" id=\\"actor1-option2\\">0</a>\r\n					</td>\r\n					<td>\r\n						<a href=\\"#\\" class=\\"position-card\\" id=\\"actor2-option2\\">1</a>\r\n					</td>\r\n				</tr>\r\n			</tbody>\r\n			<tfoot>\r\n				<tr>\r\n					<td>\r\n					</td>\r\n\r\n					<td>\r\n					</td>\r\n\r\n					<td>\r\n					</td>\r\n\r\n					<td>\r\n					</td>\r\n				</tr>\r\n			</tfoot>\r\n		</table>', '3acf2690111657275bd919cc525db2cd', 2),
(4, '<h2>Drama Theory for Making Decisions</h2>\r\n\r\n<a href=/Oedipus_ExampleTablePage\\">Example Table</a>', 'bd6357efc474370a0434f1064b33bc4e', 1),
(5, '<h2>Drama Theory for Making Decisions</h2>\r\n\r\n<a href=\\"/Oedipus_ExampleTablePage\\">Example Table</a>', 'e4f657dbe91c631ab5f81bb308f79e6f', 1),
(6, '<h2>Drama Theory for Making Decisions</h2>\r\n\r\n<ul><li><a href=\\"/Oedipus_TableCreatorPage\\">Table Creator</a></li><li><a href=\\"/Oedipus_ExampleTablePage\\">Example Table HTML, depreciated</a></li></ul>', '1408dbe171a75b7c0e31e53d86d39cac', 1),
(7, '<h2>Make a Drama</h2>\r\n\r\nThis is the table creator, it creates a table from the $_GET. Possible colors are: red, green, blue, orange. Need to be able to add/delete actors/options.\r\n\r\n<a href=\\"http://dev.odm.saul.vafan.clearlinewebdesign.com/?oo-page=1&page-class=Oedipus_TableCreatorPage&table_values=1&table_name=Example%20Drama%20Theoretic%20Oedipus%20Table&actor_name-1=Ryu&actor_color-1=red&actor-1-option_name-1=smoke%20weed&actor-1-option_name-2=learn%20kung%20fu&actor_name-2=Ganja%20Master&actor-2-option_name-1=dance&actor-2-option_name-2=smoke%20weed&&actor-2-no_of_options=2&actor_color-2=green&actor-1-no_of_options=2&no_of_actors=3&actor_name-3=Crazy%20Old%20Man&actor_color-3=blue\\">Example bigger table</a>', '32b64be248c3d59ba9c3dc742933550d', 1),
(8, '<h2>Make a Drama</h2>\r\n\r\nThis is the table creator, it creates a table from the $_GET. Possible colors are: red, green, blue, orange. Need to be able to add/delete actors/options.\r\n\r\n<ul>\r\n<li><a href=\\"http://dev.odm.saul.vafan.clearlinewebdesign.com/?oo-page=1&page-class=Oedipus_TableCreatorPage&table_values=1&table_name=Example%20Drama%20Theoretic%20Oedipus%20Table&actor_name-1=Ryu&actor_color-1=red&actor-1-option_name-1=smoke%20weed&actor-1-option_name-2=learn%20kung%20fu&actor_name-2=Ganja%20Master&actor-2-option_name-1=dance&actor-2-option_name-2=smoke%20weed&&actor-2-no_of_options=2&actor_color-2=green&actor-1-no_of_options=2&no_of_actors=3&actor_name-3=Crazy%20Old%20Man&actor_color-3=blue\\">Example bigger table</a></li><li><a href=\\"/Oedipus_TableCreatorPage\\">Default</a></li></ul>', '80a3b3f3aa70ebd2acb5a2df20b5b956', 1),
(9, '<h2>Drama Theory for Making Decisions</h2>\r\n\r\n<ul class=\\"links\\"><li><a href=\\"/Oedipus_TableCreatorPage\\">Table Creator</a></li><li><a href=\\"/Oedipus_ExampleTablePage\\">Example Table HTML, depreciated</a></li></ul>', '60f71158af40adc28c25a65dc393eba7', 1),
(10, '<h2>Make a Drama</h2>\r\n\r\nThis is the table creator, it creates a table from the $_GET. Possible colors are: red, green, blue, orange. Need to be able to add/delete actors/options.\r\n\r\n<ul class=\\"links\\">\r\n<li><a href=\\"http://dev.odm.saul.vafan.clearlinewebdesign.com/?oo-page=1&page-class=Oedipus_TableCreatorPage&table_values=1&table_name=Example%20Drama%20Theoretic%20Oedipus%20Table&actor_name-1=Ryu&actor_color-1=red&actor-1-option_name-1=smoke%20weed&actor-1-option_name-2=learn%20kung%20fu&actor_name-2=Ganja%20Master&actor-2-option_name-1=dance&actor-2-option_name-2=smoke%20weed&&actor-2-no_of_options=2&actor_color-2=green&actor-1-no_of_options=2&no_of_actors=3&actor_name-3=Crazy%20Old%20Man&actor_color-3=blue\\">Example bigger table</a></li><li><a href=\\"/Oedipus_TableCreatorPage\\">Default</a></li></ul>', 'c51e7c6f81d4ba4508fb92298acace42', 1),
(11, '<h2>Drama Theory for Making Decisions</h2>\r\n\r\n<ul class=\\"links\\"><li><a href=\\"/Oedipus_TableCreatorPage\\">Table Creator</a></li><li><a href=\\"/Oedipus_ExampleTablePage\\">Example Table HTML, depreciated</a></li><li><a href=\\"http://code.google.com/p/oedipus-decision-maker/\\">Google Code</a></li><li><a href=\\"http://groups.google.com/group/oedipus-decision-maker-discuss\\">Google Group</a></li></ul>', 'c057ded1fd834ae920faa09ac698af7a', 1),
(12, '<h2>Drama Editor</h2>', '6c78a89e6c30052d8d1b30fc3cf3c272', 1),
(13, 'Drama Editor', '16b84a045f10bad0e3031a7acc18ed6f', 1),
(14, 'You should make a drama', '415480c98622f0dd20fe3ac1fec4e840', 1),
(15, '<h2>Drama Editor</h2>', '6c78a89e6c30052d8d1b30fc3cf3c272', 1),
(16, 'You should make a drama or edit one of these:', 'b35f973513a80639acfc8fa184e3759e', 1),
(17, '<h2>Drama Theory for Making Decisions</h2>\r\n\r\n<ul class=\\"links\\"><li><a href=\\"/Oedipus_ExampleTablePage\\">Example Table HTML, depreciated</a></li><li><a href=\\"http://code.google.com/p/oedipus-decision-maker/\\">Google Code</a></li><li><a href=\\"http://groups.google.com/group/oedipus-decision-maker-discuss\\">Google Group</a></li></ul>', '8714dde9821aa0a4649d10c84760eb88', 1),
(18, 'No drama set.\r\n\r\nYou should make a new drama or edit one of these:', 'f4958e1571615858d1e20e13e64455a1', 1),
(19, '<h2>Drama Theory for Making Decisions</h2>\r\n\r\n<ul class=\\"links\\"><li><a href=\\"http://code.google.com/p/oedipus-decision-maker/\\">Google Code</a></li><li><a href=\\"http://groups.google.com/group/oedipus-decision-maker-discuss\\">Google Group</a></li></ul>', '4a41cf42e129de1b01ec40e28306a916', 1),
(20, '<h2>All Dramas</h2>', 'e056ad328b6b297dee9dd48f31c0f1e0', 1),
(21, 'Please choose a drama:', '3e357b0093a48e7736c6705d420e3706', 1),
(22, 'Click the icons to change the positions.', '182a07a37791470d4db79441efde3dd3', 1),
(23, 'A <a href=\\"http://haddock-cms.com\\">Haddock CMS</a> site.', '8b9f4d60c833974316c97893b7995a57', 1),
(24, '<ul class=\\"links\\"><li><a href=\\"http://code.google.com/p/oedipus-decision-maker/\\">Google Code</a></li><li><a href=\\"http://groups.google.com/group/oedipus-decision-maker-discuss\\">Google Group</a></li></ul>', 'd130b8949a276876015978277770eb57', 1),
(25, 'Welcome to <em>Oedipus: Decision Maker</em>. This is tool for analysing conflicts and dramas using Drama Theory.', '8a3e07ce1f5a43a431b557ccc03dab06', 1),
(26, 'Welcome to <em>Oedipus: Decision Maker</em>, a tool for analysing conflicts and dramas using Drama Theory.', 'e627c9942ec43effb140d186cb9d49a5', 1),
(27, '<img src=\\"/images/haddock_logo_small_100x45.png\\" alt=\\"Haddock CMS\\" />A <a href=\\"http://haddock-cms.com\\">Haddock CMS</a> site.', '16dd6560d52fdc8d498a9523571d6778', 1),
(28, '<div style=\\"line-height: 45px\\">\r\nA <a href=\\"http://haddock-cms.com\\">Haddock CMS</a> site.\r\n<img src=\\"/images/haddock_logo_small_100x45.png\\" alt=\\"Haddock CMS\\" />\r\n</div>', '60d1d299b3c0e45238f64e02f729c93c', 1),
(29, '<span style=\\"margin: -20px 0;\\">\r\nA <a href=\\"http://haddock-cms.com\\">Haddock CMS</a> site.\r\n</span>\r\n<img src=\\"/images/haddock_logo_small_100x45.png\\" alt=\\"Haddock CMS\\" />', 'a275eae5d35f5170e7bb985e6b83da11', 1),
(30, '<span style=\\"margin: -20px 0;\\">\r\nA <a href=\\"http://haddock-cms.com\\">Haddock CMS</a> site.\r\n</span>\r\n<img src=\\"/images/haddock-logos/haddock_logo_small_75x34.png\\" alt=\\"Haddock CMS\\" />', 'b3ebb1d3d584b188f18504c86ae28d3b', 1),
(31, '<h2>Oedipus Drama</h2>', 'd0a96e98b662d4c8417b1cb3027c2099', 1),
(32, 'This drama is locked.', '1881b3646ed5454afe4cbe2e8e10f696', 1),
(33, '<h2>\r\nMy Dramas\r\n</h2>', 'fbeb37eb17585541ca9922d1427a4a99', 1),
(34, 'No drama set!', '9b33c9876c3d39e95e4164bd6303d679', 1),
(35, 'Click the icons to change the positions.', '182a07a37791470d4db79441efde3dd3', 1),
(36, 'Edit Frame', 'a82282443e8bb834dfc2e0fc15de8522', 1),
(37, 'No Frame Set!', '23e732c0731fe42b374f097257d4938a', 1);

--
-- Dumping data for table `hpi_db_pages_text_section_links`
--

INSERT INTO `hpi_db_pages_text_section_links` (`id`, `text_id`, `section_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 2),
(8, 8, 2),
(9, 9, 1),
(10, 10, 2),
(11, 11, 1),
(12, 12, 2),
(13, 13, 3),
(14, 14, 2),
(15, 15, 3),
(16, 16, 2),
(17, 17, 1),
(18, 18, 4),
(19, 19, 1),
(20, 20, 3),
(21, 21, 4),
(22, 22, 2),
(23, 23, 5),
(24, 24, 6),
(25, 25, 6),
(26, 26, 6),
(27, 27, 5),
(28, 28, 5),
(29, 29, 5),
(30, 30, 5),
(31, 31, 3),
(32, 32, 7),
(33, 33, 3),
(34, 34, 4),
(35, 35, 2),
(36, 36, 3),
(37, 37, 8);

--
-- Dumping data for table `hpi_mailing_list_people`
--

INSERT INTO `hpi_mailing_list_people` (`id`, `name`, `email`, `added`, `status`, `sort_order`) VALUES
(1, 'Foo Bar', 'foo.bar@example.com', '2010-08-22 09:51:46', 'new', 1);

--
-- Dumping data for table `hpi_navigation_nodes`
--

INSERT INTO `hpi_navigation_nodes` (`id`, `url_id`, `tree_id`, `parent_id`, `sort_order`, `added`, `open_in_new_window`) VALUES
(1, 1, 3, 0, 4, '2008-03-30 18:54:51', 'No'),
(2, 2, 1, 0, 1, '2008-03-30 18:55:24', 'No'),
(3, 3, 1, 0, 3, '2008-04-05 19:55:51', 'No'),
(6, 6, 1, 0, 2, '2008-04-27 14:18:33', 'No'),
(7, 7, 4, 0, 2, '2008-05-29 01:25:56', 'No'),
(8, 8, 4, 0, 2, '2008-05-29 01:26:04', 'No'),
(9, 9, 4, 0, 3, '2008-10-20 16:51:59', 'No'),
(10, 2, 3, 0, 1, '2008-11-13 02:38:42', 'No'),
(11, 6, 3, 0, 2, '2008-11-13 02:39:03', 'No'),
(12, 10, 3, 0, 3, '2008-11-13 20:48:46', 'No');

--
-- Dumping data for table `hpi_navigation_trees`
--

INSERT INTO `hpi_navigation_trees` (`id`, `added`, `title`) VALUES
(1, '2008-03-30 18:54:38', 'Main Nav'),
(3, '2008-05-27 16:46:48', 'Footer Nav'),
(4, '2008-05-29 01:24:32', 'External Links');

--
-- Dumping data for table `hpi_navigation_urls`
--

INSERT INTO `hpi_navigation_urls` (`id`, `href`, `title`) VALUES
(1, '/mailing-list/sign-up.html', 'Mailing List'),
(2, '/', 'Home'),
(4, '/Oedipus_DramaEditorPage', 'Drama Editor'),
(5, '/Oedipus_TableEditorPage', 'Table Editor'),
(6, '/Oedipus_MyDramasPage', 'My Dramas'),
(7, 'http://code.google.com/p/oedipus-decision-maker/', 'Google Code - Oedipus'),
(8, 'http://groups.google.com/group/oedipus-decision-maker-discuss', 'Google Group - Oedipus'),
(9, 'http://wiki.drama-theory.com', 'Drama Theory Wiki'),
(10, 'http://wiki.drama-theory.com/wiki/Oedipus_Decision_Maker', 'Wiki');

--
-- Dumping data for table `hpi_news_items`
--


--
-- Dumping data for table `oedipus_acts`
--

INSERT INTO `oedipus_acts` (`id`, `added`, `name`, `drama_id`) VALUES
(1, '2008-11-10 22:37:25', 'Act 1', 1),
(2, '2008-11-11 01:02:58', 'Act 1', 2),
(3, '2008-11-11 16:00:44', 'Act 1', 3),
(4, '2008-11-13 14:35:52', 'Act 1', 4),
(5, '2008-11-13 15:48:23', 'Act 1', 5),
(6, '2008-11-13 18:35:39', 'Act 1', 6),
(7, '2008-11-23 03:41:43', 'Act 1', 7),
(8, '2008-11-25 01:02:55', 'Act 1', 8),
(9, '2008-12-21 22:28:48', 'Act 1', 9),
(10, '2008-12-29 17:29:00', 'Act 1', 10),
(11, '2009-05-06 22:57:50', 'Act 1', 11),
(12, '2009-05-17 07:45:56', 'Act 1', 12),
(13, '2010-04-14 09:31:19', 'Act 1', 13),
(14, '2010-08-02 23:28:36', 'Act 1', 14);

--
-- Dumping data for table `oedipus_dramas`
--

INSERT INTO `oedipus_dramas` (`id`, `name`, `unique_name`, `added`, `created_by_user_id`, `status`) VALUES
(1, 'Brighton Wok', 'brightonwok', '2008-11-10 22:37:25', 1, 'private'),
(2, 'Vafan in Venice', 'vafaninvenice', '2008-11-11 01:02:58', 1, 'public'),
(3, 'Espresso Video', 'espressovideo', '2008-11-11 16:00:44', 1, 'private'),
(4, 'Reservoir Dogs', 'reservoirdogs', '2008-11-13 14:35:52', 1, 'public'),
(5, 'tutorial', 'tutorial', '2008-11-13 15:48:23', 1, 'private'),
(6, 'The Nuns and the Vikings', 'thenunsandthevikings', '2008-11-13 18:35:39', 1, 'public'),
(7, 'New Drama', 'newdrama', '2008-11-23 03:41:43', 1, 'private'),
(8, 'The Iliad', 'theiliad', '2008-11-25 01:02:55', 1, 'public'),
(9, 'Empty', 'empty', '2008-12-21 22:28:47', 1, 'private'),
(10, 'Satanism in Hastings', 'satanisminhastings', '2008-12-29 17:29:00', 1, 'private'),
(11, 'ant colony', 'antcolony', '2009-05-06 22:57:50', 1, 'private'),
(12, 'Example Drama', 'exampledrama', '2009-05-17 07:45:56', 1, 'private'),
(13, 'Furies', 'furies', '2010-04-14 09:31:19', 1, 'private'),
(14, 'test', 'test', '2010-08-02 23:28:36', 1, 'private');

--
-- Dumping data for table `oedipus_frame_to_note_links`
--

INSERT INTO `oedipus_frame_to_note_links` (`id`, `frame_id`, `note_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 5, 4),
(5, 6, 5),
(6, 8, 6),
(7, 9, 7),
(8, 10, 8),
(9, 11, 11),
(10, 12, 13),
(11, 13, 14),
(12, 14, 15),
(13, 15, 16),
(14, 16, 17),
(15, 17, 18),
(16, 4, 19),
(17, 18, 20),
(18, 19, 21),
(19, 20, 22),
(20, 21, 24),
(21, 22, 26),
(22, 23, 28),
(23, 24, 30),
(24, 25, 32),
(25, 26, 33),
(26, 27, 35),
(27, 28, 36),
(28, 29, 37),
(29, 30, 38),
(30, 31, 40);

--
-- Dumping data for table `oedipus_frame_trees`
--

INSERT INTO `oedipus_frame_trees` (`id`, `parent_frame_id`, `lft`, `rgt`, `scene_id`, `frame_id`) VALUES
(1, 0, 1, 4, 1, 1),
(2, 1, 2, 3, 1, 2),
(3, 0, 1, 6, 2, 3),
(4, 0, 1, 4, 3, 4),
(5, 0, 1, 2, 4, 5),
(6, 0, 1, 4, 5, 6),
(7, 0, 1, 2, 6, 7),
(8, 0, 1, 6, 7, 8),
(9, 8, 2, 5, 7, 9),
(10, 9, 3, 4, 7, 10),
(11, 0, 1, 4, 8, 11),
(12, 0, 1, 8, 9, 12),
(13, 12, 2, 7, 9, 13),
(14, 13, 3, 6, 9, 14),
(15, 14, 4, 5, 9, 15),
(16, 3, 2, 5, 2, 16),
(17, 16, 3, 4, 2, 17),
(18, 4, 2, 3, 3, 18),
(19, 11, 2, 3, 8, 19),
(20, 6, 2, 3, 5, 20),
(21, 0, 1, 2, 10, 21),
(22, 0, 1, 2, 11, 22),
(23, 0, 1, 2, 12, 23),
(24, 0, 1, 2, 13, 24),
(25, 0, 1, 4, 14, 25),
(26, 25, 2, 3, 14, 26),
(27, 0, 1, 8, 15, 27),
(28, 27, 2, 7, 15, 28),
(29, 28, 3, 6, 15, 29),
(30, 29, 4, 5, 15, 30),
(31, 0, 1, 2, 16, 31);

--
-- Dumping data for table `oedipus_notes`
--

INSERT INTO `oedipus_notes` (`id`, `added`, `note_text`) VALUES
(1, '2008-11-10 22:40:03', 'In this first frame, the Arsonist has burnt down the Pier.'),
(2, '2008-11-11 01:00:05', 'This is a Frame.'),
(3, '2008-11-11 01:07:12', 'At the begining of the story, Vafan wants to revenge himself on Brighton.\r\n\r\nhttp://comics.ganjaboxing.com/?oo-page=1&page-class=GanjaBoxingComics_ComicPage&page_number=1'),
(4, '2008-11-11 16:07:53', 'He is currently renting out BW in his store, and not paying us.\r\n\r\nWe would like to allow him to continue renting it.\r\n\r\nWe would also like him to pay us.\r\n\r\nWe can send customers his way.'),
(5, '2008-11-13 14:36:18', 'Joe is pointing a gun at Mr Orange. His position (column JOE) is that he should shoot Mr Orange (whom he rightly suspects of being a police spy) and no one else should shoot anyone.\r\n\r\nMr White, however, has pulled a gun on Joe and threatened to shoot him if he shoots Mr Orange.'),
(6, '2008-11-13 18:36:19', 'The story takes place at an abbey on the North East coast of England sometime in the seventh or eighth century.\r\n\r\nOne day, the nuns in the abbey see a fleet of Viking ships heading towards the shore.\r\n\r\nThe "option":http://wiki.drama-theory.com/wiki/Option the Vikings have is to rape the nuns. They hold this "position":http://wiki.drama-theory.com/wiki/Position and the nuns strongly take the opposite position.\r\n\r\nThe "stated intention":http://wiki.drama-theory.com/wiki/Stated_Intention of the Vikings is to rape the nuns. The nuns do not doubt this intention and that their position will be flouted. If the positions of the parties do not match and the stated intention of one party is not doubted, there is a "Persuasion Dilemma":http://wiki.drama-theory.com/wiki/Persuasion_Dilemma . To eliminate a persuasion dilemma, one can either do nothing or act creatively to persuade the other party to give up their position. '),
(7, '2008-11-13 18:38:59', 'The "stated intention":http://wiki.drama-theory.com/wiki/Stated_Intention of the Vikings is to rape the nuns. The nuns do not doubt this intention and that their position will be flouted. If the positions of the parties do not match and the stated intention of one party is not doubted, there is a "Persuasion Dilemma":http://wiki.drama-theory.com/wiki/Persuasion_Dilemma . To eliminate a persuasion dilemma, one can either do nothing or act creatively to persuade the other party to give up their position. \r\n\r\nThe nuns achieve this by cutting off their noses to make themselves ugly. Legend has it that this is the origin of the phrase ''to cut off your nose to spite your face''.\r\n\r\nWhen the Vikings arrive at the abbey, they find the horrifically mutilated nuns and give up their option of raping them.\r\n\r\nIn this frame, notice the option of the nuns to cut off their noses - the nuns took this position but the vikings did not. The stated intention has been irreversibly taken. The Vikings now also have a persuasion dilemma as their position has been flouted and the stated intention of the nuns is more than credible as the option has already been taken. '),
(8, '2008-11-13 18:42:18', 'In this frame the option of the nuns to cut off their noses, the nuns took this position but the vikings did not. The stated intention has been irreversibly taken. The Vikings now also have a persuasion dilemma as their position has been flouted and the stated intention of the nuns is more than credible as the option has already been taken.\r\n\r\nThe Vikings have a special type of persuasion dilemma . The cannot change the past so they want to persuade the nuns to regret their action. They take revenge by burning the abbey to the ground with all the nuns inside. '),
(9, '2008-11-20 15:11:08', 'h3. The Nuns and the Vikings\r\n\r\n* "Wiki Entry on Nuns and Vikings":http://wiki.drama-theory.com/wiki/Story_of_the_Nuns_and_the_Vikings\r\n\r\nA short drama that illustrates the Persuasion Dilemma. Start with the first frame ''The Vikings are coming''.\r\n\r\n# "The Vikings are coming":http://beta.oedipus.drama-theory.com/?oo-page=1&page-class=Oedipus_DramaPage&drama_id=6&frame_id=8\r\n# "The Nuns strike back":http://beta.oedipus.drama-theory.com/?oo-page=1&page-class=Oedipus_DramaPage&drama_id=6&frame_id=9\r\n# "The Vikings revenge":http://beta.oedipus.drama-theory.com/?oo-page=1&page-class=Oedipus_DramaPage&drama_id=6&frame_id=10'),
(10, '2008-11-23 03:41:43', 'h3. Notes on this Scene\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nClick on the *First Frame* to start editing this Scene.'),
(11, '2008-11-23 03:41:43', 'Boy lives at home with parents, sister.\r\n\r\nSome drama at home to start with.\r\n\r\nGipsies come to the town.\r\n\r\n'),
(12, '2008-11-25 01:02:55', 'Sing, O goddess, the anger of Achilles son of Peleus, that brought countless ills upon the Achaeans. Many a brave soul did it send hurrying down to Hades, and many a hero did it yield a prey to dogs and vultures, for so were the counsels of Jove fulfilled from the day on which the son of Atreus, king of men, and great Achilles, first fell out with one another.\r\n\r\nAnd which of the gods was it that set them on to quarrel? It was the son of Jove and Leto; for he was angry with the king and sent a pestilence upon the host to plague the people, because the son of Atreus had dishonoured Chryses his priest. '),
(13, '2008-11-25 01:02:55', 'Now Chryses had come to the ships of the Achaeans to free his daughter, and had brought with him a great ransom: moreover he bore in his hand the sceptre of Apollo wreathed with a suppliant''s wreath and he besought the Achaeans, but most of all the two sons of Atreus, who were their chiefs.\r\n\r\n"Sons of Atreus," he cried, "and all other Achaeans, may the gods who dwell in Olympus grant you to sack the city of Priam, and to reach your homes in safety; but free my daughter, and accept a ransom for her, in reverence to Apollo, son of Jove."\r\n\r\nOn this the rest of the Achaeans with one voice were for respecting the priest and taking the ransom that he offered; but not so Agamemnon, who spoke fiercely to him and sent him roughly away. "Old man," said he, "let me not find you tarrying about our ships, nor yet coming hereafter. Your sceptre of the god and your wreath shall profit you nothing. I will not free her. She shall grow old in my house at Argos far from her own home, busying herself with her loom and visiting my couch; so go, and do not provoke me or it shall be the worse for you." '),
(14, '2008-11-25 01:14:51', 'The old man feared him and obeyed. Not a word he spoke, but went by the shore of the sounding sea and prayed apart to King Apollo whom lovely Leto had borne. "Hear me," he cried, "O god of the silver bow, that protectest Chryse and holy Cilla and rulest Tenedos with thy might, hear me oh thou of Sminthe. If I have ever decked your temple with garlands, or burned your thigh-bones in fat of bulls or goats, grant my prayer, and let your arrows avenge these my tears upon the Danaans."\r\n\r\nThus did he pray, and Apollo heard his prayer. He came down furious from the summits of Olympus, with his bow and his quiver upon his shoulder, and the arrows rattled on his back with the rage that trembled within him. He sat himself down away from the ships with a face as dark as night, and his silver bow rang death as he shot his arrow in the midst of them. First he smote their mules and their hounds, but presently he aimed his shafts at the people themselves, and all day long the pyres of the dead were burning.\r\n\r\nFor nine whole days he shot his arrows among the people, but upon the tenth day Achilles called them in assembly- moved thereto by Juno, who saw the Achaeans in their death-throes and had compassion upon them. Then, when they were got together, he rose and spoke among them.\r\n\r\n"Son of Atreus," said he, "I deem that we should now turn roving home if we would escape destruction, for we are being cut down by war and pestilence at once. Let us ask some priest or prophet, or some reader of dreams (for dreams, too, are of Jove) who can tell us why Phoebus Apollo is so angry, and say whether it is for some vow that we have broken, or hecatomb that we have not offered, and whether he will accept the savour of lambs and goats without blemish, so as to take away the plague from us." '),
(15, '2008-11-25 01:25:23', '\r\nWith these words he sat down, and Calchas son of Thestor, wisest of augurs, who knew things past present and to come, rose to speak. He it was who had guided the Achaeans with their fleet to Ilius, through the prophesyings with which Phoebus Apollo had inspired him. With all sincerity and goodwill he addressed them thus:-\r\n\r\n"Achilles, loved of heaven, you bid me tell you about the anger of King Apollo, I will therefore do so; but consider first and swear that you will stand by me heartily in word and deed, for I know that I shall offend one who rules the Argives with might, to whom all the Achaeans are in subjection. A plain man cannot stand against the anger of a king, who if he swallow his displeasure now, will yet nurse revenge till he has wreaked it. Consider, therefore, whether or no you will protect me."\r\n\r\nAnd Achilles answered, "Fear not, but speak as it is borne in upon you from heaven, for by Apollo, Calchas, to whom you pray, and whose oracles you reveal to us, not a Danaan at our ships shall lay his hand upon you, while I yet live to look upon the face of the earth- no, not though you name Agamemnon himself, who is by far the foremost of the Achaeans."\r\n\r\nThereon the seer spoke boldly. "The god," he said, "is angry neither about vow nor hecatomb, but for his priest''s sake, whom Agamemnon has dishonoured, in that he would not free his daughter nor take a ransom for her; therefore has he sent these evils upon us, and will yet send others. He will not deliver the Danaans from this pestilence till Agamemnon has restored the girl without fee or ransom to her father, and has sent a holy hecatomb to Chryse. Thus we may perhaps appease him."\r\n\r\nWith these words he sat down, and Agamemnon rose in anger. His heart was black with rage, and his eyes flashed fire as he scowled on Calchas and said, "Seer of evil, you never yet prophesied smooth things concerning me, but have ever loved to foretell that which was evil. You have brought me neither comfort nor performance; and now you come seeing among Danaans, and saying that Apollo has plagued us because I would not take a ransom for this girl, the daughter of Chryses. I have set my heart on keeping her in my own house, for I love her better even than my own wife Clytemnestra, whose peer she is alike in form and feature, in understanding and accomplishments. Still I will give her up if I must, for I would have the people live, not die; but you must find me a prize instead, or I alone among the Argives shall be without one. This is not well; for you behold, all of you, that my prize is to go elsewhither."'),
(16, '2008-11-25 01:34:09', '\r\nAnd Achilles answered, "Most noble son of Atreus, covetous beyond all mankind, how shall the Achaeans find you another prize? We have no common store from which to take one. Those we took from the cities have been awarded; we cannot disallow the awards that have been made already. Give this girl, therefore, to the god, and if ever Jove grants us to sack the city of Troy we will requite you three and fourfold."\r\n\r\nThen Agamemnon said, "Achilles, valiant though you be, you shall not thus outwit me. You shall not overreach and you shall not persuade me. Are you to keep your own prize, while I sit tamely under my loss and give up the girl at your bidding? Let the Achaeans find me a prize in fair exchange to my liking, or I will come and take your own, or that of Ajax or of Ulysses; and he to whomsoever I may come shall rue my coming. But of this we will take thought hereafter; for the present, let us draw a ship into the sea, and find a crew for her expressly; let us put a hecatomb on board, and let us send Chryseis also; further, let some chief man among us be in command, either Ajax, or Idomeneus, or yourself, son of Peleus, mighty warrior that you are, that we may offer sacrifice and appease the the anger of the god."\r\n\r\nAchilles scowled at him and answered, "You are steeped in insolence and lust of gain. With what heart can any of the Achaeans do your bidding, either on foray or in open fighting? I came not warring here for any ill the Trojans had done me. I have no quarrel with them. They have not raided my cattle nor my horses, nor cut down my harvests on the rich plains of Phthia; for between me and them there is a great space, both mountain and sounding sea. We have followed you, Sir Insolence! for your pleasure, not ours- to gain satisfaction from the Trojans for your shameless self and for Menelaus. You forget this, and threaten to rob me of the prize for which I have toiled, and which the sons of the Achaeans have given me. Never when the Achaeans sack any rich city of the Trojans do I receive so good a prize as you do, though it is my hands that do the better part of the fighting. When the sharing comes, your share is far the largest, and I, forsooth, must go back to my ships, take what I can get and be thankful, when my labour of fighting is done. Now, therefore, I shall go back to Phthia; it will be much better for me to return home with my ships, for I will not stay here dishonoured to gather gold and substance for you."\r\n\r\nAnd Agamemnon answered, "Fly if you will, I shall make you no prayers to stay you. I have others here who will do me honour, and above all Jove, the lord of counsel. There is no king here so hateful to me as you are, for you are ever quarrelsome and ill affected. What though you be brave? Was it not heaven that made you so? Go home, then, with your ships and comrades to lord it over the Myrmidons. I care neither for you nor for your anger; and thus will I do: since Phoebus Apollo is taking Chryseis from me, I shall send her with my ship and my followers, but I shall come to your tent and take your own prize Briseis, that you may learn how much stronger I am than you are, and that another may fear to set himself up as equal or comparable with me." '),
(17, '2008-11-30 15:09:56', 'h2. Vafan\r\n\r\nNot trouble, an opportunity, Stronzo! I need your help taking over this town, Brighton. I stole a weapon, the Devils Claw. With it and an army we can rule that place.\r\n\r\nh2. Stronzo\r\n\r\nThe Devil''s Claw is it? \r\n\r\nh2. Vafan\r\n\r\nYeah!\r\n\r\nh2. Stronzo\r\n\r\nFine! Look, I''ve got some business I''ve gotta take care of. Olivetti owes me. Bring your claw and we''ll see.'),
(18, '2008-11-30 15:15:09', '_The Don has Vafs momma. Vaf and Stronzo walk in_\r\n\r\nh3. The Don\r\n\r\nStronzo! Where''s my money? You pay me, or I''m gonna kill your momma.\r\n\r\nh3. Momma\r\n\r\nStronzo! You naughty boy! How did you let this happen?\r\n\r\nh3. Stronzo\r\n\r\nMama, I''m sorry. This is the last time, I promise.\r\n_(To Vafan)_\r\nWe should pay him Vafan. I''ve got the money.\r\n\r\nh3. Vafan\r\n\r\nNo, I''ve got plans for that money. I''ll handle this guy.\r\n\r\n_Vafan Kills some of the Don''s men. One of the biggest smashes him onto the floor._\r\n\r\nh3. Biggest Henchman\r\n\r\nYou don''t know what you''re getting into, boy. You''re gonna wish you paid up!\r\n\r\n_Vaf kills him and everyone_\r\n\r\nh3. The Don\r\n\r\nCome any closer and I''ll hurt her!\r\n\r\n_The Don holds a knife against Mommas cheek_\r\n\r\nh3. Vafan\r\n\r\nOoh... you shouldn''ta done that!\r\n\r\n_Momma knees The Don in the balls, Vaf rushes forward and dispatches him._'),
(19, '2008-11-30 16:16:54', '_Il Padrone walks through the market, with Capra, his goat._\r\n\r\nh3. Capra\r\n\r\nLook Padrone! Cake!\r\n\r\nh3. Padrone\r\n\r\nCapra, you''re getting fat.\r\n\r\n_They see Mario with the goons_\r\n\r\nh3. Goons\r\n\r\nIt''s time. Have you got the money?\r\n\r\nh3. Mario\r\n\r\nNot yet...\r\n\r\nh3. Goons\r\n\r\nOk, we''re gonna beat you up, Mario!\r\n\r\n_Goons beat him up_'),
(20, '2008-11-30 16:21:29', 'h3. Padrone\r\n\r\nLeave that man alone!\r\n\r\nh3. Goon 1\r\n\r\nShut up old man, you don''t see anything, ok?\r\n\r\nh3. Goon 2\r\n\r\nYeah.\r\n\r\n_they continue beating up mario. Suddenly, Padrone is right behind them_\r\n\r\nh3. Padrone\r\n\r\nI said, leave him.\r\n\r\nh3. Goon 1\r\n\r\nI said, Shut Up!\r\n\r\n_He goes to punch Padrone, who trips him and he lands on the floor. Padrone holds his staff to  his neck._\r\n\r\nh3. Padrone\r\n\r\nCome on now. let''s be civilised about this.\r\n\r\n_Goon 2 goes to punch Padrone, who smacks him with his staff, then moves back. Both of the Goons get up and walk forward, pissed off._\r\n\r\nh3. Goon 2\r\n\r\nThat hurt...\r\n\r\nh3. Goon 1\r\n\r\nDo you know who we work for?\r\n\r\n_They run at Padrone, who keeps dodging out the way and giving them taps with his staff so they fall into market stalls. All the stall owners hit them with pans etc._\r\n\r\n_They''re on the floor and Capra is eating Goon 1''s trousers._\r\n\r\nh3. Capra\r\n\r\nWell, it ain''t cake, but...\r\n\r\nh3. Padrone\r\n\r\nI don''t care who you work for. Don''t come near this man again.\r\n\r\n_Turns and walks away_\r\n\r\nh3. Goon 2\r\n\r\nLeave my trousers alone!\r\n\r\nh3. Goon 1\r\n\r\nOk, ok. Who the hell are you anyway?\r\n\r\nh3. Mario\r\n\r\nThat''s the Padrone.\r\n\r\n\r\n'),
(21, '2008-12-15 23:37:31', 'h3. Notes on this Frame\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nUse the panel below to edit characters and options in this Frame.\n\nClick the Coloured Tiles on the Frame to change them, or hover over them to find out what they mean.'),
(22, '2008-12-15 23:51:23', 'At this, Eddie has pulled a gun on Mr White and threatened to shoot him if he shoots Joe.\r\n\r\nIt''s clear, then, that Joe has another option, apart from shooting Mr Orange; it is to shoot Mr White first. He doesn''t, however, threaten this or do it.\r\n\r\nMr White, if he carries out his threat to start shooting, will obviously try to shoot Eddie as well as Joe, since Eddie is threatening him. His position, however, is that no one should shoot anyone - Joe should lower his gun, Eddie his, then he will lower his and they should all leave their hide-out together. His threat is that if this isn''t agreed, he''ll shoot. '),
(23, '2008-12-21 22:28:48', 'h3. Notes on this Scene\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nClick on the *First Frame* to start editing this Scene.'),
(24, '2008-12-21 22:28:48', 'h3. Notes on this Frame\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nUse the panel below to edit characters and options in this Frame.\n\nClick the Coloured Tiles on the Frame to change them, or hover over them to find out what they mean.'),
(25, '2008-12-29 17:29:00', 'h3. Satanism in Hastings\r\n'),
(26, '2008-12-29 17:29:00', 'Good Wizard and Bad Wizard'),
(27, '2009-05-06 22:57:50', 'h3. Notes on this Scene\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nClick on the *First Frame* to start editing this Scene.'),
(28, '2009-05-06 22:57:50', 'h3. Notes on this Frame\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nUse the panel below to edit characters and options in this Frame.\n\nClick the Coloured Tiles on the Frame to change them, or hover over them to find out what they mean.'),
(29, '2009-05-06 22:59:14', 'h3. Notes on this Scene\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nClick on the *First Frame* to start editing this Scene.'),
(30, '2009-05-06 22:59:14', 'h3. Notes on this Frame\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nUse the panel below to edit characters and options in this Frame.\n\nClick the Coloured Tiles on the Frame to change them, or hover over them to find out what they mean.'),
(31, '2009-05-17 07:45:56', 'h3. Notes on this Scene\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nClick on the *First Frame* to start editing this Scene.'),
(32, '2009-05-17 07:45:56', 'h3. Notes on this Frame\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nUse the panel below to edit characters and options in this Frame.\n\nClick the Coloured Tiles on the Frame to change them, or hover over them to find out what they mean.'),
(33, '2009-05-17 07:47:57', 'h3. Notes on this Frame\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nUse the panel below to edit characters and options in this Frame.\n\nClick the Coloured Tiles on the Frame to change them, or hover over them to find out what they mean.'),
(34, '2010-04-14 09:31:19', 'h3. Notes on this Scene\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nClick on the *First Frame* to start editing this Scene.'),
(35, '2010-04-14 09:31:19', 'h3. Notes on this Frame\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nUse the panel below to edit characters and options in this Frame.\n\nClick the Coloured Tiles on the Frame to change them, or hover over them to find out what they mean.'),
(36, '2010-04-14 09:32:37', 'h3. Notes on this Frame\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nUse the panel below to edit characters and options in this Frame.\n\nClick the Coloured Tiles on the Frame to change them, or hover over them to find out what they mean.'),
(37, '2010-04-14 09:32:53', 'h3. Notes on this Frame\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nUse the panel below to edit characters and options in this Frame.\n\nClick the Coloured Tiles on the Frame to change them, or hover over them to find out what they mean.'),
(38, '2010-04-14 09:32:58', 'h3. Notes on this Frame\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nUse the panel below to edit characters and options in this Frame.\n\nClick the Coloured Tiles on the Frame to change them, or hover over them to find out what they mean.'),
(39, '2010-08-02 23:28:36', 'h3. Notes on this Scene\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nClick on the *First Frame* to start editing this Scene.'),
(40, '2010-08-02 23:28:36', 'h3. Notes on this Frame\n\nClick this note to edit it.\n\nYou can use "Textile":http://textile.thresholdstate.com/ markup.\n\nUse the panel below to edit characters and options in this Frame.\n\nClick the Coloured Tiles on the Frame to change them, or hover over them to find out what they mean.');

--
-- Dumping data for table `oedipus_options`
--

INSERT INTO `oedipus_options` (`id`, `added`, `name`, `character_id`, `stated_intention_id`) VALUES
(2, '2008-11-10 22:38:46', 'Burn down Pier', 2, 2),
(3, '2008-11-11 01:00:05', 'First Option', 3, 3),
(4, '2008-11-11 01:02:58', 'Destroy Brighton', 4, 4),
(5, '2008-11-11 01:05:38', 'Respect Vafan', 5, 5),
(6, '2008-11-11 01:18:48', 'pay up', 6, 6),
(8, '2008-11-11 16:04:05', 'Pay CF', 7, 8),
(9, '2008-11-11 16:08:05', 'Send customers to Espresso', 8, 9),
(11, '2008-11-11 16:24:36', 'Allow him to Rent BW', 8, 11),
(12, '2008-11-13 14:35:52', 'Shoot Mr. Orange', 9, 12),
(16, '2008-11-13 15:48:23', 'First Option', 12, 16),
(17, '2008-11-13 18:35:39', 'Rape Nuns', 13, 17),
(18, '2008-11-13 18:38:59', 'Rape Nuns', 15, 18),
(19, '2008-11-13 18:40:25', 'Cut off their own nose', 16, 19),
(20, '2008-11-13 18:42:18', 'Rape Nuns', 17, 20),
(21, '2008-11-13 18:43:21', 'Cut off their own nose', 18, 21),
(22, '2008-11-13 18:43:54', 'Burn the abbey', 17, 22),
(23, '2008-11-23 03:41:43', 'Release Cyrus'' daughter', 19, 23),
(24, '2008-11-25 01:02:55', 'Release Chryses'' daughter', 20, 24),
(25, '2008-11-25 01:14:51', 'Release Chryses'' daughter', 22, 25),
(26, '2008-11-25 01:22:23', 'Smite the Achaeans', 23, 26),
(27, '2008-11-25 01:25:23', 'Release Chryses'' daughter', 24, 27),
(28, '2008-11-25 01:26:50', 'Smite the Achaeans', 25, 28),
(30, '2008-11-25 01:34:09', 'Release Chryses'' daughter', 27, 30),
(31, '2008-11-25 01:35:46', 'Find another prize for Agamemnon', 28, 31),
(33, '2008-11-30 15:10:45', 'Help Vafan', 30, 33),
(34, '2008-11-30 15:11:19', 'Use the claw: kill Olivetti', 29, 34),
(35, '2008-11-30 15:11:36', 'Give Stronzo the Claw', 29, 35),
(38, '2008-11-30 15:15:39', 'Release Momma', 32, 38),
(39, '2008-11-30 15:16:10', 'Pay the Don', 33, 39),
(40, '2008-11-30 15:17:37', 'Kill the don', 31, 40),
(41, '2008-11-30 16:14:03', 'Beat up mario', 34, 41),
(42, '2008-11-30 16:21:29', 'Beat up Mario', 35, 42),
(43, '2008-11-30 16:21:56', 'Beat up Goons', 36, 43),
(44, '2008-12-15 23:37:31', 'Chase Road Runner', 37, 44),
(45, '2008-12-15 23:50:34', 'Shoot Joe', 10, 45),
(46, '2008-12-15 23:51:23', 'Shoot Mr. Orange', 38, 46),
(47, '2008-12-15 23:51:23', 'Shoot Joe first', 39, 47),
(48, '2008-12-15 23:52:00', 'Shoot Mr White', 40, 48),
(49, '2008-12-15 23:58:17', 'Shoot Mr. White first', 38, 49),
(50, '2008-12-21 22:28:48', 'Chase Road Runner', 42, 50),
(51, '2008-12-29 17:29:00', 'Kill all of Her descendants', 43, 51),
(52, '2009-05-06 22:57:50', 'Ignore Biff', 45, 52),
(53, '2009-05-06 22:59:14', 'Chase Road Runner', 47, 53),
(54, '2009-05-06 23:00:06', 'Bully Stan', 46, 54),
(55, '2009-05-17 07:45:56', 'Chase Road Runner', 48, 55),
(56, '2009-05-17 07:47:57', 'Chase Road Runner', 50, 56),
(57, '2009-05-17 07:48:36', 'run away', 51, 57),
(58, '2010-04-14 09:31:19', 'Chase Road Runner', 52, 58),
(59, '2010-04-14 09:32:37', 'Chase Road Runner', 53, 59),
(60, '2010-04-14 09:32:53', 'Chase Road Runner', 54, 60),
(61, '2010-04-14 09:32:58', 'Chase Road Runner', 55, 61),
(62, '2010-04-14 09:34:34', 'New Option', 54, 62),
(63, '2010-04-14 09:34:52', 'New Option', 56, 63),
(64, '2010-08-02 23:28:36', 'Chase Road Runner', 57, 64),
(65, '2010-08-02 23:29:01', 'test', 57, 65);

--
-- Dumping data for table `oedipus_positions`
--

INSERT INTO `oedipus_positions` (`id`, `position`, `doubt`, `option_id`, `character_id`) VALUES
(3, '0', '', 2, 1),
(4, '1', '', 2, 2),
(5, '1', '', 3, 3),
(6, '1', '', 4, 4),
(7, '0', '', 4, 5),
(8, '1', '', 5, 4),
(9, '0', '', 5, 5),
(10, '0', '', 6, 6),
(13, '0', '?', 8, 7),
(14, '1', '', 8, 8),
(15, '1', '', 9, 7),
(16, '1', '?', 9, 8),
(19, '1', '', 11, 7),
(20, '1', '?', 11, 8),
(21, '1', '', 12, 9),
(23, '0', '', 12, 10),
(27, '1', '', 12, 11),
(33, '1', '', 16, 12),
(34, '1', '', 17, 13),
(35, '0', '', 17, 14),
(36, '1', '', 18, 15),
(37, '0', '', 18, 16),
(38, '0', '', 19, 15),
(39, '1', '', 19, 16),
(40, '1', '?', 20, 17),
(41, '0', '', 20, 18),
(42, '0', '', 21, 17),
(43, '1', '', 21, 18),
(44, '1', '', 22, 17),
(45, '0', '', 22, 18),
(46, '0', '', 23, 19),
(47, '0', '', 24, 20),
(48, '1', '', 24, 21),
(49, '0', '', 25, 22),
(50, '1', '', 25, 23),
(51, '0', '', 26, 22),
(52, '1', '', 26, 23),
(53, '1', '', 27, 24),
(54, '1', '', 27, 25),
(55, '0', '', 28, 24),
(56, '1', '?', 28, 25),
(62, '1', '', 30, 27),
(63, '1', '', 30, 28),
(64, '1', '', 31, 27),
(65, '0', '', 31, 28),
(67, '1', '', 33, 29),
(68, '0', '', 33, 30),
(69, '1', '', 34, 29),
(70, '1', '', 34, 30),
(71, '0', '', 35, 29),
(72, '1', '', 35, 30),
(76, '1', '', 38, 31),
(77, '0', '', 38, 32),
(78, '1', '', 38, 33),
(79, '0', '', 39, 31),
(80, '1', '', 39, 32),
(81, '1', '?', 39, 33),
(82, '1', '', 40, 31),
(83, '0', '', 40, 32),
(84, '1', '?', 40, 33),
(85, '1', '', 6, 34),
(86, '0', '', 41, 6),
(87, '1', '', 41, 34),
(88, '1', '', 42, 35),
(89, '0', '', 42, 36),
(90, '0', '', 43, 35),
(91, '1', '', 43, 36),
(92, '1', '', 44, 37),
(93, '1', '', 45, 9),
(94, '1', '', 45, 10),
(95, '0', '', 45, 11),
(96, '1', '', 46, 38),
(97, '0', '', 46, 39),
(98, '1', '', 46, 40),
(99, '0', '', 47, 38),
(100, '1', '', 47, 39),
(101, '0', '', 47, 40),
(102, '1', '', 48, 38),
(103, '0', '', 48, 39),
(104, '1', '', 48, 40),
(105, '0', '', 49, 38),
(106, '0', '', 49, 39),
(107, '0', '', 49, 40),
(108, '1', '', 23, 41),
(109, '1', '', 50, 42),
(110, '1', '', 51, 43),
(111, '0', '', 51, 44),
(112, '1', '', 52, 45),
(113, '1', 'x', 52, 46),
(114, '1', '', 53, 47),
(115, '1', '', 54, 45),
(116, '1', '', 54, 46),
(117, '1', '', 55, 48),
(118, '1', '?', 55, 49),
(119, '1', '', 56, 50),
(120, '1', '', 56, 51),
(121, '1', '', 57, 50),
(122, '1', '', 57, 51),
(123, '1', '', 58, 52),
(124, '1', '', 59, 53),
(125, '1', '?', 60, 54),
(126, '1', '', 61, 55),
(127, '1', '', 60, 56),
(128, '1', '', 62, 54),
(129, '1', '', 62, 56),
(130, '1', '', 63, 54),
(131, '1', '', 63, 56),
(132, '1', '', 64, 57),
(133, '1', '', 65, 57),
(134, '1', '', 64, 58),
(135, '1', '', 65, 58);

--
-- Dumping data for table `oedipus_scenes`
--

INSERT INTO `oedipus_scenes` (`id`, `name`, `added`, `act_id`) VALUES
(1, 'Scene 1', '2008-11-10 22:37:25', 1),
(2, 'Scene 1', '2008-11-11 01:02:58', 2),
(3, 'Scene 2', '2008-11-11 01:18:48', 2),
(4, 'Scene 1', '2008-11-11 16:00:44', 3),
(5, 'Mexican Standoff Finale', '2008-11-13 14:35:52', 4),
(6, 'Scene 1', '2008-11-13 15:48:23', 5),
(7, 'Scene 1', '2008-11-13 18:35:39', 6),
(8, 'Scene 1', '2008-11-23 03:41:43', 7),
(9, 'Scene 1', '2008-11-25 01:02:55', 8),
(10, 'Scene 1', '2008-12-21 22:28:48', 9),
(11, 'Scene 1', '2008-12-29 17:29:00', 10),
(12, 'Scene 1', '2009-05-06 22:57:50', 11),
(13, 'Scene 2', '2009-05-06 22:59:14', 11),
(14, 'Scene 1', '2009-05-17 07:45:56', 12),
(15, 'Scene 1', '2010-04-14 09:31:19', 13),
(16, 'Scene 1', '2010-08-02 23:28:36', 14);

--
-- Dumping data for table `oedipus_scene_to_note_links`
--

INSERT INTO `oedipus_scene_to_note_links` (`id`, `scene_id`, `note_id`) VALUES
(1, 7, 9),
(2, 8, 10),
(3, 9, 12),
(4, 10, 23),
(5, 11, 25),
(6, 12, 27),
(7, 13, 29),
(8, 14, 31),
(9, 15, 34),
(10, 16, 39);

--
-- Dumping data for table `oedipus_stated_intentions`
--

INSERT INTO `oedipus_stated_intentions` (`id`, `position`, `doubt`) VALUES
(1, '1', ''),
(2, '1', ''),
(3, '1', ''),
(4, '1', ''),
(5, '0', ''),
(6, '0', ''),
(7, '1', ''),
(8, '0', ''),
(9, '0', ''),
(10, '0', ''),
(11, '0', '?'),
(12, '1', ''),
(13, '0', ''),
(14, '1', '?'),
(15, '1', ''),
(16, '1', 'x'),
(17, '1', ''),
(18, '1', ''),
(19, '1', ''),
(20, '1', '?'),
(21, '1', ''),
(22, '1', ''),
(23, '0', ''),
(24, '0', ''),
(25, '0', ''),
(26, '1', ''),
(27, '1', ''),
(28, '1', ''),
(29, '1', '?'),
(30, '1', ''),
(31, '0', ''),
(32, '1', ''),
(33, '0', ''),
(34, '1', ''),
(35, '0', ''),
(36, '1', ''),
(37, '1', ''),
(38, '0', ''),
(39, '1', '?'),
(40, '1', ''),
(41, '1', ''),
(42, '1', ''),
(43, '1', ''),
(44, '1', 'x'),
(45, '1', ''),
(46, '1', ''),
(47, '1', ''),
(48, '1', ''),
(49, '0', ''),
(50, '1', ''),
(51, '1', ''),
(52, '1', ''),
(53, '1', ''),
(54, '1', ''),
(55, '1', ''),
(56, '1', ''),
(57, '1', ''),
(58, '1', ''),
(59, '1', ''),
(60, '1', ''),
(61, '1', ''),
(62, '1', ''),
(63, '1', ''),
(64, '1', ''),
(65, '1', '');

--
-- Dumping data for table `oedipus_users`
--

INSERT INTO `oedipus_users` (`id`, `first_name`, `last_name`, `email`, `password`, `joined`, `last_logged_in`) VALUES
(1, 'Foo', 'Bar', 'foo.bar@example.com', 'e10adc3949ba59abbe56e057f20f883e', '2010-08-22 09:51:46', '2010-08-22 09:51:46');

--
-- Dumping data for table `oedipus_frames`
--

INSERT INTO `oedipus_frames` (`id`, `added`, `scene_id`, `name`) VALUES
(1, '2008-11-10 22:37:25', 1, 'Pier on Fire'),
(2, '2008-11-11 01:00:05', 1, 'New Frame'),
(3, '2008-11-11 01:02:58', 2, 'Vafan vs Brighton'),
(4, '2008-11-11 01:18:48', 3, 'First frame'),
(5, '2008-11-11 16:00:44', 4, 'Renting Brighton Wok'),
(6, '2008-11-13 14:35:52', 5, 'Standoff Frame 1'),
(7, '2008-11-13 15:48:23', 6, 'Tutorial'),
(8, '2008-11-13 18:35:39', 7, 'The Vikings are coming'),
(9, '2008-11-13 18:38:59', 7, 'The Nuns strike back'),
(10, '2008-11-13 18:42:18', 7, 'The Vikings revenge'),
(11, '2008-11-23 03:41:43', 8, 'First frame'),
(12, '2008-11-25 01:02:55', 9, 'Chryses comes to Agamemnon'),
(13, '2008-11-25 01:14:51', 9, 'Chryses brings in Apollo'),
(14, '2008-11-25 01:25:23', 9, 'Agamemnon agrees to give her up'),
(15, '2008-11-25 01:34:09', 9, 'Agamemnon wants recompense'),
(16, '2008-11-30 15:09:56', 2, 'Vafan and Stronzo'),
(17, '2008-11-30 15:15:08', 2, 'Vafan and the Don'),
(18, '2008-11-30 16:21:29', 3, 'Padrone beats up the Goons'),
(19, '2008-12-15 23:37:31', 8, 'First frame 1'),
(20, '2008-12-15 23:51:23', 5, 'Standoff Frame 2'),
(21, '2008-12-21 22:28:48', 10, 'Frame 1'),
(22, '2008-12-29 17:29:00', 11, 'Frame 1'),
(23, '2009-05-06 22:57:50', 12, 'Frame 1'),
(24, '2009-05-06 22:59:14', 13, 'First frame'),
(25, '2009-05-17 07:45:56', 14, 'Frame 1'),
(26, '2009-05-17 07:47:57', 14, 'Frame 2'),
(27, '2010-04-14 09:31:19', 15, 'Frame 1'),
(28, '2010-04-14 09:32:37', 15, 'Frame 2'),
(29, '2010-04-14 09:32:53', 15, 'Frame 3'),
(30, '2010-04-14 09:32:58', 15, 'Frame 4'),
(31, '2010-08-02 23:28:36', 16, 'Frame 1');

--
-- Dumping data for table `oedipus_characters`
--

INSERT INTO `oedipus_characters` (`id`, `added`, `name`, `color`, `frame_id`) VALUES
(1, '2008-11-10 22:37:25', 'Citizens of Brighton', 'red', 1),
(2, '2008-11-10 22:38:14', 'Unknown Arsonist', 'orange', 1),
(3, '2008-11-11 01:00:05', 'First Character', 'red', 2),
(4, '2008-11-11 01:02:58', 'Vafan', 'red', 3),
(5, '2008-11-11 01:05:21', 'Ganja Master', 'green', 3),
(6, '2008-11-11 01:18:48', 'Mario', 'red', 4),
(7, '2008-11-11 16:00:44', 'Espresso Guy', 'red', 5),
(8, '2008-11-11 16:03:05', 'Convict Films', 'green', 5),
(9, '2008-11-13 14:35:52', 'Joe', 'red', 6),
(10, '2008-11-13 14:37:02', 'Mr. White', 'green', 6),
(11, '2008-11-13 14:38:24', 'Eddie', 'blue', 6),
(12, '2008-11-13 15:48:23', 'First Character', 'red', 7),
(13, '2008-11-13 18:35:39', 'Vikings', 'red', 8),
(14, '2008-11-13 18:37:30', 'Nuns', 'green', 8),
(15, '2008-11-13 18:38:59', 'Vikings', 'red', 9),
(16, '2008-11-13 18:40:08', 'Nuns', 'green', 9),
(17, '2008-11-13 18:42:18', 'Vikings', 'red', 10),
(18, '2008-11-13 18:43:11', 'Nuns', 'green', 10),
(19, '2008-11-23 03:41:43', 'Boy', 'red', 11),
(20, '2008-11-25 01:02:55', 'Agamemnon', 'red', 12),
(21, '2008-11-25 01:13:40', 'Chryses', 'orange', 12),
(22, '2008-11-25 01:14:51', 'Agamemnon', 'red', 13),
(23, '2008-11-25 01:21:27', 'Apollo', 'blue', 13),
(24, '2008-11-25 01:25:23', 'Agamemnon', 'red', 14),
(25, '2008-11-25 01:26:39', 'Apollo', 'blue', 14),
(27, '2008-11-25 01:34:09', 'Agamemnon', 'red', 15),
(28, '2008-11-25 01:35:31', 'Achilles', 'green', 15),
(29, '2008-11-30 15:09:56', 'Vafan', 'red', 16),
(30, '2008-11-30 15:10:37', 'Stronzo', 'orange', 16),
(31, '2008-11-30 15:15:08', 'Vafan', 'red', 17),
(32, '2008-11-30 15:15:27', 'The Don', 'blue', 17),
(33, '2008-11-30 15:16:04', 'Stronzo', 'orange', 17),
(34, '2008-11-30 16:13:38', 'Goons', 'orange', 4),
(35, '2008-11-30 16:21:29', 'Goons', 'red', 18),
(36, '2008-11-30 16:21:48', 'Padrone', 'green', 18),
(37, '2008-12-15 23:37:31', 'Wile E. Coyote', 'red', 19),
(38, '2008-12-15 23:51:23', 'Joe', 'red', 20),
(39, '2008-12-15 23:51:23', 'Mr. White', 'green', 20),
(40, '2008-12-15 23:51:23', 'Eddie', 'blue', 20),
(41, '2008-12-18 18:00:27', 'sister', 'orange', 11),
(42, '2008-12-21 22:28:48', 'Man', 'red', 21),
(43, '2008-12-29 17:29:00', 'Crow', 'red', 22),
(44, '2008-12-29 18:11:15', 'Good Wiz', 'orange', 22),
(45, '2009-05-06 22:57:50', 'Stan', 'red', 23),
(46, '2009-05-06 22:59:02', 'Biff', 'White', 23),
(47, '2009-05-06 22:59:14', 'Wile E. Coyote', 'red', 24),
(48, '2009-05-17 07:45:56', 'Wile E. Coyote', 'red', 25),
(49, '2009-05-17 07:46:37', 'Road Runner', 'orange', 25),
(50, '2009-05-17 07:47:57', 'Wile E. Coyote', 'red', 26),
(51, '2009-05-17 07:47:57', 'Road Runner', 'orange', 26),
(52, '2010-04-14 09:31:19', 'Wile E. Coyote', 'red', 27),
(53, '2010-04-14 09:32:37', 'Wile E. Coyote', 'red', 28),
(54, '2010-04-14 09:32:53', 'Robert', 'red', 29),
(55, '2010-04-14 09:32:58', 'Wile E. Coyote', 'red', 30),
(56, '2010-04-14 09:33:33', 'Jay', 'blue', 29),
(57, '2010-08-02 23:28:36', 'Wile E. Coyote', 'red', 31),
(58, '2010-08-02 23:29:24', 'New character', 'orange', 31);
