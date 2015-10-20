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
			?>
				<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script>
				<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.css" />
				<script src="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.js"></script>
				<style>#map { height: 600px; width: 600px; margin: auto; }</style>
				<div id="map"></div>
				<script>
					$(document).ready(function(){
						var locations = {"locations" : [
						<?php 
							$i = 0;
							foreach($locations as $location){ 
								$i++;
						?>
							{"lat" : "<?php echo $location['lat']; ?>", "lng" : "<?php echo $location['lng']; ?>"}
							<?php 
								if(count($locations) > $i){
									echo ',';
								}
							?>
							
						<?php } ?>
						
						]};
						
						
						var map = L.map('map').setView([<?php echo $lat; ?>, <?php echo $lng; ?>], 12);
						
						L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
							attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
							maxZoom: 18,
							id: 'fico7489.cifz676em02hst6m75krbn2jk',
							accessToken: 'pk.eyJ1IjoiZmljbzc0ODkiLCJhIjoiY2lmejY3Nm9kMDJreHRjbTBzN2wwcXVqOSJ9.HHyU4-GCaEmxZV0Wn0xrpg'
						}).addTo(map);
						
						L.marker([<?php echo $lat; ?>, <?php echo $lng; ?>]).addTo(map);
						
						locations.locations.forEach(function(location) {
							var lat = location.lat;
							var lng = location.lng;
							
							L.marker([lat, lng]).addTo(map);
						});
					});
				</script>
				<br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<?php
		}
	}

	
	

?>