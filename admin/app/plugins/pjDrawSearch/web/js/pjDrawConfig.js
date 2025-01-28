var jQuery_1_8_2 = jQuery_1_8_2 || $.noConflict();
(function ($, undefined) {
	$(function () {
		"use strict";
		
		var map, marker,
			$form = $("#pjDrawSearchForm"),
			$lat = $form.find("input[name='lat']"),
			$lng = $form.find("input[name='lng']"),
			$zoom = $form.find("input[name='zoom']"),
			myLat = parseFloat($lat.val()),
			myLng = parseFloat($lng.val()),
			myZoom = parseInt($zoom.val(), 10);
		
		function pjDrawSearchInit() {
			var mapOptions = {
				zoom: myZoom,
	            center: new google.maps.LatLng(myLat, myLng),
	            mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			map = new google.maps.Map(document.getElementById("drawSearchCanvas"), mapOptions);
			
			marker = new google.maps.Marker({
				map: map,
				draggable: true,
				position: new google.maps.LatLng(myLat, myLng)
			});
			
			google.maps.event.addListener(marker, "dragend", function () {
				var point = marker.getPosition();
				map.panTo(point);
				$lat.val(point.lat().toFixed(6));
				$lng.val(point.lng().toFixed(6))
			});
			
			google.maps.event.addListener(map, "zoom_changed", function () {
				$zoom.val(map.getZoom());
			});
		}
		
		pjDrawSearchInit();
		
	});
})(jQuery_1_8_2);