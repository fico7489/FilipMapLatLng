<?php
	require_once '/../../vendor/autoload.php';
	
	use FilipMapLatLng\MapLatLng;
	
	class MapLatLngTest extends \PHPUnit_Framework_TestCase
	{
		
		function testDistance()
		{
			$map = new MapLatLng();
			
			$lat = 88.898556;
			$lng = 67.037852;
			$lat2 = 38.897147;
			$lng2 = 77.145;
			$unit = "K";
			$distance = $map->distance($lat, $lng, $lat2, $lng2, $unit);
			$distance = round($distance, 4);
			$this->assertEquals('5561.566', $distance);
			
			$unit = "M";
			$distance = $map->distance($lat, $lng, $lat2, $lng2, $unit);
			$distance = round($distance, 4);
			$this->assertEquals('3455.7969', $distance);
			
			$unit = "N";
			$distance = $map->distance($lat, $lng, $lat2, $lng2, $unit);
			$distance = round($distance, 4);
			$this->assertEquals('3001.014', $distance);
			
			$lat2 = -38.897147;
			$unit = "K";
			$distance = $map->distance($lat, $lng, $lat2, $lng2, $unit);
			$distance = round($distance, 4);
			$this->assertEquals('14211.4221', $distance);
			
			$unit = "M";
			$distance = $map->distance($lat, $lng, $lat2, $lng2, $unit);
			$distance = round($distance, 4);
			$this->assertEquals('8830.5683', $distance);
		}
		
		function testAlgorithmLocations()
		{
			$map = new MapLatLng();
			
			
			$lat = 45.791691;
			$lng = 15.978928;
			$count = 22;
			$offset = 20;
			$locations = $map->algorithm_locations($lat, $lng, $count, $offset);
			
			$this->assertEquals(22, count($locations));
			$this->assertEquals('45.791691', $locations[0]['lat']);
			$this->assertEquals('15.978928', $locations[0]['lng']);
			
			$this->assertEquals('45.791691', $locations[1]['lat']);
			$this->assertEquals('15.979185690135', $locations[1]['lng']);
			
			$this->assertEquals('45.791511245815', $locations[2]['lat']);
			$this->assertEquals('15.978928', $locations[2]['lng']);
			
			$this->assertEquals('45.791691', $locations[3]['lat']);
			$this->assertEquals('15.978670309865', $locations[3]['lng']);
			
			$this->assertEquals('45.791870754185', $locations[4]['lat']);
			$this->assertEquals('15.978928', $locations[4]['lng']);
			
			$this->assertEquals('45.791691', $locations[5]['lat']);
			$this->assertEquals('15.97944338027', $locations[5]['lng']);
		}
	}

