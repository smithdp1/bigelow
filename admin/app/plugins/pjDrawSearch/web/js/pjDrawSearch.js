(function (window, undefined){
	"use strict";

	function pjDrawSearch(opts) {
		if (!(this instanceof pjDrawSearch)) {
			return new pjDrawSearch(opts);
		}
		this._defaults = {
			strokeColor: "#1B7BDC",
			fillColor: "#4295E8",
			zoom: 8,
			lat: 40.65,
			lng: -73.95,
			form_id: "search_form",
			field_name: "data",
			markers: []
		};
		this.opts = {};
	    this.map = null;
	    this.drawingManager = null;
	    this.init(opts);
	}
	pjDrawSearch.prototype = {
	    init: function(opts) {
	        var x,
	        	self = this;
	        
	        for (x in this._defaults) {
	        	if (this._defaults.hasOwnProperty(x)) {
	        		this.opts[x] = this._defaults[x];
	        	}
	        }
	        for (x in opts) {
	        	if (opts.hasOwnProperty(x)) {
	        		this.opts[x] = opts[x];
	        	}
	        }

	        this.map = new google.maps.Map(document.getElementById("pjDrawSearch_Canvas"), {
	            zoom: this.opts.zoom,
	            center: new google.maps.LatLng(this.opts.lat, this.opts.lng),
	            mapTypeId: google.maps.MapTypeId.ROADMAP
	        });
	        return this;
	    },
	    draw: function () {
			var input,
				self = this,
				form = document.getElementById(this.opts.form_id),
				mapBounds = new google.maps.LatLngBounds(),
				marker, markerOpts,
				infowindow = new google.maps.InfoWindow();
			
			for (var i = 0, iCnt = this.opts.markers.length; i < iCnt; i++) {
				markerOpts = {
					position: new google.maps.LatLng(this.opts.markers[i].lat, this.opts.markers[i].lng),
					map: this.map,
					title: this.opts.markers[i].title
				};
				if (this.opts.markers[i].icon) {
					markerOpts.icon = this.opts.markers[i].icon;
				}
				if (this.opts.markers[i].shadow) {
					markerOpts.shadow = this.opts.markers[i].shadow;
				}
				marker = new google.maps.Marker(markerOpts);
				pjDrawSearch_Overlays.push(marker);
				if (this.opts.markers[i].clickable !== undefined && this.opts.markers[i].clickable === false) {
					continue;
				}
				marker.content = this.opts.markers[i].content;
				
				google.maps.event.addListener(marker, 'click', function () {
					infowindow.setContent(this.content);
					infowindow.open(self.map, this);
				});
			}
			
			for (var j = 0, jCnt = form.elements.length; j < jCnt; j++) {
				if (form.elements[j].nodeName === 'INPUT' && form.elements[j].name === this.opts.field_name) {
					input = form.elements[j];
					
					var path,
						str = input.value.replace(/\(|\s+/g, ""),
						arr = str.split("),"),
						paths = [];
					arr[arr.length-1] = arr[arr.length-1].replace(")", "");
					for (var i = 0, iCnt = arr.length; i < iCnt; i++) {
						path = new google.maps.LatLng(arr[i].split(",")[0], arr[i].split(",")[1]);
						paths.push(path);
						mapBounds.extend(path);
					}
					var polygon = new google.maps.Polygon({
						paths: paths,
						strokeColor: this.opts.strokeColor,
						strokeOpacity: 1,
						strokeWeight: 1,
						fillColor: this.opts.fillColor,
						fillOpacity: 0.5,
			            editable: true
				    });
					polygon.setMap(this.map);
						
					pjDrawSearch_Overlays.push(polygon);
					
					google.maps.event.addListener(polygon.getPath(), "insert_at", function (index) {
                    	self.update.call(self, polygon, input, 'polygon');
     	            });
     	            google.maps.event.addListener(polygon.getPath(), "set_at", function (index, path) {
     	            	self.update.call(self, polygon, input, 'polygon');
     	            });
			
			        this.drawingManager.setOptions({
		            	drawingMode: null,
		            	drawingControl: false
		            });
					
					//Zoom fix
					this.map.fitBounds(mapBounds);
					break;
				}
			}
			
			if (pjDrawSearch_Overlays && pjDrawSearch_Overlays.length > 0) {
				var clearMap = document.getElementById("pjDrawSearch_ClearMap");
	            if (clearMap) {
	            	clearMap.removeAttribute("disabled");
	            }
			}
		},
	    drawing: function() {
	        var self = this;
	        
	        this.drawingManager = new google.maps.drawing.DrawingManager({
	            drawingMode: google.maps.drawing.OverlayType.POLYGON,
	            drawingControl: true,
	            drawingControlOptions: {
					position: google.maps.ControlPosition.TOP_CENTER,
					drawingModes: [
			            google.maps.drawing.OverlayType.POLYGON
			        ]
				},
	            polygonOptions: {
	                fillColor: this.opts.fillColor,
	                fillOpacity: 0.5,
	                strokeWeight: 1,
	                strokeColor: this.opts.strokeColor,
	                strokeOpacity: 1,
	                editable: true
	            }
	        });
	        this.drawingManager.setMap(this.map);
	
	        google.maps.event.addListener(this.drawingManager, 'overlaycomplete', function(event) {
	            var frm = document.getElementById(self.opts.form_id);
	            switch (event.type) {
	                case google.maps.drawing.OverlayType.POLYGON:
	                	var input = document.createElement("INPUT");
	                	input.setAttribute("type", "hidden");
	                	input.setAttribute("name", self.opts.field_name);
	                    frm.appendChild(input);
	                    self.update.call(self, event.overlay, input, 'polygon');
	                    
	                    google.maps.event.addListener(event.overlay.getPath(), "insert_at", function (index) {
	                    	self.update.call(self, event.overlay, input, 'polygon');
	     	            });
	     	            google.maps.event.addListener(event.overlay.getPath(), "set_at", function (index, path) {
	     	            	self.update.call(self, event.overlay, input, 'polygon');
	     	            });
	                    
	                    break;
	            }
	            
	            var clearMap = document.getElementById("pjDrawSearch_ClearMap");
		        if (clearMap) {
		        	clearMap.removeAttribute("disabled");
		        }
	            
	            self.drawingManager.setOptions({
	            	drawingMode: null,
	            	drawingControl: false
	            });
			            
	            pjDrawSearch_Overlays.push(event.overlay);
	        });
	    },
	    update: function(obj, elem, type) {
	        switch (type) {
	            case "polygon":
	                var str = [],
	                    paths = obj.getPaths();
	                paths.getArray()[0].forEach(function(el, i) {
	                    str.push(el.toString());
	                });
	                elem.value = str.join(", ");
	                break;
	        }
	    },
	    clearOverlays: function() {
	        if (pjDrawSearch_Overlays && pjDrawSearch_Overlays.length > 0) {
	            while (pjDrawSearch_Overlays[0]) {
	            	pjDrawSearch_Overlays.pop().setMap(null);
	            }
	        }
	        this.drawingManager.setOptions({
            	drawingMode: google.maps.drawing.OverlayType.POLYGON,
            	drawingControl: true
            });
	        var clearMap = document.getElementById("pjDrawSearch_ClearMap");
            if (clearMap) {
            	clearMap.setAttribute("disabled", "disabled");
            }
            var form = document.getElementById(this.opts.form_id);
            if (form) {
            	for (var i = 0, iCnt = form.elements.length; i < iCnt; i++) {
            		if (form.elements[i].nodeName === 'INPUT' && form.elements[i].name === this.opts.field_name) {
            			 form.elements[i].parentNode.removeChild(form.elements[i]);
            			 break;
            		}
            	}
            }
	    }
	};

	window.pjDrawSearch = pjDrawSearch;	
})(window);