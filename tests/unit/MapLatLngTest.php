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
		}
	}

