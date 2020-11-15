<?php 

if (isset($_POST['submit'])) {
	include("form_class.php");
	$form_class = new FormClass();
	$result = $form_class->update_detile($_POST['id'],$_POST['name'],$_POST['lsat_name'],
		$_POST['email'],$_POST['phone'],$_POST['address'],$_POST['photo']);
	if ($result) {
		$message = "detiles updated successfully";
		header("location:form.php?update_message=".$message);
	} else{
		$message = "detiles not updated";
		header("location:form.php?update_message=".$message);
	}
}



 ?>