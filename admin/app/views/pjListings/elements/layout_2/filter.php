<div class="property-pattern property-filter">
	<div class="property-pattern-header"><?php __('front_search_title'); ?></div>
	<div class="property-pattern-content">
		<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="get" class="property-search-form">
			<input type="hidden" name="controller" value="pjListings" />
			<input type="hidden" name="action" value="pjActionSearch" />
			<?php
			if ($tpl['option_arr']['o_lang_store'] == 'url')
			{
				?><input type="hidden" name="language" value="<?php echo $controller->getLanguage(); ?>" /><?php
			}
			?>
			<input type="hidden" name="listing_search" value="1" />
			<?php
			if (isset($_GET['iframe']))
			{
				?><input type="hidden" name="iframe" value="" /><?php
			}
			$today = date("Y-m-d");
			$fToday = pjUtil::formatDate($today, "Y-m-d", $tpl['option_arr']['o_date_format']);
			?>
			<p>
				<label class="property-form-label"><?php __('front_search_date_from'); ?>:</label>
				<span class="property-datepicker-wrap vrl-w160">
					<input type="text" name="date_from" id="vrl_d_from" class="property-datepicker-input vrl-w120" readonly="readonly" value="<?php echo isset($_GET['date_from']) ? htmlspecialchars($_GET['date_from']) : $fToday; ?>" />
					<input type="button" class="property-datepicker-icon vrl-l10" id="vrl_dpicker_from" value="" />
				</span>
			</p>
			
			<p>
				<label class="property-form-label"><?php __('front_search_date_to'); ?>:</label>
				<span class="property-datepicker-wrap vrl-w160">
					<input type="text" name="date_to" id="vrl_d_to" class="property-datepicker-input vrl-w120" readonly="readonly" value="<?php echo isset($_GET['date_to']) ? htmlspecialchars($_GET['date_to']) : $fToday; ?>" />
					<input type="button" class="property-datepicker-icon vrl-l10" id="vrl_dpicker_to" value="" />
				</span>
			</p>
			<p>
				<label class="property-form-label"><?php __('front_search_type'); ?>:</label>
				<select name="type_id" id="type_id" class="property-select vrl-w160">
					<option value=""><?php __('front_search_choose'); ?></option>
					<?php
					foreach ($tpl['type_arr'] as $v)
					{
						if (isset($_GET['type_id']) && $_GET['type_id'] == $v['id'])
						{
							?><option value="<?php echo $v['id']; ?>" selected="selected"><?php echo stripslashes($v['type_title']); ?></option><?php
						} else {
							?><option value="<?php echo $v['id']; ?>"><?php echo stripslashes($v['type_title']); ?></option><?php
						}
					}
					?>
				</select>
			</p>
			
			<p>
				<label class="property-form-label"><?php __('front_search_bedrooms'); ?>:</label>
				<select name="bedrooms_from" id="bedrooms_from" class="property-select vrl-w70">
					<option value=""><?php __('front_search_choose'); ?></option>
					<?php
					foreach (range(0,10) as $v)
					{
						if (isset($_GET['bedrooms_from']) && $_GET['bedrooms_from'] == $v)
						{
							?><option value="<?php echo $v; ?>" selected="selected"><?php echo number_format($v); ?></option><?php
						} else {
							?><option value="<?php echo $v; ?>"><?php echo number_format($v); ?></option><?php
						}
					}
					?>
				</select>
				<?php __('front_search_to'); ?>
				<select name="bedrooms_to" id="bedrooms_to" class="property-select vrl-w70">
					<option value=""><?php __('front_search_choose'); ?></option>
					<?php
					foreach (range(0,10) as $v)
					{
						if (isset($_GET['bedrooms_to']) && $_GET['bedrooms_to'] == $v)
						{
							?><option value="<?php echo $v; ?>" selected="selected"><?php echo number_format($v); ?></option><?php
						} else {
							?><option value="<?php echo $v; ?>"><?php echo number_format($v); ?></option><?php
						}
					}
					?>
					<option value="999999"<?php echo isset($_GET['bedrooms_to']) && (int) $_GET['bedrooms_to'] == 999999 ? ' selected="selected"' : NULL; ?>><?php __('front_search_above'); ?> 10</option>
				</select>
			</p>
			
			<p>
				<label class="property-form-label"><?php __('front_search_bathrooms'); ?>:</label>
				<select name="bathrooms_from" id="bathrooms_from" class="property-select vrl-w70">
					<option value=""><?php __('front_search_choose'); ?></option>
					<?php
					foreach (range(0,10) as $v)
					{
						if (isset($_GET['bathrooms_from']) && $_GET['bathrooms_from'] == $v)
						{
							?><option value="<?php echo $v; ?>" selected="selected"><?php echo number_format($v); ?></option><?php
						} else {
							?><option value="<?php echo $v; ?>"><?php echo number_format($v); ?></option><?php
						}
					}
					?>
				</select>
				<?php __('front_search_to'); ?>
				<select name="bathrooms_to" id="bathrooms_to" class="property-select vrl-w70">
					<option value=""><?php __('front_search_choose'); ?></option>
					<?php
					foreach (range(0,10) as $v)
					{
						if (isset($_GET['bathrooms_to']) && $_GET['bathrooms_to'] == $v)
						{
							?><option value="<?php echo $v; ?>" selected="selected"><?php echo number_format($v); ?></option><?php
						} else {
							?><option value="<?php echo $v; ?>"><?php echo number_format($v); ?></option><?php
						}
					}
					?>
					<option value="999999"<?php echo isset($_GET['bathrooms_to']) && (int) $_GET['bathrooms_to'] == 999999 ? ' selected="selected"' : NULL; ?>><?php __('front_search_above'); ?> 10</option>
				</select>
			</p>
		
			<p>
				<label class="property-form-label"><?php __('front_search_floor_area'); ?>:</label>
				<input type="text" name="floor_area_from" id="floor_area_from" value="<?php echo isset($_GET['floor_area_from']) ? htmlspecialchars(stripslashes($_GET['floor_area_from'])) : NULL; ?>" class="property-text vrl-w60" />
				<?php __('front_search_to'); ?>
				<input type="text" name="floor_area_to" id="floor_area_to" value="<?php echo isset($_GET['floor_area_to']) ? htmlspecialchars(stripslashes($_GET['floor_area_to'])) : NULL; ?>" class="property-text vrl-w60" />
			</p>
			<p>
				<label class="property-form-label"><?php __('front_search_adults'); ?>:</label>
				<select name="adults_from" id="adults_from" class="property-select vrl-w70">
					<option value=""><?php __('front_search_choose'); ?></option>
					<?php
					foreach (range(0,10) as $v)
					{
						if (isset($_GET['adults_from']) && $_GET['adults_from'] == $v)
						{
							?><option value="<?php echo $v; ?>" selected="selected"><?php echo number_format($v); ?></option><?php
						} else {
							?><option value="<?php echo $v; ?>"><?php echo number_format($v); ?></option><?php
						}
					}
					?>
				</select>
				<?php __('front_search_to'); ?>
				<select name="adults_to" id="adults_to" class="property-select vrl-w70">
					<option value=""><?php __('front_search_choose'); ?></option>
					<?php
					foreach (range(0,10) as $v)
					{
						if (isset($_GET['adults_to']) && $_GET['adults_to'] == $v)
						{
							?><option value="<?php echo $v; ?>" selected="selected"><?php echo number_format($v); ?></option><?php
						} else {
							?><option value="<?php echo $v; ?>"><?php echo number_format($v); ?></option><?php
						}
					}
					?>
					<option value="999999"<?php echo isset($_GET['adults_to']) && (int) $_GET['adults_to'] == 999999 ? ' selected="selected"' : NULL; ?>><?php __('front_search_above'); ?> 10</option>
				</select>
			</p>
			<p>
				<label class="property-form-label"><?php __('front_search_children'); ?>:</label>
				<select name="children_from" id="children_from" class="property-select vrl-w70">
					<option value=""><?php __('front_search_choose'); ?></option>
					<?php
					foreach (range(0,10) as $v)
					{
						if (isset($_GET['children_from']) && $_GET['children_from'] == $v)
						{
							?><option value="<?php echo $v; ?>" selected="selected"><?php echo number_format($v); ?></option><?php
						} else {
							?><option value="<?php echo $v; ?>"><?php echo number_format($v); ?></option><?php
						}
					}
					?>
				</select>
				<?php __('front_search_to'); ?>
				<select name="children_to" id="children_to" class="property-select vrl-w70">
					<option value=""><?php __('front_search_choose'); ?></option>
					<?php
					foreach (range(0,10) as $v)
					{
						if (isset($_GET['children_to']) && $_GET['children_to'] == $v)
						{
							?><option value="<?php echo $v; ?>" selected="selected"><?php echo number_format($v); ?></option><?php
						} else {
							?><option value="<?php echo $v; ?>"><?php echo number_format($v); ?></option><?php
						}
					}
					?>
					<option value="999999"<?php echo isset($_GET['children_to']) && (int) $_GET['children_to'] == 999999 ? ' selected="selected"' : NULL; ?>><?php __('front_search_above'); ?> 10</option>
				</select>
			</p>
			<p>
				<label class="property-form-label"><?php __('front_search_refid'); ?>:</label>
				<input type="text" name="refid" id="refid" value="<?php echo isset($_GET['refid']) ? htmlspecialchars(stripslashes($_GET['refid'])) : NULL; ?>" class="property-text vrl-w150" />
			</p>
			<p class="vrl-align-center">
				<button type="submit" class="property-button"><?php __('front_search_submit'); ?><abbr></abbr></button>
			</p>
		</form>
	</div>
</div>