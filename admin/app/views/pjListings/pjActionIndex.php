<?php
include_once PJ_VIEWS_PATH . 'pjListings/elements/urlLanguage.php';

switch ($tpl['option_arr']['o_layout']) {
	case 'layout_1_list':
	case 'layout_1_grid':
		include_once PJ_VIEWS_PATH . 'pjListings/elements/layout_1/index.php';
		break;
	case 'layout_2_list':
	case 'layout_2_grid':
		include_once PJ_VIEWS_PATH . 'pjListings/elements/layout_2/index.php';
		break;
	case 'layout_3_list':
		include_once PJ_VIEWS_PATH . 'pjListings/elements/layout_3/index.php';
		break;
	default:
		include_once PJ_VIEWS_PATH . 'pjListings/elements/layout_1/index.php';
		break;
}
?>