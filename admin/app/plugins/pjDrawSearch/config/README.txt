1. How to install a plugin
-----------------------------------------------
	1.1 Before script installation
		- Copy the plugin folder and paste it into 'app/plugins/'
		- Do the same for all the plugins you need, then install the script
	
	1.2 After script installation
		- Copy the plugin folder and paste it into 'app/plugins/'
		- Manually run the plugin *.sql file(s), located in 'app/plugins/pjDrawSearch/config/'


2. How to enable a plugin
-----------------------------------------------
	Add plugin name to $CONFIG['plugins'] array into 'app/config/config.inc.php' and 'app/config/config.sample.php'
	For example: 
	<?php
	$CONFIG['plugins'] = array('pjGallery', 'pjDrawSearch');
	//-- OR -- 
	$CONFIG['plugins'] = 'pjDrawSearch';
	?>


3. How to access the plugin
-----------------------------------------------
	For example:
	index.php?controller=pjDrawSearch
	index.php?controller=pjDrawSearch&action=index
	
	Add above url as hyperlink to the menu if you need to
	
	$controller->requestAction(array(
		'controller' => 'pjDrawSearch',
		'action' => 'pjActionControl',
		'params' => array(
			'form_id' => 'vrSearchForm',
			'clear_tag' => 'button',
			'clear_text' => 'Clear map<abbr></abbr>',
			'clear_class' => 'property-button'
		)
	));
	
	
	# http://stackoverflow.com/questions/7573881/mysql-implementation-of-ray-casting-algorithm
	# http://taylor.woodstitch.com/php/php-mysql-best-solutions-for-finding-points-in-a-polygon-from-a-database/
	IMPORTANT:
	- first and last point must be the same for this GISWithin function to work.
	- polygon format is “lng lat,lng lat” – you will pry have to reformat from “lat lng, lat lng”.
	- Mysql Polygon(()) is enclosed by  two brackets ”((” not just one “(“.
	
	$data_str = " -89 36, -90 35,-84 35, -81 36, -89 36";
	SELECT * FROM table WHERE GISWithin(Point(`lng`, `lat`), GeomFromText('Polygon(($data_str))'))