<?php

	abstract class Model{

		private static $db_name = 'foro';
		private static $db_pass = '';
		private static $db_user_name = 'root';
		private static $db_host = 'localhost';
		private static $db_charset = 'utf8';

		protected  $query;
		private $conn;
		protected $rows = array();

		abstract protected function set();
		abstract protected function del();
		abstract protected function get();

		protected function db_open(){
			$this->conn = new mysqli(
				self::$db_host,
				self::$db_user_name,
				self::$db_pass,
				self::$db_name
			);
			$this->conn->set_charset(self::$db_charset);
		}

		private function db_close() {
			$this->conn->close();
		}

		protected function set_query(){
			$this->db_open();
			$this->conn->query($this->query);
			$this->db_close();
		}


		protected function get_simple_query(){
			$this->db_open();

			$result = $this->conn->query($this->query);
			$aux = $result->fetch_assoc();
			$result->close();

			$this->db_close();

			return array_pop($aux);
		}

		protected function get_query(){
			$this->db_open();

			$result = $this->conn->query($this->query);
			
			while($this->rows[]=$result->fetch_assoc());

			$result->close();

			$this->db_close();
			
			return array_pop($this->rows);	
		}

	}

?>