<?php 

if (isset($_GET['id'])) {
	include("form_class.php");
	$form_class = new FormClass();
	$result = $form_class->delete_detail($_GET['id']);
	if ($result) {
		$message = "detail deleted successfully";
		header("location:form.php?delete_message=".$message);
	} else{
		$message = "detail not deleted";
		header("location:form.php?delete_message".$message);
	}

	
}

 ?>