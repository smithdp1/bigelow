<?php
if (!defined("ROOT_PATH"))
{
	header("HTTP/1.1 403 Forbidden");
	exit;
}
require_once PJ_CONTROLLERS_PATH . 'pjAppController.controller.php';
class pjFront extends pjAppController
{
	public $defaultCaptcha = 'StivaSoftCaptcha';
	
	public $defaultTime = 'VRentals_Time';
	
	protected $locales = array();
	
	public function __construct()
	{
		$this->setLayout('pjActionFront');
	}
	
	public function afterFilter()
	{
		switch ($this->option_arr['o_layout'])
		{
			case 'layout_1_list':
			case 'layout_1_grid':
				$this->appendCss('front_layout_1.css');
				break;
			case 'layout_2_list':
			case 'layout_2_grid':
				$this->appendCss('front_layout_2.css');
				break;
			case 'layout_3_list':
				$this->appendCss('front_layout_3.css');
				break;
			default:
				$this->appendCss('front_layout_1.css');
				break;
		}
		$this->appendCss('front_lib.css');
	}
	
	public function beforeFilter()
	{
		if (!isset($this->defaultTime))
		{
			$this->defaultTime = time();
		}
		
		pjObject::import('Model', array('pjLocale:pjLocale', 'pjLocale:pjLocaleLanguage'));
		$locale_arr = pjLocaleModel::factory()->select('t1.*, t2.file, t2.title')
			->join('pjLocaleLanguage', 't2.iso=t1.language_iso', 'left outer')
			->where('t2.file IS NOT NULL')
			->orderBy('t1.sort ASC')->findAll()->getDataPair('id');
		
		$this->set('locale_arr', $locale_arr);
		
		foreach ($locale_arr as $locale)
		{
			$this->locales[$locale['language_iso']] = $locale['id'];
		}
		
		if (isset($_GET['params'], $_GET['params']['locale']) && in_array($_GET['params']['locale'], $this->locales))
		{
			$this->setLocaleId($_GET['params']['locale']);
		}
		
		if (isset($_GET['language']) && array_key_exists($_GET['language'], $this->locales))
		{
			$this->setLocaleId($this->locales[$_GET['language']]);
		}
		
		$OptionModel = pjOptionModel::factory();
		$this->option_arr = $OptionModel->getPairs($this->getForeignId());
		$this->set('option_arr', $this->option_arr);
		$this->setTime();
		
		//$this->appendCss('front.css');
		if (!isset($_SESSION[$this->defaultLocale]))
		{
			pjObject::import('Model', 'pjLocale:pjLocale');
			$locale_arr = pjLocaleModel::factory()->where('is_default', 1)->limit(1)->findAll()->getData();
			if (count($locale_arr) === 1)
			{
				$this->setLocaleId($locale_arr[0]['id']);
			}
		}
		pjAppController::setFields($this->getLocaleId());
	}
	
	public function beforeRender()
	{
		if (isset($_GET['iframe']))
		{
			$this->setLayout('pjActionIframe');
		}
	}
	
	public function pjActionCaptcha()
	{
		$this->setAjax(true);
		
		$Captcha = new pjCaptcha('app/web/obj/Anorexia.ttf', $this->defaultCaptcha, 6);
		$Captcha->setImage('app/web/img/button.png')->init(isset($_GET['rand']) ? $_GET['rand'] : null);
	}

	public function pjActionSetLocale()
	{
		$this->setLocaleId(@$_GET['locale']);

		$referer = $_SERVER['HTTP_REFERER'];
		if ($this->option_arr['o_lang_store'] == 'url')
		{
			$referer = preg_replace('/(&language=)([a-z]{2})/', '$1' . $this->getLanguage(), $referer);
		}
		
		pjUtil::redirect($referer);
	}
	
	public function getLanguage()
    {
    	$language = array_search($this->getLocaleId(), $this->locales);
    	
    	return $language !== FALSE ? $language : 'gb';
    }
}
?>