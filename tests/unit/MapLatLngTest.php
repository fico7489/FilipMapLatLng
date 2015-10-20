<?php
	require_once '/../../vendor/autoload.php';
	
	use FilipMapLatLng\MapLatLng;
	
	class MapLatLngTest extends \PHPUnit_Framework_TestCase
	{
		
		function testDistance()
		{
			$map = new MapLatLng();
			$distance = $map->distance(2, 2, 2, 2);
			
			$this->assertEquals(null, $distance);
			
			
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
			$distance = $map->algorithm_locations(2, 2, 2);
			
			$this->assertEquals(false, $distance);
		}
	}

