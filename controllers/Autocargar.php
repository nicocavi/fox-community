<?php
	
	class Autoload{
		public function __construct(){
			spl_autoload_register(function($class_name){
				$model_path = './models/'.$class_name.'.php';
				$controllers_path = './controllers/'.$class_name.'.php';

				if(file_exists($model_path))
					require_once($model_path);
				

				if(file_exists($controllers_path))
					require_once($controllers_path);

			});
		}
	}