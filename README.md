# FilipMapLatLng
Library contains usefull function for processing latitute and lognitude for any kind of maps (google maps, bing ,openstreet etc.)

## Installation

	1.git clone https://github.com/fico7489/FilipMapLatLng.git
	2.cd FilipMapLatLng
	3.composer install
	4.You can see examples in demo folder
	
	
	
## How use
	
	require_once '/../vendor/autoload.php';
	use FilipMapLatLng\MapLatLng;
			
	$lat = '16.16';
	$lng = '18,18';
	$count = 15;
	$offset = 25;
	
	$map = new MapLatLng();
	$locations = $map->algorithm_locations($lat, $lng, $count, $offset);
	
	
## When use

1.You have two points(latlng) and want calculate distance

	$lat = 88.898556;
	$lng = 67.037852;
	$lat2 = 38.897147;
	$lng2 = 77.145;
	$unit = "K";
	$distance = $map->distance($lat, $lng, $lat2, $lng2, $unit);

2.You have one point(latlng) and want place many markers on this place and you need to group markers around

	$lat = 45.791691;
	$lng = 15.978928;
	$count = 22;
	$offset = 20;
	$locations = $map->algorithm_locations($lat, $lng, $count, $offset);
	
## Test
	
	
	All code is covered with test (PHPUnit)
	All test are in /test folder

## Credits
	
Enjoy free in this library :)
	
	
	