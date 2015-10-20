<form action="" method="post">
	Lat:<input name="lat" value="45.791691" /><br/>
	Lng:<input name="lng" value="15.978928" /><br/>
	Lat2:<input name="lat2" value="46.305423" /><br/>
	Lng2:<input name="lng2" value="16.335983" /><br/>
	Distance(M,K or N):<input name="unit" value="K" /><br/>
	
	
	<input value="Calculate" type="submit"/>
</form>

<?php
	require_once '/../vendor/autoload.php';
	use FilipMapLatLng\MapLatLng;
		
	if(isset($_POST['lat'])){
		$map = new MapLatLng();
				
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];
		$lat2 = $_POST['lat2'];
		$lng2 = $_POST['lng2'];
		$unit = $_POST['unit'];
		$distance = $map->distance($lat, $lng, $lat2, $lng2, $unit);
		$distance = round($distance, 4);
		
		echo '<br/><br/>Distance:' . $distance;
	}

	
	

?>