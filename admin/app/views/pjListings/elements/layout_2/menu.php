<?php
$params = $controller->getParams();
$menu = !isset($params['menu']) || $params['menu'] !== false;
$lang = !isset($params['lang']) || $params['lang'] !== false;
if ($menu || $lang)
{
	?>
	<div class="property-menu-wrap">
	<?php
	if ($menu)
	{
		?>
		<ul class="property-menu">
			<?php
			if (@$_GET['controller'] == 'pjListings' && @$_GET['action'] == 'pjActionView')
			{
				$back = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $_SERVER['SCRIPT_NAME'] .'?controller=pjListings&amp;action=pjActionIndex'. $QS_LANG. (isset($_GET['iframe']) ? '&amp;iframe' : NULL);
				?>
				<li><a href="<?php echo htmlspecialchars($back); ?>"><abbr class="property-menu-back"></abbr><?php __('front_menu_back_no'); ?></a></li>
				<?php
			}
			?>
			<li><a class="<?php echo $_GET['action'] == 'pjActionIndex' ? 'property-menu-focus' : NULL; ?>" href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?controller=pjListings&amp;action=pjActionIndex<?php echo $QS_LANG; ?><?php echo isset($_GET['iframe']) ? '&amp;iframe' : NULL; ?>"><abbr class="property-menu-home"></abbr><?php __('front_menu_home'); ?></a></li>
			<li><a class="<?php echo $_GET['action'] == 'pjActionSearch' ? 'property-menu-focus' : NULL; ?>" href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?controller=pjListings&amp;action=pjActionSearch<?php echo $QS_LANG; ?><?php echo isset($_GET['iframe']) ? '&amp;iframe' : NULL; ?>"><abbr class="property-menu-search"></abbr><?php __('front_menu_search'); ?></a></li>
			<?php
			if ($tpl['option_arr']['o_allow_add_property'] == 'Yes') {
				?>
				<li><a class="<?php echo $_GET['action'] == 'pjActionAdd' ? 'property-menu-focus' : NULL; ?>" href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?controller=pjListings&amp;action=pjActionAdd<?php echo $QS_LANG; ?><?php echo isset($_GET['iframe']) ? '&amp;iframe' : NULL; ?>"><abbr class="property-menu-add"></abbr><?php __('front_menu_add'); ?></a></li>
				<?php
			}
			?>
			<li>&nbsp;</li>
		</ul>
		<?php
	}
	if ($lang)
	{
		include PJ_VIEWS_PATH . 'pjListings/elements/locale.php';
	}
	?>
	</div>
	<?php
}
?>