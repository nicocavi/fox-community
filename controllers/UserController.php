<?php

	class UserController{
		private $model;

		public function __construct(){
			$this->model = new UserModel();
		}
		
		public function get($name_user = ''){
			return $this->model->get($name_user);
		}

		public function get_post($name_user = ''){
			return $this->model->get_post($name_user);
		}

		public function num_comentarios($name_user = ''){
			return $this->model->num_comentarios($name_user);
		}

		public function num_post($name_user = ''){
			return $this->model->num_post($name_user);
		}

		public function del( $name_user = '' ){
			return $this->model->del($name_user);			
		}

		public function set( $name_user = array() ){
			return $this->model->set($name_user);
		}

		public function userCount(){
			return $this->model->userCount();
		}



	}