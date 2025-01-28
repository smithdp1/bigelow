<?php
switch ($tpl['option_arr']['o_lang_store'])
{
	case 'session':
		$SEO_LANG = '';
		$QS_LANG = '';
		break;
	case 'url':
		$SEO_LANG = $controller->getLanguage() . '/';
		$QS_LANG = '&amp;language=' . $controller->getLanguage();
		break;
}
?>