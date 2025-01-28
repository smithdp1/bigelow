<?php
if (!isset($_GET['iframe']))
{
	$content = ob_get_contents();
	ob_end_clean();
	ob_start();
}
if (!isset($_GET['controller']) || empty($_GET['controller']))
{
	$_GET["controller"] = "pjListings";
}
if (!isset($_GET['action']) || empty($_GET['action']))
{
	$_GET["action"] = "pjActionFeatured";
}
$_GET['params'] = array();
$_GET['params']['menu'] = false;
if (isset($VRL_SearchForm) && $VRL_SearchForm === true)
{
	$_GET['params']['search'] = true;
}
if (isset($VRL_Locale) && (int) $VRL_Locale > 0)
{
	$_GET['params']['locale'] = (int) $VRL_Locale;
	$_GET['params']['lang'] = false;
}
$dirname = str_replace("\\", "/", dirname(__FILE__));
include str_replace("app/views/pjLayouts", "", $dirname) . '/ind'.'ex.php';

$meta = NULL;
$meta_arr = $pjObserver->getController()->get('meta_arr');
if ($meta_arr !== FALSE)
{
	$meta = sprintf('<title>%s</title>
<meta name="keywords" content="%s" />
<meta name="description" content="%s" />',
		stripslashes($meta_arr['title']),
		htmlspecialchars(stripslashes($meta_arr['keywords'])),
		htmlspecialchars(stripslashes($meta_arr['description']))
	);
}
$content = str_replace('{VRL_META}', $meta, $content);

if (!isset($_GET['iframe']))
{
	$app = ob_get_contents();
	ob_end_clean();
	ob_start();
	$app = str_replace('$','&#36;',$app);
	echo preg_replace('/\{VRL_FEATURED\}/', $app, $content);
}
?>
<a href="http://vila-puncak.com/category/villa-kota-bunga/"><img src="/admin/app/web/img/icons/home.gif" title="vila-puncak.com category villa-kota-bunga"/></a>
<a href="http://villa.dgroupcompany.com/puncak"><img src="/admin/app/web/img/icons/browse.gif" title="villa.dgroupcompany.com/puncak"  /></a>
<a href="http://puncakpass.net/"><img src="/admin/app/web/img/icons/gadget.gif " title="puncakpass.net"/></a>
<a href="https://anjingdijualorg.wordpress.com/2017/08/04/liburan-akhir-pekan-di-kotabunga/"><img src="/admin/app/web/img/icons/del.gif" title="liburan Akhir Pekan di kotabunga" border="0" /></a>