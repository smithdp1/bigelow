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
	if (isset($_GET['err']))
	{
		$titles = __('error_titles', true);
		$bodies = __('error_bodies', true);
		pjUtil::printNotice(@$titles[$_GET['err']], @$bodies[$_GET['err']]);
	}
	?>
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1"><?php __('lblInstallListing'); ?></a></li>
			<li><a href="#tabs-2"><?php __('lblInstallSearch'); ?></a></li>
			<li><a href="#tabs-3"><?php __('lblInstallFeatured'); ?></a></li>
			<li><a href="#tabs-4"><?php __('lblInstallOptional'); ?></a></li>
		</ul>
		<div id="tabs-1">
			<?php pjUtil::printNotice(NULL, __('lblInstallPhp1Title', true), false, false); ?>
			
			<form action="<?php echo PJ_INSTALL_URL; ?>index.php?controller=pjAdminOptions&amp;action=pjActionUpdate" method="post" class="form pj-form b20">
				<input type="hidden" name="options_update" value="1" />
				<input type="hidden" name="next_action" value="pjActionInstall" />
				<fieldset class="fieldset white">
					<legend><?php __('lblInstallConfig'); ?></legend>
					<?php
					$listing_page = NULL;
					foreach ($tpl['o_arr'] as $item)
					{
						if ($item['key'] == 'o_listing_page')
						{
							$listing_page = $item['value'];
							?>
							<p><?php __('opt_' . $item['key']); ?></p>
							<p>
								<span class="pj-form-field-custom pj-form-field-custom-before float_left">
									<span class="pj-form-field-before"><abbr class="pj-form-field-icon-url"></abbr></span>
									<input type="text" name="value-<?php echo $item['type']; ?>-<?php echo $item['key']; ?>" class="pj-form-field w250" value="<?php echo htmlspecialchars(stripslashes($item['value'])); ?>" />
								</span>
								<input type="submit" value="<?php __('btnSave'); ?>" class="pj-button float_left l5 align_middle" />
							</p>
							<?php
							break;
						}
					}
					?>
					<p><?php __('lblInstallConfigLocale'); ?></p>
					<p>
						<select class="pj-form-field w200 install_locale" data-area="#areaListings" data-box="#boxListings" name="locale">
							<option value=""><?php __('lblInstallConfigLang'); ?></option>
							<?php
							foreach ($tpl['menu_locale_arr'] as $locale)
							{
								?><option value="<?php echo $locale['id']; ?>"><?php echo pjSanitize::html($locale['title']); ?></option><?php
							}
							?>
						</select>
					</p>
				</fieldset>
			</form>
			
			<p style="margin: 0 0 10px; font-weight: bold"><?php __('lblInstallPhp1_1'); ?></p>
			<textarea class="pj-form-field w700 textarea_install" style="overflow: auto; height:50px">
&lt;?php
ob_start();
?&gt;</textarea>
			<p style="margin: 20px 0 10px; font-weight: bold"><?php __('lblInstallPhp1_2'); ?></p>
			<textarea class="pj-form-field w700 textarea_install" style="overflow: auto; height:30px">{VRL_LISTINGS}</textarea>
			<p style="margin: 20px 0 10px; font-weight: bold"><?php __('lblInstallPhp1_2a'); ?></p>
			<textarea class="pj-form-field w700 textarea_install" style="overflow: auto; height:30px">{VRL_META}</textarea>
			<p style="margin: 20px 0 10px; font-weight: bold"><?php __('lblInstallPhp1_3'); ?></p>
			<textarea id="areaListings" class="pj-form-field w700 textarea_install" style="overflow: auto; height:60px">
