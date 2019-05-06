<?php

	class ComentController{
		private $model;

		public function __construct(){
			$this->model = new ComentModel();
		}

		public function get($titulo_post = ''){
			return $this->model->get($titulo_post);
		}

		public function del( $post_id = '' ){
			return $this->model->del($post_id);			
		}

		public function set( $post_data = array() ){
			return $this->model->set($post_data);
		}

		public function comentCount( $post_data = array() ){
			return $this->model->comentCount($post_data);
		}


	}
?>