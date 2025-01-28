<?php
if (!defined("ROOT_PATH"))
{
	header("HTTP/1.1 403 Forbidden");
	exit;
}
require_once dirname(__FILE__) . '/pjDrawSearchApp.model.php';
class pjDrawSearchModel extends pjDrawSearchAppModel
{
	protected $primaryKey = 'id';
	
	protected $table = 'plugin_draw_search';
	
	protected $schema = array(
		array('name' => 'id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'foreign_id', 'type' => 'int', 'default' => ':NULL'),
		array('name' => 'lat', 'type' => 'decimal', 'default' => ':NULL'),
		array('name' => 'lng', 'type' => 'decimal', 'default' => ':NULL'),
		array('name' => 'zoom', 'type' => 'int', 'default' => ':NULL'),
	);
	
	public static function factory($attr=array())
	{
		return new pjDrawSearchModel($attr);
	}
	
	public function pjActionSetup()
	{
		
	}
}
?>