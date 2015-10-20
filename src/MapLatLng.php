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
	 * Računa nove lat i lng na temelju postojeće i danog offseta prema x i y osi, vraća se polje sa novom lat i lng
	 * 
	 * @param decimal $lat
	 * @param decimal $lon
	 * @param decimal $dn
	 * @param decimal $de
	 * @return array polje sa novimm lat i lng
	 */
	private function offset_latlng($lat, $lon, $dn, $de) {
		$R = 6378137;
		$Pi = 3.14;
		
		$dLat = $dn / $R;
		$dLon = $de / ($R * cos ( $Pi * $lat / 180 ));
		
		$lat2 = $lat + $dLat * 180 / $Pi;
		$lng2 = $lon + $dLon * 180 / $Pi;
		
		return array (
			'lat' => $lat2,
			'lng' => $lng2 
		);
	}
	/**
	 * Function calculates locations around one point latlng in way that locations are placed around(circle) first location
	 * 
	 * @param decimal $lat
	 * @param decimal $lng
	 * @param number  $count Count of positions to return
	 * @param number  $offset Distance between latlng point
	 * @return array
	 */
	public function algorithm_locations($lat, $lng, $count, $offset = 15) {
		$locations = [];
		$counter = 0;
		$lap = 1;
		
		for ($i = 0; $i < $count; $i++) {
			if (($counter % 4 == 0)) {
				if ($counter != 0) {
					$latlng = $this->offset_latlng ( $lat, $lng, $lap * $offset, 0 );
					$lap++;
				} else {
					$latlng = ['lat' => round($lat, 12), 'lng' => round($lng, 12)];
				}
			} else if ($counter % 4 == 1) {
				$latlng = $this->offset_latlng ( $lat, $lng, 0, $lap * $offset );
			} else if ($counter % 4 == 2) {
				$latlng = $this->offset_latlng ( $lat, $lng, $lap * - $offset, 0 );
			} else if ($counter % 4 == 3) {
				$latlng = $this->offset_latlng ( $lat, $lng, 0, $lap * - $offset );
			}
			
			$locations[] = ['lat' => round($latlng['lat'], 12), 'lng' => round($latlng['lng'], 12)];
			$counter ++;
		}
		
		return $locations;
	}
	
}








?>