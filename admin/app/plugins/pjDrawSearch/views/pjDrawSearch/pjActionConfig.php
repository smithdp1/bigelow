<?php
if (isset($tpl['status']))
{
	$status = __('status', true);
	switch ($tpl['status'])
	{
		case 2:
			pjUtil::printNotice(NULL, $status[2]);
			break;
	}
} else {
	$plugin_menu = PJ_VIEWS_PATH . sprintf('pjLayouts/elements/menu_%s.php', $controller->getConst('PLUGIN_NAME'));
	if (is_file($plugin_menu))
	{
		include $plugin_menu;
	}
	
	$titles = __('error_titles', true);
	$bodies = __('error_bodies', true);
	if (isset($_GET['err']))
	{
		pjUtil::printNotice(@$titles[$_GET['err']], @$bodies[$_GET['err']]);
	}
	pjUtil::printNotice(@$titles['PDS02'], @$bodies['PDS02']);
	?>
	
	<div id="drawSearchCanvas" style="width: 738px; height: 260px; border: solid 1px #ccc"></div>
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>?controller=pjDrawSearch&amp;action=pjActionConfig" method="post" class="pj-form form t20" id="pjDrawSearchForm">
		<input type="hidden" name="config_post" value="1" />
		<fieldset class="fieldset white">
			<legend><?php __('plugin_draw_search_config'); ?></legend>
			<p>
				<label class="title"><?php __('plugin_draw_search_lat'); ?></label>
				<input type="text" name="lat" class="pj-form-field w200" value="<?php echo @$tpl['store_data']['lat']; ?>" />
			</p>
			<p>
				<label class="title"><?php __('plugin_draw_search_lng'); ?></label>
				<input type="text" name="lng" class="pj-form-field w200" value="<?php echo @$tpl['store_data']['lng']; ?>" />
			</p>
			<p>
				<label class="title"><?php __('plugin_draw_search_zoom'); ?></label>
				<input type="text" name="zoom" class="pj-form-field w80" value="<?php echo @$tpl['store_data']['zoom']; ?>" />
			</p>
			<p>
				<label class="title">&nbsp;</label>
				<input type="submit" class="pj-button" value="<?php __('plugin_draw_search_save'); ?>" />
			</p>
		</fieldset>
	</form>
	<?php
}
?>