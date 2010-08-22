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
