<?php
if (!empty($tpl['arr']['listing_description']))
{
	?>
	<div class="property-state">
		<div class="property-state-header"><h2><?php __('front_view_description'); ?></h2></div>
		<div class="property-state-content property-state-rte"><?php echo stripslashes(pjUtil::stripScripts($tpl['arr']['listing_description'])); ?></div>
	</div>
	<?php
}
?>