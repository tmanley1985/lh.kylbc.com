<?php
class Model {


	function __construct(PDO $con){

		$this->con=$con;

	}

	
	//Abstracted function to get data from a db table
	public function get_tbl_data($tbl){
			//Grabs the PDO instance
			$db = $this->con;
			//Creates the sql template and updates the table
			$sql = "SELECT * FROM" . " " . $tbl;
			
			$stmt = $db->query($sql);
			$tbl_data = $stmt->fetchALL(PDO::FETCH_ASSOC);

			return $tbl_data;
	}

	//Gets Table names from post array
function get_tbl_names($new_rec){

	$col_names = array();
	//Flips the post array so that the indices become the values
	$indices = array_flip($new_rec);

	foreach ($indices as $key => $value) {
		//A variable variable
		$col_names[] = trim($value);
	}

	//Create new array and places commas for the sql query
	$col_name_sql = implode(",", $col_names );

	return $col_name_sql;
}

//Prepares the POST data to be a sql statement

function get_tbl_values($new_rec){
	$col_val = array();
	//Loops through and gives the values quotes for the query statement
	foreach($new_rec as $key => $value){
		$col_val[] = "'" . trim($value) . "'";
	}
	//Implodes the array and inserts commas for the query statement
	$col_val_sql = implode(',', $col_val);
	return $col_val_sql;

}

//Gets the first column name and appends an 's' to correspond to its table
function get_tbl_name($new_rec){
	$cols = $this->get_tbl_names($new_rec);
	$cols_exploded = explode(',', $cols);
	$tbl_name = $cols_exploded[0] . 's';
	return $tbl_name;
}

	//Abstracted function for Admin to insert new record in database
	public function insert_new_rec($new_rec){
		//Column names
		$columns = $this->get_tbl_names($new_rec);
		//Values
		$values = $this->get_tbl_values($new_rec);

		$table = $this->get_tbl_name($new_rec);
		//Build the sql statement 

		$sql = "INSERT INTO " . $table . "(" .
			$columns . ") Values(" . $values . ")";
		
		//Initialize db connection
		$db= $this->con;
		$stmt = $db->query($sql);

		if ($stmt){
			echo 'New record inserted';
		}else{
			echo 'Something went wrong';
		}
	}

}

?>