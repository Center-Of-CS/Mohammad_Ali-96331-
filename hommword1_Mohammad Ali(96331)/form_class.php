<?php 

class FormClass{

	function connection(){
		include("connection.php");
		return $connection_result;
	}

	function insert_form($name,$last_name,$emali,$phone,$address,$photo){
		$con = $this->connection();
		$insert_query = "INSERT INTO `detiles`(`name`, `last_name`, `email`, `phone`, `address`, `photo`) VALUES ('$name','$last_name','$emali','$phone','$address','$photo')";
		$result = $con->query($insert_query);
		if ($result) {
			return "employee inserted successfully";
		} else{
			return "employee not inserted";
		}
	}

	function get_form(){
		$con = $this->connection();
		$select_query = "SELECT * FROM detiles";
		$result = $con->query($select_query);
		return $result;
	}

	function delete_detail($id){
		$con = $this->connection();
		$result = $con->query("DELETE FROM detiles WHERE detiles.id = $id");
		if ($result) {
			return true;
		} else{
			return false;
		}
	}

	function edit_detile($id){
		$con = $this->connection();
		$detile_by_id = $con->query("SELECT * FROM detiles WHERE detiles.id = $id");
		return $detile_by_id;
	}

	function update_detile($id, $name,$last_name,$email,$phone,$address,$photo){
		$con = $this->connection();
		$result = $con->query("UPDATE `detiles` SET `name`='$name',`last_name`='$last_name',`email`='$email',`phone`='$phone',`address`='$address',`photo`='$photo' WHERE detiles.id = $id");

		if ($result) {
			return true;
		} else{
			return false;
		}
	}
}




 ?>