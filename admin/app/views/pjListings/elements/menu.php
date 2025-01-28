<ul class="property-menu property-heading">
	<?php
	if (@$_GET['controller'] == 'pjListings' && @$_GET['action'] == 'pjActionView')
	{
		$back = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $_SERVER['SCRIPT_NAME'] .'?controller=pjListings&amp;action=pjActionIndex'. $QS_LANG. (isset($_GET['iframe']) ? '&amp;iframe' : NULL);
		?><li><a href="<?php echo htmlspecialchars($back); ?>"><?php __('front_menu_back'); ?></a></li><?php
	}
	?>
	<li><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?controller=pjListings&amp;action=pjActionIndex<?php echo $QS_LANG; ?><?php echo isset($_GET['iframe']) ? '&amp;iframe' : NULL; ?>"><?php __('front_menu_home'); ?></a></li>
	<li><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?controller=pjListings&amp;action=pjActionSearch<?php echo $QS_LANG; ?><?php echo isset($_GET['iframe']) ? '&amp;iframe' : NULL; ?>"><?php __('front_menu_search'); ?></a></li>
</ul>