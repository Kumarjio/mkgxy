<?php
/*
$lat = 37.338475;
$lon = -121.885794;
$locations = array(
		array('latitude' => 37.338475, 'longitude' => -121.885794, 'heading' => 'heading is here', 'body' => 'body is here', 'image' => 'http://media-cache-ec0.pinimg.com/avatars/dearbollywood_1350627744_30.jpg'),
		array('latitude' => 37.338475, 'longitude' => -121.886, 'heading' => 'heading1 is here', 'body' => 'body1 is here', 'image' => 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/t5/s48x48/276802_472155079572449_838359361_q.jpg'),
	);
*/
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<meta charset="UTF-8">
<title><?php echo $lat; ?>,<?php echo $lon; ?></title>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBvXqWIcqyTVRgjXsVjDbdORcNaXHVjtOw&sensor=true"></script>
<style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
<script language="javascript">
function initialize() {
	var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lon; ?>);
	var mapOptions = {
		zoom: 19,
		center: myLatlng,
		panControl: true,
		zoomControl: true,
		scaleControl: true
	}
	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	var markers = new Array(<?php echo count($locations); ?>);
	var info = new Array(<?php echo count($locations); ?>);
	var contentString = "";
	var infowindow;
	var myLatLng2;
	
	var imagea = 'http://world.mkgalaxy.com/api/images/map-icon-a.png';
	var imageb = 'http://world.mkgalaxy.com/api/images/map-icon-b.png';
	var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			icon: imagea
		});
	setMarkers(map);
	function setMarkers(map) {
		<?php if (!empty($locations)) { ?>
			<?php foreach ($locations as $k => $loc) { ?>
				myLatLng2 = new google.maps.LatLng(<?php echo $loc['latitude']; ?>,<?php echo $loc['longitude']; ?>);
				markers[<?php echo $k; ?>] = new google.maps.Marker({
					position: myLatLng2,
					map: map,
					icon: imageb
				});
				contentString = '<div class="content">'+
					'<div class="siteNotice">'+
					'</div>'+
					'<h1 class="firstHeading"><?php echo $loc['phone']; ?></h1>'+
					'<div class="bodyContent">'+
					'<p></p>'+
					'</div>'+
					'</div>';
				info[<?php echo $k; ?>] = new google.maps.InfoWindow({
					content: contentString
				});
				google.maps.event.addListener(markers[<?php echo $k; ?>], 'click', function() {
					info[<?php echo $k; ?>].open(map,markers[<?php echo $k; ?>]);
				});
			<?php } ?>
		<?php } ?>
	}
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
<div id="map-canvas"></div>
</body>
</html>