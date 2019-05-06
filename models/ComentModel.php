<?php
	class ComentModel extends Model{

		public function get($url = ''){

			$this->query = ($url != '')
			?"SELECT * FROM comentario WHERE url = '$url'"
			:"SELECT * FROM comentario";

			$this->get_query();

			$num_rows = count($this->rows);

			$data = array();

			foreach ($this->rows as $key => $value) {
				array_push($data, $value);
			}
			
			return $data;
		}

		public function del($id_comentario = ''){
			$this->query = "DELETE FROM comentario WHERE id_comentario = $id_comentario";
			$this->set_query();
		}

		public function set($post_data = array()){
			foreach ($post_data as $key => $value) {
				$$key = $value;
			}
			$this->query = "REPLACE INTO comentario (contenido, fecha,  user, url) VALUES ('$contenido', NOW(),'$user', '$url')";
			$this->set_query();
		}

		public function comentCount(){
			$this->query = "SELECT COUNT(*) FROM comentario";

			return $this->get_simple_query();
		}
	}

?>