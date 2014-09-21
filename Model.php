<?php
class Model {


	function __construct(PDO $con){

		$this->con=$con;

	}

	
	//Abstracted function to get data from a db table
	public function get_tbl_data($tbl){
			$db = $this->con;
			//This is the line that is breaking
			$sql = "SELECT * FROM" . " " . $tbl;
			
			$stmt = $db->query($sql);
			$tbl_data = $stmt->fetchALL(PDO::FETCH_ASSOC);

			return $tbl_data;
	}

}

?>