&lt;?php include '<?php echo dirname($_SERVER['SCRIPT_FILENAME']); ?>/app/views/pjLayouts/pjActionListings.php'; ?&gt;</textarea>

			<div id="boxListings" style="display: none">&lt;?php{LOCALE_START}include '<?php echo dirname($_SERVER['SCRIPT_FILENAME']); ?>/app/views/pjLayouts/pjActionListings.php';{LOCALE_END}?&gt;</div>
		</div>
		
		<div id="tabs-2">
			<?php pjUtil::printNotice(NULL, __('lblInstallPhp2Title', true), false, false); ?>
			
			<div class="form pj-form">
				<fieldset class="fieldset white">
					<legend><?php __('lblInstallConfig'); ?></legend>
					<p><?php __('lblInstallConfigLocale'); ?></p>
					<p>
						<select class="pj-form-field w200 install_locale" data-area="#areaSearch" data-box="#boxSearch" name="locale">
							<option value=""><?php __('lblInstallConfigLang'); ?></option>
							<?php
							foreach ($tpl['menu_locale_arr'] as $locale)
							{
								?><option value="<?php echo $locale['id']; ?>"><?php echo pjSanitize::html($locale['title']); ?></option><?php
							}
							?>
						</select>
					</p>
				</fieldset>
			</div>
			
			<p style="margin: 0 0 10px; font-weight: bold"><?php __('lblInstallSearch_1'); ?></p>
			<textarea class="pj-form-field w700 textarea_install" style="overflow: auto; height:50px">
&lt;?php
ob_start();
?&gt;</textarea>
			<p style="margin: 20px 0 10px; font-weight: bold"><?php __('lblInstallSearch_2'); ?></p>
			<textarea class="pj-form-field w700 textarea_install" style="overflow: auto; height:30px">{VRL_SEARCH}</textarea>
			<p style="margin: 20px 0 10px; font-weight: bold"><?php __('lblInstallSearch_3'); ?></p>
			<textarea id="areaSearch" class="pj-form-field w700 textarea_install" style="overflow: auto; height: 60px">
&lt;?php include '<?php echo dirname($_SERVER['SCRIPT_FILENAME']); ?>/app/views/pjLayouts/pjActionSearch.php'; ?&gt;</textarea>

			<div id="boxSearch" style="display: none">&lt;?php{LOCALE_START}include '<?php echo dirname($_SERVER['SCRIPT_FILENAME']); ?>/app/views/pjLayouts/pjActionSearch.php';{LOCALE_END}?&gt;</div>
		</div>
		
		<div id="tabs-3">
			<?php pjUtil::printNotice(NULL, __('lblInstallPhp3Title', true), false, false); ?>
			
			<div class="form pj-form">
				<fieldset class="fieldset white">
					<legend><?php __('lblInstallConfig'); ?></legend>
					<p><?php __('lblInstallConfigLocale'); ?></p>
					<p>
						<select class="pj-form-field w200 install_locale" data-area="#areaFeatured" data-box="#boxFeatured" name="locale">
							<option value=""><?php __('lblInstallConfigLang'); ?></option>
							<?php
							foreach ($tpl['menu_locale_arr'] as $locale)
							{
								?><option value="<?php echo $locale['id']; ?>"><?php echo pjSanitize::html($locale['title']); ?></option><?php
							}
							?>
						</select>
					</p>
				</fieldset>
			</div>
			
			<p style="margin: 0 0 10px; font-weight: bold"><?php __('lblInstallFeat_1'); ?></p>
			<textarea class="pj-form-field w700 textarea_install" style="overflow: auto; height:50px">
&lt;?php
ob_start();
?&gt;</textarea>
			<p style="margin: 20px 0 10px; font-weight: bold"><?php __('lblInstallFeat_2'); ?></p>
			<textarea class="pj-form-field w700 textarea_install" style="overflow: auto; height:30px">{VRL_FEATURED}</textarea>
			<p style="margin: 20px 0 10px; font-weight: bold"><?php __('lblInstallPhp1_2a'); ?></p>
			<textarea class="pj-form-field w700 textarea_install" style="overflow: auto; height:30px">{VRL_META}</textarea>
			<p style="margin: 20px 0 10px; font-weight: bold"><?php __('lblInstallFeat_3'); ?></p>
			<textarea id="areaFeatured" class="pj-form-field w700 textarea_install" style="overflow: auto; height: 60px">
