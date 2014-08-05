<?php

class Department extends \Eloquent {
	protected $fillable = ['name'];

	public static function selectlist()
	{
		$optlist = array();

		foreach (self::all() as $value) {
			$optlist[$value->id] = $value->name;
		}

		return $optlist;
	}
}