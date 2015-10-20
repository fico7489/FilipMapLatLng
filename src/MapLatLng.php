<?php
namespace FilipMapLatLng;


class MapLatLng{
	
	/**
	 * Calculates distance between first latlng and second latlng
	 * Prema: http://www.geodatasource.com/developers/php
	 * 
	 * @param decimal $lat1 latitude first point
	 * @param decimal $lon1 longitude first point
	 * @param decimal $lat2 latitude second point
	 * @param decimal $lon2 longitude second point
	 * @param string  $unit('M' is statute miles (default), 'K' is kilometers, 'N' is nautical miles)
	 * 
	 * @return number
	 */
	public static function distance($lat1, $lon1, $lat2, $lon2, $unit = "K"){
		$lat1 = floatval($lat1);
		$lon1 = floatval($lon1);
		$lat2 = floatval($lat2);
		$lon2 = floatval($lon2);
		
		$theta = $lon1 - $lon2;
		$dist = sin ( deg2rad ( $lat1 ) ) * sin ( deg2rad ( $lat2 ) ) + cos ( deg2rad ( $lat1 ) ) * cos ( deg2rad ( $lat2 ) ) * cos ( deg2rad ( $theta ) );
		$dist = acos ( $dist );
		$dist = rad2deg ( $dist );
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper ( $unit );
		if ($unit == "K") {
			return ($miles * 1.609344);
		} else if ($unit == "N") {
			return ($miles * 0.8684);
		} else {
			return $miles;
		}
	}
	
	
	/**
	 * Function calculates locations around one point latlng in way that locations are placed around(circle) first location
	 * 
	 * @param decimal $lat
	 * @param decimal $lng
	 * @param number $offset Distance between latlng point
	 * @return array
	 */
	public static function algorithm_locations($lat, $lng, $offset = 15) {
		
		return false;
	}
	
}








?>