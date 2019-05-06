<?php

	class PostController{
		private $model;

		public function __construct(){
			$this->model = new PostModel();
		}
		
		public function get($post_id = ''){
			return $this->model->get($post_id);
		}

		public function postCount(){
			return $this->model->postCount();
		}

		public function search($url = ''){
			return $this->model->search($url);
		}

		public function del( $post_id = '' ){
			return $this->model->del($post_id);			
		}

		public function set( $post_data = array() ){
			return $this->model->set($post_data);
		}


	}
?>