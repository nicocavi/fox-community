<?php
	class UserModel extends Model{

		public function get($name_user = ''){

			$this->query = ($name_user != '')
			?"SELECT * FROM users WHERE name_user = '$name_user'":"SELECT * FROM users";

			$this->get_query();

			$num_rows = count($this->rows);

			$data = array();

			foreach ($this->rows as $key => $value) {
				array_push($data, $value);
			}
			
			return $data;
		}

		public function num_comentarios($name_user = ''){
			$this->query = "SELECT COUNT(id_comet) FROM comentario WHERE user = '$name_user'";

			return $this->get_simple_query();
		}

		public function validate_user($user, $pass) {
			$this->query = "SELECT * FROM users WHERE name_user = '$user' AND pass = MD5('$pass')";
			$this->get_query();
			$data = array();
			foreach ($this->rows as $key => $value) {
				array_push($data, $value);
			}
			return $data;
		}

		public function num_post($name_user = ''){
			$this->query = "SELECT COUNT(titulo) FROM post WHERE user = '$name_user'";

			return $this->get_simple_query();
		}

		public function userCount(){
			$this->query = "SELECT COUNT(*) FROM users";

			return $this->get_simple_query();
		}

		public function get_post($name_user = ''){

			$data = array();

			$this->query = "SELECT * FROM post WHERE user = '$name_user'";

			$this->get_query();

			$num_rows = count($this->rows);

			$data = array();

			foreach ($this->rows as $key => $value) {
				array_push($data, $value);
			}
			
			return $data;
		}

		public function del($name_user = ''){
			$this->query = "DELETE FROM users WHERE name_user = $name_user";
			$this->set_query();
		}

		public function set( $user_data = array() ) {
			foreach ($user_data as $key => $value) {
				$$key = $value;
			}
			
			$this->query = "INSERT INTO users VALUES ('$name_user', MD5('$pass'), '$email', '$nombre', '$puntos', '$estado','$rango', '$apellido', '$img_perfil', '$img_portada')";
			$this->set_query();
		}

		
	}

?>
