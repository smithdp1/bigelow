<select name="address_state" id="address_state" class="<?php echo htmlspecialchars($_GET['stateClass']); ?>" onchange="VRL.Utils.changeState(this, '<?php echo PJ_INSTALL_FOLDER; ?>', '<?php echo htmlspecialchars($_GET['stateClass']); ?>');">
	<option value=""><?php __('front_search_choose'); ?></option>
	<?php
	if (isset($tpl['state_arr']) && is_array($tpl['state_arr']))
	{
		foreach ($tpl['state_arr'] as $state)
		{
			if (empty($state))
			{
				continue;
			}
			if (isset($_GET['address_state']) && $_GET['address_state'] == $state)
			{
				?><option value="<?php echo $state; ?>" selected="selected"><?php echo htmlspecialchars(stripslashes($state)); ?></option><?php
			} else {
				?><option value="<?php echo $state; ?>"><?php echo htmlspecialchars(stripslashes($state)); ?></option><?php
			}
		}
	}
	?>
</select>