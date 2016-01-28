<script language="javascript">


function scroll_up()
{
	$('body,html,ul').animate({
		scrollTop: 0
	}, 800);
}

function dd2dms(lat, lon) {
	console.log(lat);
	console.log(lon);
	var returnArr = new Array();
	// got dashes?
	if (lat.substr(0,1) == "-") {
		//dmsLatHem.options.selectedIndex = 1;
		ddLatVal = lat.substr(1,lat.length-1);
		ddLatType = 'S';
	} else {
		//dmsLatHem.options.selectedIndex = 0;
		ddLatVal = lat;
		ddLatType = 'N';
	}

	returnArr[0] = ddLatType;
	if (lon.substr(0,1) == "-") {
		//dmsLongHem.options.selectedIndex = 1;
		ddLongVal = lon.substr(1,lon.length-1);
		ddLonType = 'W';
	} else {
		//dmsLongHem.options.selectedIndex = 0;
		ddLongVal = lon;
		ddLonType = 'E';
	}
	
	returnArr[1] = ddLonType;
	// degrees = degrees
	ddLatVals = ddLatVal.split(".");
	dmsLatDeg = ddLatVals[0];
	returnArr[2] = dmsLatDeg;
	
	ddLongVals = ddLongVal.split(".");
	dmsLongDeg = ddLongVals[0];
	returnArr[3] = dmsLongDeg;
	
	// * 60 = mins
	ddLatRemainder  = ("0." + ddLatVals[1]) * 60;
	dmsLatMinVals   = ddLatRemainder.toString().split(".");
	dmsLatMin = dmsLatMinVals[0];
	returnArr[4] = dmsLatMin;
	
	ddLongRemainder  = ("0." + ddLongVals[1]) * 60;
	dmsLongMinVals   = ddLongRemainder.toString().split(".");
	dmsLongMin = dmsLongMinVals[0];
	returnArr[5] = dmsLongMin;
	
	// * 60 again = secs
	ddLatMinRemainder = ("0." + dmsLatMinVals[1]) * 60;
	dmsLatSec   = Math.round(ddLatMinRemainder);
	returnArr[6] = dmsLatSec;
	
	ddLongMinRemainder = ("0." + dmsLongMinVals[1]) * 60;
	dmsLongSec   = Math.round(ddLongMinRemainder);
	returnArr[7] = dmsLongSec;
	for(i=0; i<returnArr.length; i++) {
		console.log(i + ' - ' + returnArr[i]);
	}
	return returnArr;
}

function round100000(v) {
	return Math.round(v * 100000) / 100000;
}

function makeTime(num) {
	returnnum = new Array();
	if (num) {
		returnnum[0] = parseInt(num);
		num -= parseInt(num); num *= 60;
		returnnum[1] = parseInt(num);
		num -= parseInt(num); num *= 60;
		returnnum[2] = parseInt(num);
	}

	return returnnum;
}

function gettimezone(lat, lng, name, country, xtra, geonameId)
{
	//$('#locations_error').html(loadingicon);
	//scroll_up();
	url = "/horo/fetch?timezone=1&lat="+lat+"&lng="+lng;
	console.log(url);
	var jqxhr = $.get(url, function(data) {
		if ($('#dst_0').attr('checked')) {
			//returnnum = makeTime(Math.abs(data.dstOffset));
			dst = 1;
		} else {
			dst = 0;
		}
		var returnnum = makeTime(Math.abs(data.rawOffset));
		lat = lat.toString();
		lng = lng.toString();
		returnlatlng = dd2dms(lat, lng);
		lat_h = returnlatlng[2];
		lat_m = returnlatlng[4];
		lat_s = (returnlatlng[0] == 'S') ? 1 : 0;
		lon_h = returnlatlng[3];
		lon_m = returnlatlng[5];
		lon_e = (returnlatlng[1] == 'E') ? 1 : 0;
		url = "/horo/locationset";
		params = "location_name="+name+"&xtra="+xtra+"&country="+country+"&location_lat="+lat+"&location_lon="+lng+"&dst="+dst+"&lat_h="+lat_h+"&lat_m="+lat_m+"&lat_s="+lat_s+"&lon_h="+lon_h+"&lon_m="+lon_m+"&lon_e="+lon_e+"&zone_h="+returnnum[0]+"&zone_m="+returnnum[1]+"&geonameId="+geonameId;
		var jqxhr1 = $.post(url, params, function(data) {
			console.log(data);
			if (data.error == 1) {
				$('#locations_error').html(data.error_message);
			} else {
				$('#locations_error').html('Location saved successfully');
			}
		})
		.error(function() { $('#locations_error').html("Could not connect. Please try again later."); });
		return false;
	})
	.error(function() { $('#locations_error').html("Could not connect. Please try again later."); })
	return false;
}
$(document).ready(function() {
	$('#frmloc').submit(function() {
		$('#locations_error').html(loadingicon);
		if (!$('#citysearch').val()) {
			$('#locations_error').html('Please enter city name');
			return false;
		}
		//url = "http://api.geonames.org/searchJSON?q="+encodeURIComponent($('#citysearch').val())+"&maxRows=100&username=websmc";
		url = "/horo/fetch?q="+encodeURIComponent($('#citysearch').val());
		var jqxhr = $.get(url, function(data) {
			if (data.totalResultsCount == 0) {
				$('#locations_error').html('No City Found. Try searching another city');
				$('#locations_list').html('');
			} else {
				str = '<br>';
				$.each(data.geonames, function(key, value) {
					str += '<li><h3>'+value.name+ '</h3><p><a href="#" onClick="gettimezone(\''+value.lat+'\', \''+value.lng+'\', \''+value.name+'\', \''+value.countryName+'\', \''+value.adminName1+'\', \''+value.geonameId+'\')">Save Location</a><p>Lat: '+value.lat+'</p><p>Lng: '+value.lng+'</p><p>Country: '+value.countryName+'</p><p>'+value.adminName1+'</p></li>';
				});
				$('#locations_list').html(str);
				$('#locations_error').html('');
			}
		})
		.error(function() { alert("Could not connect. Please try again later."); })
		return false;
	});
});
</script><fieldset>
	<legend><strong>Search Location</strong></legend>
<form name="frmloc" id="frmloc" method="post" action="">
	<p><label for="citysearch">City:</label>
	<input type="search" name="citysearch" id="citysearch" value="" size="50" /></p>
<p><input type="checkbox" name="dst" id="dst_0" class="custom" value="1" />
		<label for="dst_0">Day Light Saving</label></p>
<input type="submit" value="Search" />
</form>
	</fieldset>
<div class="error" id="locations_error"></div>
<ul data-role="listview" id="locations_list">
</ul>