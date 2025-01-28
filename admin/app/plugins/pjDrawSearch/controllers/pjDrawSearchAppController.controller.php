<?php
if (!defined("ROOT_PATH"))
{
	header("HTTP/1.1 403 Forbidden");
	exit;
}
class pjDrawSearchAppController extends pjPlugin
{
	public function __construct()
	{
		$this->setLayout('pjActionAdmin');
	}
	
	public static function getConst($const)
	{
		$registry = pjRegistry::getInstance();
		$store = $registry->get('pjDrawSearch');
		return isset($store[$const]) ? $store[$const] : NULL;
	}
	
	public function isDrawSearchReady()
	{
		$reflector = new ReflectionClass('pjPlugin');
		try {
			//Try to find out 'isDrawSearchReady' into parent class
			$ReflectionMethod = $reflector->getMethod('isDrawSearchReady');
			return $ReflectionMethod->invoke(new pjPlugin(), 'isDrawSearchReady');
		} catch (ReflectionException $e) {
			//echo $e->getMessage();
			//If failed to find it out, denied access, or not :)
			return false;
		}
	}
	
	public function pjActionBeforeInstall()
	{
		$this->setLayout('pjActionEmpty');
		
		$pjAppModel = pjAppModel::factory();
		
		$pjAppModel->prepare("DROP FUNCTION IF EXISTS `GISWithin`")->exec();
		$pjAppModel->reset()->prepare("CREATE FUNCTION `GISWithin`(pt POINT, mp MULTIPOLYGON) RETURNS int(1)
		DETERMINISTIC
		BEGIN
		
		DECLARE str, xy TEXT;
		DECLARE x, y, p1x, p1y, p2x, p2y, m, xinters DECIMAL(16, 13) DEFAULT 0;
		DECLARE counter INT DEFAULT 0;
		DECLARE p, pb, pe INT DEFAULT 0;
		
		SELECT MBRWithin(pt, mp) INTO p;
		IF p != 1 OR ISNULL(p) THEN
		RETURN p;
		END IF;
		
		SELECT X(pt), Y(pt), ASTEXT(mp) INTO x, y, str;
		SET str = REPLACE(str, :open, :empty);
		SET str = REPLACE(str, :close, :empty);
		SET str = CONCAT(str, :comma);
		
		SET pb = 1;
		SET pe = LOCATE(:comma, str);
		SET xy = SUBSTRING(str, pb, pe - pb);
		SET p = INSTR(xy, :space);
		SET p1x = SUBSTRING(xy, 1, p - 1);
		SET p1y = SUBSTRING(xy, p + 1);
		SET str = CONCAT(str, xy, :comma);
		
		WHILE pe > 0 DO
		SET xy = SUBSTRING(str, pb, pe - pb);
		SET p = INSTR(xy, :space);
		SET p2x = SUBSTRING(xy, 1, p - 1);
		SET p2y = SUBSTRING(xy, p + 1);
		IF p1y < p2y THEN SET m = p1y; ELSE SET m = p2y; END IF;
		IF y > m THEN
		IF p1y > p2y THEN SET m = p1y; ELSE SET m = p2y; END IF;
		IF y <= m THEN
		IF p1x > p2x THEN SET m = p1x; ELSE SET m = p2x; END IF;
		IF x <= m THEN
		IF p1y != p2y THEN
		SET xinters = (y - p1y) * (p2x - p1x) / (p2y - p1y) + p1x;
		END IF;
		IF p1x = p2x OR x <= xinters THEN
		SET counter = counter + 1;
		END IF;
		END IF;
		END IF;
		END IF;
		SET p1x = p2x;
		SET p1y = p2y;
		SET pb = pe + 1;
		SET pe = LOCATE(:comma, str, pb);
		END WHILE;
		
		RETURN counter % 2;
		
		END")->exec(array(
			'empty' => "''",
			'space' => "' '",
			'comma' => "','",
			'open' => "'POLYGON(('",
			'close' => "'))'"
		));
		
		return array('code' => 200, 'info' => array());
	}
}
?>