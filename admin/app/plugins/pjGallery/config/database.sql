DROP TABLE IF EXISTS `plugin_gallery`;
CREATE TABLE IF NOT EXISTS `plugin_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `foreign_id` int(10) unsigned DEFAULT NULL,
  `hash` varchar(32) DEFAULT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `small_path` varchar(255) DEFAULT NULL,
  `small_size` int(10) unsigned DEFAULT NULL,
  `small_width` smallint(5) unsigned DEFAULT NULL,
  `small_height` smallint(5) unsigned DEFAULT NULL,
  `medium_path` varchar(255) DEFAULT NULL,
  `medium_size` int(10) unsigned DEFAULT NULL,
  `medium_width` smallint(5) unsigned DEFAULT NULL,
  `medium_height` smallint(5) unsigned DEFAULT NULL,
  `large_path` varchar(255) DEFAULT NULL,
  `large_size` int(10) unsigned DEFAULT NULL,
  `large_width` smallint(5) unsigned DEFAULT NULL,
  `large_height` smallint(5) unsigned DEFAULT NULL,
  `source_path` varchar(255) DEFAULT NULL,
  `source_size` int(10) unsigned DEFAULT NULL,
  `source_width` smallint(5) unsigned DEFAULT NULL,
  `source_height` smallint(5) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `watermark` varchar(255) DEFAULT NULL,
  `sort` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign_id` (`foreign_id`),
  KEY `hash` (`hash`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_alt', 'backend', 'Gallery plugin / ALT', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'ALT', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'ALT', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'ALT', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_watermark_position', 'backend', 'Gallery plugin / Watermark position', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Watermark position', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Watermark position', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Watermark position', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_position', 'backend', 'Gallery plugin / Position', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Position', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Position', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Position', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_image_settings', 'backend', 'Gallery plugin / Image settings', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Image settings', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Image settings', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Image settings', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_confirmation_multi', 'backend', 'Gallery plugin / Delete all confirmation', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Are you sure you want to delete all images?', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Are you sure you want to delete all images?', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Are you sure you want to delete all images?', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_confirmation_single', 'backend', 'Gallery plugin / Delete image confirmation', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Are you sure you want to delete selected image?', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Are you sure you want to delete selected image?', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Are you sure you want to delete selected image?', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_delete_confirmation', 'backend', 'Gallery plugin / Delete confirmation', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Delete confirmation', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Delete confirmation', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Delete confirmation', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_compression_note', 'backend', 'Gallery plugin / Compression note', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id consectetur magna. Nulla facilisi. Sed id dolor ante.', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id consectetur magna. Nulla facilisi. Sed id dolor ante.', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id consectetur magna. Nulla facilisi. Sed id dolor ante.', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_btn_delete', 'backend', 'Gallery plugin / Button Delete', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Delete', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Delete', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Delete', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_btn_cancel', 'backend', 'Gallery plugin / Button Cancel', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Cancel', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Cancel', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Cancel', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_btn_save', 'backend', 'Gallery plugin / Button Save', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Save', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Save', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Save', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_btn_set_watermark', 'backend', 'Gallery plugin / Set watermark', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Set watermark', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Set watermark', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Set watermark', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_btn_clear_current', 'backend', 'Gallery plugin / Clear current one', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Clear current one', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Clear current one', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Clear current one', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_btn_compress', 'backend', 'Gallery plugin / Button Compress', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Compress', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Compress', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Compress', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_btn_recreate', 'backend', 'Gallery plugin / Button Recreate', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Re-create thumbs', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Re-create thumbs', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Re-create thumbs', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_top_left', 'backend', 'Gallery plugin / Top Left', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Top Left', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Top Left', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Top Left', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_top_center', 'backend', 'Gallery plugin / Top Center', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Top Center', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Top Center', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Top Center', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_bottom_left', 'backend', 'Gallery plugin / Bottom Left', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Bottom Left', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Bottom Left', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Bottom Left', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_bottom_right', 'backend', 'Gallery plugin / Bottom Right', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Bottom Right', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Bottom Right', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Bottom Right', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_bottom_center', 'backend', 'Gallery plugin / Bottom Center', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Bottom Center', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Bottom Center', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Bottom Center', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_center_left', 'backend', 'Gallery plugin / Center Left', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Center Left', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Center Left', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Center Left', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_center_right', 'backend', 'Gallery plugin / Center Right', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Center Right', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Center Right', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Center Right', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_center_center', 'backend', 'Gallery plugin / Center Center', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Center Center', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Center Center', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Center Center', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_top_right', 'backend', 'Gallery plugin / Top Right', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Top Right', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Top Right', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Top Right', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_empty_result', 'backend', 'Gallery plugin / Empty result set', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'No images uploaded yet.', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'No images uploaded yet.', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'No images uploaded yet.', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_move', 'backend', 'Gallery plugin / Move', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Move', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Move', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Move', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_edit', 'backend', 'Gallery plugin / Edit', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Edit', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Edit', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Edit', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_delete', 'backend', 'Gallery plugin / Delete', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Delete', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Delete', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Delete', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_resize', 'backend', 'Gallery plugin / Resize', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Resize/Crop', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Resize/Crop', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Resize/Crop', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_rotate', 'backend', 'Gallery plugin / Rotate', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Rotate', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Rotate', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Rotate', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_watermark', 'backend', 'Gallery plugin / Watermark', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Watermark', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Watermark', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Watermark', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_compression', 'backend', 'Gallery plugin / Compression', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Compression', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Compression', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Compression', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_delete_all', 'backend', 'Gallery plugin / Delete All', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Delete All', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Delete All', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Delete All', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_originals', 'backend', 'Gallery plugin / Originals', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Originals', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Originals', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Originals', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_thumbs', 'backend', 'Gallery plugin / Thumbs', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Thumbs', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Thumbs', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Thumbs', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_photos', 'backend', 'Gallery plugin / photos', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'photos', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'photos', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'photos', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_upload', 'backend', 'Gallery plugin / Upload', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Upload', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Upload', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Upload', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_recreate', 'backend', 'Gallery plugin / Recreate from original', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 're-create from original', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 're-create from original', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 're-create from original', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_original', 'backend', 'Gallery plugin / Original', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Original', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Original', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Original', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_preview', 'backend', 'Gallery plugin / Preview', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Preview', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Preview', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Preview', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_thumb', 'backend', 'Gallery plugin / Thumb', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Thumb', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Thumb', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Thumb', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_btn_back', 'backend', 'Gallery plugin / Button Back', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', '&laquo; Back', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', '&laquo; Back', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', '&laquo; Back', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_resize_body', 'backend', 'Gallery plugin / Resize Notice body', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Move the outer parts of the rectangular and/or position it over the image to change framing, aspect ratio or accentuate an object.', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Move the outer parts of the rectangular and/or position it over the image to change framing, aspect ratio or accentuate an object.', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Move the outer parts of the rectangular and/or position it over the image to change framing, aspect ratio or accentuate an object.', 'plugin');

INSERT INTO `fields` (`id`, `key`, `type`, `label`, `source`, `modified`) VALUES
(NULL, 'plugin_gallery_resize_title', 'backend', 'Gallery plugin / Resize Notice title', 'plugin', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` (`id`, `foreign_id`, `model`, `locale`, `field`, `content`, `source`) VALUES
(NULL, @id, 'pjField', 1, 'title', 'Crop Image', 'plugin'),
(NULL, @id, 'pjField', 2, 'title', 'Crop Image', 'plugin'),
(NULL, @id, 'pjField', 3, 'title', 'Crop Image', 'plugin');