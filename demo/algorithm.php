<?php
	if(isset($_POST['lat'])){
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];
		$count = $_POST['count'];
		$offset = $_POST['offset'];
	}else{
		$lat = '45.791691';
		$lng = '15.978928';
		$count = '15';
		$offset = '20';
	}
?>

<form action="" method="post">
	Lat:<input name="lat" value="<?php echo $lat; ?>" /><br/>
	Lng:<input name="lng" value="<?php echo $lng; ?>" /><br/>
	Count:<input name="count" value="<?php echo $count; ?>" /><br/>
	Meters offset:<input name="offset" value="<?php echo $offset; ?>" /><br/>
	
	
	<input value="Show data" type="submit" name="submit"/>
	<input value="Show map" type="submit"  name="submit2"/>
</form>

<?php
	require_once '/../vendor/autoload.php';
	use FilipMapLatLng\MapLatLng;
		
	if(isset($_POST['lat'])){
		$map = new MapLatLng();
				
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];
		$count = $_POST['count'];
		$offset = $_POST['offset'];
		
		
		
		$locations = $map->algorithm_locations($lat, $lng, $count, $offset);
		
		
		
		
		if(isset($_POST['submit'])){
			echo '<pre>';
			print_r($locations);
			echo '</pre>';
		}else{
			//
		}
	}

	
	

?>