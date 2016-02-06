							<div class="mapborder">
								<div id="map_agency" class="gmap"></div>
							</div>
							
							<!-- Agencies list -->
							<script src="js/agencies.js"></script>
							
							<script type="text/javascript">
								(function($){
									"use strict";
									
									$(document).ready(function(){
										//Create agencies map with markers and populate dropdown agencies list.
										Cozy.agencyMap(agencies, "map_agency");
									});
								})(jQuery);
							</script>