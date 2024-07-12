<?php 

	class TestController extends Controller

	{

		public function index()
		{
			$resp = _sms_instance();
			dd([
				'smstest',
				$resp
			]);
			die();

			$test = "300.31";

			var_dump(floatval($test) - 100);
		}
	}