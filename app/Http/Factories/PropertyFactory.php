<?php

namespace App\Http\Factories;


use App\Property;

class PropertyFactory extends Factory
{
	public static function store($title, $code, $type, $cep, $rua, $city, $state, $neighborhood, $number, $complement, $price, $area, $rooms, $suites, $bathrooms, $living_rooms, $garages, $description, $image = null) {
		$property = new Property;

		$property->title = $title;
		$property->code = $code;
		$property->type = $type;
		$property->cep = $cep;
		$property->rua = $rua;
		$property->city = $city;
		$property->state = $state;
		$property->neighborhood = $neighborhood;
		$property->number = $number;
		$property->complement = $complement;
		$property->price = $price;
		$property->area = $area;
		$property->rooms = $rooms;
		$property->suites = $suites;
		$property->bathrooms = $bathrooms;
		$property->living_rooms = $living_rooms;
		$property->description = $description;
		$property->garages = $garages;
		$property->image = $image;

		$property->save();

		return $property;
	}

	public static function update(Property $property, $title, $code, $type, $cep, $rua, $city, $state, $neighborhood, $number, $complement, $price, $area, $rooms, $suites, $bathrooms, $living_rooms, $garages, $description, $image = null) {
		$property->title = $title;
		$property->code = $code;
		$property->type = $type;
		$property->cep = $cep;
		$property->rua = $rua;
		$property->city = $city;
		$property->state = $state;
		$property->neighborhood = $neighborhood;
		$property->number = $number;
		$property->complement = $complement;
		$property->price = $price;
		$property->area = $area;
		$property->rooms = $rooms;
		$property->suites = $suites;
		$property->bathrooms = $bathrooms;
		$property->living_rooms = $living_rooms;
		$property->description = $description;
		$property->garages = $garages;
		$property->image = $image;

		$property->save();

		return $property;
	}

	public static function destroy(Property $property) {
		return $property->delete();;
	}

	public static function getProperty_byCode($code) {
		$property = Property::where('code', '=', $code)->first();

		return $property;
	}

	public static function getProperties_byCode($code) {
		$property = Property::where('code', 'like', '%'. $code .'%')->paginate(15);

		return $property;
	}
}