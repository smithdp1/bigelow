<?php
if (!defined("ROOT_PATH"))
{
	header("HTTP/1.1 403 Forbidden");
	exit;
}
require_once dirname(__FILE__) . '/pjDrawSearchAppController.controller.php';
class pjDrawSearch extends pjDrawSearchAppController
{
	public function beforeFilter()
	{
		switch ($_GET['action'])
		{
			case 'pjActionConfig':
				parent::beforeFilter();
				break;
			default:
				//do nothing, just override the parent's one
				break;
		}
	}
	
	public function pjActionControl()
	{
		$this->setAjax(true);
		$this->setLayout('pjActionEmpty');
		//strokeColor
		//fillColor
		//zoom
		//lat
		//lng
		//form_id
		//field_name
		//markers (Array with indexes: lat, lng, title, content. Optional indexes: clickable, icon, shadow)
		$params = $this->getParams();
		if (!isset($params['lat']) || !isset($params['lng']) || !isset($params['zoom']))
		{
			pjObject::import('Model', 'pjDrawSearch:pjDrawSearch');
			$arr = pjDrawSearchModel::factory()->find(1)->getData();
			if (!empty($arr))
			{
				$params['lat'] = $arr['lat'];
				$params['lng'] = $arr['lng'];
				$params['zoom'] = (int) $arr['zoom'];
			}
		}
		$this->set('arr', $params);
	}
	
	public function pjActionConfig()
	{
		$this->checkLogin();
		
		if (!$this->isDrawSearchReady())
		{
			$this->set('status', 2);
			return;
		}
		
		pjObject::import('Model', 'pjDrawSearch:pjDrawSearch');

		if (isset($_POST['config_post']))
		{
			pjDrawSearchModel::factory()->set('id', 1)->modify($_POST);
			pjUtil::redirect(PJ_INSTALL_URL . "index.php?controller=pjDrawSearch&action=pjActionConfig&err=PDS01");
		}
		
		$this->set('store_data', pjDrawSearchModel::factory()->find(1)->getData());
		$this->appendJs('js?sensor=false', 'http://maps.googleapis.com/maps/api/', true);
		$this->appendJs('pjDrawConfig.js', $this->getConst('PLUGIN_JS_PATH'));
	}
}
?>