<?php
	class PostModel extends Model{

		public function get($url = ''){

			$this->query = ($url != '')
			?"SELECT * FROM post WHERE url = '$url'"
			:"SELECT * FROM post ORDER BY fecha";

			$this->get_query();

			$num_rows = count($this->rows);

			$data = array();

			foreach ($this->rows as $key => $value) {
				array_push($data, $value);
			}
			
			return $data;
		}

		public function getUrl($titulo = ''){
			$this->query = "SELECT * FROM post WHERE titulo = '$titulo'";			
			$this->get_query();

			$num_rows = count($this->rows);

			$data = array();

			foreach ($this->rows as $key => $value) {
				array_push($data, $value);
			}
			
			return $data;
		}

		public function del($titulo = ''){
			$this->query = "DELETE FROM post WHERE titulo = $titulo";
			$this->set_query();
		}

		public function set($post_data = array()){

			foreach ($post_data as $key => $value) {
				$$key = $value;
			}

			$url = $this->setUrl($titulo);
			$this->query = "REPLACE INTO post (url, titulo, cuerpo, fecha, user) VALUES ('$url', '$titulo', '$cuerpo', NOW(), '$user')";
			$this->set_query();
		}

		public function setUrl($titulo = ''){
			$url = preg_split("/[\s]/", $titulo);
			$string ='';
			for ($i=0; $i < count($url) ; $i++) { 
				if($i == count($url)-1){
					$string.= $url[$i];	
				}else{
					$string.= $url[$i].'-';
				}
			}
			return $string;
		}

		public function postCount(){
			$this->query = "SELECT COUNT(url) FROM post";

			return $this->get_simple_query();
		}
	}

?>