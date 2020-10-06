<?php
namespace App\Models;


class Constant {

	const MESSAGE_SUCCESS = 'message_success';
	const MESSAGE_ERROR = 'message_error';
	const MESSAGE_WARNING = 'message_warning';
	const MESSAGE_INFO = 'message_info';

	const CREATE = "create";
	const UPDATE = "update";
	const DELETE = "delete";

	const MOTORCYCLE = 0;
	const BICYCLE = 1;
	const MOTORCYCLE_NAME = "Motocicleta";
	const BICYCLE_NAME = "Bicicleta";

	/* Product status */
	const INACTIVE = 0;
	const ACTIVE = 1;
	const SOLD = 2;
	const STOLEN = 3;

	public static function statusName() {
		return $values = array(self::INACTIVE => 'Inactivo', self::ACTIVE => 'Activo');
	}
	
	/* Product  */
	const USED_PRODUCT = 0;
	const NEW_PRODUCT = 1;
	
	public static function productValueName() {
		return $values = array(self::NEW_PRODUCT => 'Nuevo', self::USED_PRODUCT => 'Usado');
	}

	/* BIKE SIZE */
	const BIKE_SIZE_DEFAULT = 0;
	const BIKE_SIZE_S = 1;
	const BIKE_SIZE_M = 2;
	const BIKE_SIZE_L = 3;

	public static function bikeSizeName() {
		return $values = array(self::BIKE_SIZE_DEFAULT => 'Indefinido', self::BIKE_SIZE_S => 'Pequeño',
			self::BIKE_SIZE_M => 'Mediano', self::BIKE_SIZE_L => 'Grande'
		);
	}


	/* BIKE SIZE */
	const GAS = 0;
	const DIESEL = 1;
	
	public static function gasName() {
		return $values = array(self::GAS => 'Gasolina', self::DIESEL => 'Diesel',
		);
	}
	
	
	const CATALOG_BICYCLE_BRAND_ID = 1;
	const CATALOG_MOTORCYCLE_BRAND_ID = 2;
	const CATALOG_BICYCLE_MODEL_ID = 3;
	const CATALOG_MOTORCLE_MODEL_ID = 4;
	const CATALOG_BICYCLE_TYPE_ID = 5;
	const CATALOG_MOTO_TYPE_ID = 6;
	const CATALOG_CITY_ID = 7; 
	
	const GALERY_PAGINATION = 9; // pagination for galery
}
