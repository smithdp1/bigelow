<div class="pjDrawSearch_Holder">
	<div id="pjDrawSearch_Canvas" class="pjDrawSearch_Canvas"></div>
</div>
<?php
if (isset($tpl['arr']['clear_tag']) && $tpl['arr']['clear_tag'] == 'button')
{
	?><button type="button" class="<?php echo @$tpl['arr']['clear_class']; ?>" id="pjDrawSearch_ClearMap" disabled="disabled"><?php echo @$tpl['arr']['clear_text']; ?></button><?php
} else {
	?><input type="button" value="<?php echo @$tpl['arr']['clear_text']; ?>" class="<?php echo @$tpl['arr']['clear_class']; ?>" id="pjDrawSearch_ClearMap" disabled="disabled" /><?php
}
?>

<script type="text/javascript">
var pjDrawSearch_Init,
	pjDrawSearch_Overlays = [],
	pjDrawSearch_Maps = null;
	
(function () {
	var isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
	
	var loadCss = function(url, callback){
		var link = document.createElement('link');
		link.type = 'text/css';
		link.rel = 'stylesheet';
		link.href = url;

		document.getElementsByTagName('head')[0].appendChild(link);

		var img = document.createElement('img');
		img.onerror = function(){
			if (callback && typeof callback === "function") {
				callback();
			}
		};
		img.src = url;
	};
	
	var loadRemote = function(url, type, callback) {
		if (type === "css" && isSafari) {
			loadCss(url, callback);
			return;
		}
		var _element, _type, _attr, scr, s, element;
		
		switch (type) {
		case 'css':
			_element = "link";
			_type = "text/css";
			_attr = "href";
			break;
		case 'js':
			_element = "script";
			_type = "text/javascript";
			_attr = "src";
			break;
		}
		
		scr = document.getElementsByTagName(_element);
		s = scr[scr.length - 1];
		element = document.createElement(_element);
		element.type = _type;
		if (type == "css") {
			element.rel = "stylesheet";
		}
		if (element.readyState) {
			element.onreadystatechange = function () {
				if (element.readyState == "loaded" || element.readyState == "complete") {
					element.onreadystatechange = null;
					if (callback && typeof callback === "function") {
						callback();
					}
				}
			};
		} else {
			element.onload = function () {
				if (callback && typeof callback === "function") {
					callback();
				}
			};
		}
		element[_attr] = url;
		s.parentNode.insertBefore(element, s.nextSibling);
	};

	var opts = {};
	<?php
	if (isset($tpl['arr']) && is_array($tpl['arr']))
	{
		printf('opts = %s;', pjAppController::jsonEncode($tpl['arr']));
	}
	?>
	
	pjDrawSearch_Init = function () {
		loadRemote("<?php echo PJ_INSTALL_URL . pjObject::getConstant('pjDrawSearch', 'PLUGIN_CSS_PATH'); ?>pjDrawSearch.css", "css", function () {
			loadRemote("<?php echo PJ_INSTALL_URL . pjObject::getConstant('pjDrawSearch', 'PLUGIN_JS_PATH'); ?>pjDrawSearch.js", "js", function () {
				if (pjDrawSearch_Maps == null) {
				    pjDrawSearch_Maps = new pjDrawSearch(opts);
				}
				pjDrawSearch_Maps.drawing();
				pjDrawSearch_Maps.draw();
				google.maps.event.addDomListener(document.getElementById("pjDrawSearch_ClearMap"), "click", function() {
				    pjDrawSearch_Maps.clearOverlays();
				});
			});
		});
	};
	
	loadRemote("http://maps.googleapis.com/maps/api/js?sensor=false&libraries=drawing&callback=pjDrawSearch_Init", "js", function () {});
})();
</script>