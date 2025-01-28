<?php
$markers = array();
if (isset($tpl['arr']) && !empty($tpl['arr']))
{
	$floor = __('front_view_floor_measure', true);
	foreach ($tpl['arr'] as $item)
	{
		if ($tpl['option_arr']['o_seo_url'] == 'No')
		{
			$url = $_SERVER['SCRIPT_NAME'] . '?controller=pjListings&amp;action=pjActionView&amp;id=' . $item['id'] .(isset($_GET['iframe']) ? '&amp;iframe' : NULL);
		} else {
			$path = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
			$path = $path == '/' ? '' : $path;
			$url = $path .'/'. $controller->friendlyURL($item['listing_title']) . "-". $item['id'] . ".html";
		}
		$markers[] = array(
			'lat' => $item['lat'],
			'lng' => $item['lng'],
			'title' => $item['listing_title'],
			'content' => sprintf(
				'<div class="property-gm-img"><a href="%6$s"><img src="%1$s" alt="" class="" /></a></div>'.
				'<div class="property-gm-content">'.
					'<div class="property-gm-title">%2$s</div>'.
		 			'<div class="property-gm-feature">%8$s: <span class="property-gm-value">%3$s %7$s</span></div>'.
					'<div class="property-gm-feature">%9$s: <span class="property-gm-value">%4$u</span></div>'.
					'<div class="property-gm-feature">%10$s: <span class="property-gm-value">%5$u</span></div>'.
				'</div>'.
				'<div class="property-gm-details"><a href="%6$s">%11$s</a></div>',
				PJ_INSTALL_URL . $item['pic'], $item['listing_title'], $item['listing_floor_area'],
				$item['listing_bedrooms'], $item['listing_bathrooms'], $url, $floor[$tpl['option_arr']['o_floor']],
				__('front_index_floor', true), __('front_index_bedrooms', true), __('front_index_bathrooms', true),
				__('front_view_details', true)
			),
			//'clickable' => false,
			//'icon' => 'http://maps.google.com/mapfiles/kml/pal2/icon4.png',
			//'shadow' => 'http://maps.google.com/mapfiles/kml/pal2/icon6s.png'
		);
		# For icon's list see:
		# http://www.lass.it/Web/viewer.aspx?id=4
		# http://mabp.kiev.ua/2010/01/12/google-map-markers/
	}
}
?><h3><?php __('front_search_map'); ?></h3><?php
# Store locale in temp variable
$registry = pjRegistry::getInstance();
if ($registry->is('fields'))
{
	$fields = $registry->get('fields');
}
$controller->requestAction(array(
	'controller' => 'pjDrawSearch',
	'action' => 'pjActionControl',
	'params' => array(
		'form_id' => 'vrSearchForm',
		'clear_tag' => 'button',
		'clear_text' => __('front_clear_map', true) . '<abbr></abbr>',
		'clear_class' => 'property-button',
		'markers' => $markers
	)
));
# Restore locale
if (isset($fields))
{
	$registry->set('fields', $fields);
	unset($fields);
	unset($registry);
}
?><button type="submit" style="float: left; margin-right: 5px" class="property-button"><?php __('front_search_submit'); ?><abbr></abbr></button><?php
if (isset($_GET['data']) && !empty($_GET['data']))
{
	?><input type="hidden" name="data" value="<?php echo htmlspecialchars($_GET['data']); ?>" /><?php
}
?>