<?php

namespace MR4Web_API\Utils;

class Res {
	private static $_res = array();

	private function __construct(){}
	private function __clone(){}

	public static function addError($key, $value)
	{
		self::$_res['error'][$key] = $value;
	}

	public static function add($key, $value)
	{
		self::$_res['response'][$key] = $value;
	}	

	public function appendInvalidParams()
	{
		self::addError('status', 1);
		self::addError('message', 'Error: input parameters!');
	}

	public function appendSuccessPurchase()
	{
		self::add('activate', 1);
		self::add('message', 'Successfully Activated, Thank you for Purchasing <b>ADLinker</b>. ');
	}

	public function appendValidParams()
	{
		self::addError('status', 0);
		self::addError('message', '');
	}

	public static function emit()
	{
		self::$_res['cost_time'] = microtime(true) - START_TIME;

		header('Content-type: application/json');
		echo json_encode(self::$_res);
	}
}

?>