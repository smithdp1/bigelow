<select name="address_city" id="address_city" class="<?php echo pjSanitize::html($_GET['cityClass']); ?>">
	<option value=""><?php __('front_search_choose'); ?></option>
	<?php
	if (isset($tpl['city_arr']) && is_array($tpl['city_arr']))
	{
		foreach ($tpl['city_arr'] as $city)
		{
			if (empty($city))
			{
				continue;
			}
			if (isset($_GET['address_city']) && $_GET['address_city'] == $city)
			{
				?><option value="<?php echo $city; ?>" selected="selected"><?php echo pjSanitize::html($city); ?></option><?php
			} else {
				?><option value="<?php echo $city; ?>"><?php echo pjSanitize::html($city); ?></option><?php
			}
		}
	}
	?>
</select>