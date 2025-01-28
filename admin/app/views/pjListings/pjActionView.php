<?php
include_once PJ_VIEWS_PATH . 'pjListings/elements/urlLanguage.php';

if (isset($VRL_SearchForm) && $VRL_SearchForm === true)
{
	include_once PJ_VIEWS_PATH . 'pjListings/pjActionSearch.php';
}
switch ($tpl['option_arr']['o_layout'])
{
	case 'layout_1_list':
	case 'layout_1_grid':
		include_once PJ_VIEWS_PATH . 'pjListings/elements/layout_1/view.php';
		break;
	case 'layout_2_list':
	case 'layout_2_grid':
		include_once PJ_VIEWS_PATH . 'pjListings/elements/layout_2/view.php';
		break;
	case 'layout_3_list':
		include_once PJ_VIEWS_PATH . 'pjListings/elements/layout_3/view.php';
		break;
	default:
		include_once PJ_VIEWS_PATH . 'pjListings/elements/layout_1/view.php';
		break;
}
?>
<script type="text/javascript">
var VRL = VRL || {};
VRL.Msg = {};
<?php
foreach (__('front_sys', true) as $k => $v)
{
	if (strpos($k, 'bf_') === 0)
	{
		printf("VRL.Msg.%s = '%s';\n", $k, addslashes($v));
	}
}
?>
VRL.Opts = {
	dateFormat: "<?php echo $tpl['option_arr']['o_date_format']; ?>",
	startDay: <?php echo (int) $tpl['option_arr']['o_week_start']; ?>
};
</script>