&lt;?php include '<?php echo dirname($_SERVER['SCRIPT_FILENAME']); ?>/app/views/pjLayouts/pjActionFeatured.php'; ?&gt;</textarea>

			<div id="boxFeatured" style="display: none">&lt;?php{LOCALE_START}include '<?php echo dirname($_SERVER['SCRIPT_FILENAME']); ?>/app/views/pjLayouts/pjActionFeatured.php';{LOCALE_END}?&gt;</div>
		</div>
		<div id="tabs-4">
			<?php pjUtil::printNotice(NULL, __('lblInstallPhp4Title', true), false, false); ?>
			
			<fieldset class="fieldset white">
				<legend><?php __('lblInstallOptional'); ?></legend>
				<form action="<?php echo PJ_INSTALL_URL; ?>index.php?controller=pjAdminOptions&amp;action=pjActionUpdate" method="post" class="form pj-form">
					<input type="hidden" name="options_update" value="1" />
					<input type="hidden" name="next_action" value="pjActionInstall" />
					<input type="hidden" name="tab" value="3" />
					<?php
					foreach ($tpl['o_arr'] as $item)
					{
						//if ($item['key'] == 'o_seo_url')
						if (in_array($item['key'], array('o_seo_url', 'o_lang_store')))
						{
							?>
							<p>
								<label class="title" style="width: 200px"><?php __('opt_' . $item['key']); ?></label>
								<select name="value-<?php echo $item['type']; ?>-<?php echo $item['key']; ?>" class="pj-form-field">
								<?php
								$default = explode("::", $item['value']);
								$enum = explode("|", $default[0]);
								
								$enumLabels = array();
								if (!empty($item['label']) && strpos($item['label'], "|") !== false)
								{
									$enumLabels = explode("|", $item['label']);
								}
								
								foreach ($enum as $k => $el)
								{
									if ($default[1] == $el)
									{
										?><option value="<?php echo $default[0].'::'.$el; ?>" selected="selected"><?php echo array_key_exists($k, $enumLabels) ? stripslashes($enumLabels[$k]) : stripslashes($el); ?></option><?php
									} else {
										?><option value="<?php echo $default[0].'::'.$el; ?>"><?php echo array_key_exists($k, $enumLabels) ? stripslashes($enumLabels[$k]) : stripslashes($el); ?></option><?php
									}
								}
								?>
								</select>
							</p>
							<?php
						}
					}
					?>
					<p>
						<label class="title" style="width: 200px">&nbsp;</label>
						<input type="submit" value="<?php __('btnSave'); ?>" class="pj-button" />
					</p>
				</form>
			</fieldset>
			
			<?php
			$parts = parse_url($listing_page);
			$prefix = NULL;
			if (substr($parts['path'], -1) !== "/")
			{
				$prefix = basename($parts['path']);
			}
			if (isset($parts['query']) && !empty($parts['query']))
			{
				$prefix .= "?" . $parts['query'];
			}
			$prefix .= (strpos($prefix, "?") === false) ? "?" : "&";
			?>
			<p style="margin: 0 0 10px; font-weight: bold"><?php __('lblInstallPhp1_4'); ?></p>
			<textarea class="pj-form-field w700 textarea_install" style="overflow: auto; height:45px">
RewriteEngine On
<?php
switch ($tpl['option_arr']['o_lang_store'])
{
	case 'session':
		?>RewriteRule ^(.*)-(\d+).html$ <?php echo $prefix; ?>controller=pjListings&action=pjActionView&id=$2 [L,NC]<?php
		break;
	case 'url':
		?>RewriteRule ^([a-z]{2})/(.*)-(\d+).html$ <?php echo $prefix; ?>controller=pjListings&action=pjActionView&language=$1&id=$3 [L,NC]<?php
		break;
}
?>
</textarea>
			<p style="margin: 20px 0 10px; font-weight: bold"><?php __('lblInstallPhp1_5'); ?></p>
			<textarea class="pj-form-field w700 textarea_install" style="overflow: auto; height:35px">
&lt;base href="<?php echo $listing_page; ?>" /&gt;</textarea>
			<p style="margin: 20px 0 10px; font-weight: bold"><?php __('lblInstallFeat_4'); ?></p>
		<textarea class="pj-form-field w700 textarea_install" style="overflow: auto; height:65px">
&lt;?php
$VRL_SearchForm = true;
include '<?php echo dirname($_SERVER['SCRIPT_FILENAME']); ?>/app/views/pjLayouts/pjActionFeatured.php';
?&gt;</textarea>
		</div>
	</div>
	<?php
	if (isset($_GET['tab']))
	{
		?>
		<script type="text/javascript">
		(function ($, undefined) {
			$(function () {
				$("#tabs").tabs('option', 'selected', <?php echo (int) $_GET['tab']; ?>);
			});
		})(jQuery_1_8_2);
		</script>
		<?php
	}
}
?>