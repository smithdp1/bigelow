DROP TABLE IF EXISTS `plugin_draw_search`;
CREATE TABLE IF NOT EXISTS `plugin_draw_search` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `foreign_id` int(10) unsigned DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `zoom` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign_id` (`foreign_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `plugin_draw_search` (`id`, `foreign_id`, `lat`, `lng`, `zoom`) VALUES
(1, NULL, 37.758041, -122.404846, 8);

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_draw_search_config', 'backend', 'DrawSearch / Config', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Config', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Config', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Config', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_draw_search_lat', 'backend', 'DrawSearch / Latitude', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Latitude', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Latitude', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Latitude', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_draw_search_lng', 'backend', 'DrawSearch / Longitude', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Longitude', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Longitude', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Longitude', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_draw_search_zoom', 'backend', 'DrawSearch / Zoom level', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Zoom level', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Zoom level', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Zoom level', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_draw_search_save', 'backend', 'DrawSearch / Save', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Save', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Save', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Save', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'error_titles_ARRAY_PDS01', 'arrays', 'DrawSearch / Config updated', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Congif updated!', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Congif updated!', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Congif updated!', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'error_bodies_ARRAY_PDS01', 'arrays', 'DrawSearch / Config updated description', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'All changes made to config data have been saved.', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'All changes made to config data have been saved.', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'All changes made to config data have been saved.', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'error_titles_ARRAY_PDS02', 'arrays', 'DrawSearch / Config notice', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Draw a Search configuration', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Draw a Search configuration', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Draw a Search configuration', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'error_bodies_ARRAY_PDS02', 'arrays', 'DrawSearch / Config notice description', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Use map below to set up default values for Draw a Search plugin.', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Use map below to set up default values for Draw a Search plugin.', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Use map below to set up default values for Draw a Search plugin.', 'plugin');